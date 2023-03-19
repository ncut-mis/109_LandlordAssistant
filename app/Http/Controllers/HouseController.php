<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Image;
use App\Models\Location;
use App\Models\Furnish;
use App\Models\Expense;
use App\Models\Feature;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($location)
    {
		$locations = Location::find($location);
		$owner_id = $locations->owner->id;
		$locations_data = [
            'locations' => $locations,
            'owner_id' => $owner_id,
        ];
        return view('owners.locations.houses.create',$locations_data);
    }

    public function advance_search_create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$location)
    {
		//dd($request->image);
        $validatedData = $request->validate([
			'name' => 'required|max:255',
			'address' => 'required|max:255',
			'furnish.*' => 'required|max:255',
		], [
			'name.required' => '請輸入房屋名稱。',
			'name.max' => '房屋名稱不得超過255個字元。',
			'address.required' => '請輸入地址。',
			'address.max' => '地址不得超過255個字元。',
			'furnish.*.required' => '請輸入設備。',
			'furnish.*.max' => '設備不得超過255個字元。',
		]);;
		
		//狀態等房屋底下的尚未全部可儲存
		
		$l = Location::find($location);
		$owner_id = $l->owner->id;
		// 建立 House 資料
		$house = House::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
			'lease_status' => "閒置",
			'introduce' => $request->introduce,
			'num_renter' => $request->num_renter,
			'min_period' => $request->min_period,
			'pattern' => $request->pattern,
			'size' => $request->size,
			'type' => $request->type,
			'floor' => $request->floor,
			'location_id' => $location,
			'owner_id' => $owner_id,
        ]);

		// 儲存動態增加的圖片路徑
        //$images = $request->input('image', []);
		//        foreach($request->file('image') as $image){

		//foreach($request->image as $key => $image) {
		foreach($request->file('image') as $key => $image) {
			//影像圖檔名稱
			$file_name = $request->id.'_'.time().'.'.$image->getClientOriginalExtension();
            //把檔案存到公開的資料夾
			$file_path = public_path('image/'.$file_name);
			move_uploaded_file($image->getPathname(), $file_path);

			//$file_path = $image->move(public_path('image'), $image);
			//$path = $image->storeAs('public/images', $image->getClientOriginalName());
			//$relativePath = str_replace('public', '/storage', $path);
			$imageModel = new Image([
				'house_id' => $house->id,
				'image' => $file_name,
			]);
			//dd($imageModel);
            $house->image()->save($imageModel);
        }
		
		$house_id = $house->id;

		// 建立 Expense 資料
        $expense = new Expense([
            'house_id' => $house_id,
            'type' => "租金",
            'amount' => $request->amount,
            'interval' => $request->interval,
        ]);
		// 透過關聯存取資料庫
        $house->expenses()->save($expense);


		// 建立 Furnish 資料
		if ($request->furnishings !== null) {
			// 新增特色
			foreach ($request->furnishings as $furnish) {
				$newFurnish = new Furnish([
					'house_id' => $house->id,
					'furnish' => $furnish,
				]);
				$house->furnishings()->save($newFurnish);
			}
		}
		
		// 建立 Feature 資料
		if ($request->features !== null) {
			// 新增特色
			foreach ($request->features as $feature) {
				$newFeature = new Feature([
					'house_id' => $house->id,
					'feature' => $feature,
				]);
				$house->features()->save($newFeature);
			}
		}
        
		return redirect()->route('owners.home.index',$owner_id)->with('success', '儲存成功！');
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house)
    {
        //
    }

    public function advance_search(House $house)
    {
        //
    }

    public function by_status(House $house)
    {
        //查看某狀態房屋資訊
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location, House $house)
    {
		$furnish = $house->furnishings;
		$amount = $house->expenses;
		$feature = $house->features;
		$locations_data = [
            'locations' => $location,
            'houses' => $house,
            'amount' => $amount,
            'furnish' => $furnish,
            'feature' => $feature,
            'owner_id' => $location->owner_id,
        ];
        return view('owners.locations.houses.edit',$locations_data);
    }

    public function publish_edit(House $house)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location, House $house)
    {
		// 從請求中獲取表單提交的數據
		$data = $request->only([
			'name',
			'address',
			'introduce',
			'num_renter',
			'min_period',
			'pattern',
			'size',
			'type',
			'floor',
		]);
		$house->update($data);
		
		// 更新租屋費用信息
		if ($house->expenses !== null) {
			foreach ($house->expenses as $expense) {
				$expense->amount = $request->amount;
				$expense->interval = $request->interval;
				$expense->save();
			}
		}
		//更新設備
		if ($request->furnishings !== null) {
			// 新增設備
			foreach ($request->furnishings as $furnish) {
				// 檢查設備是否已經存在
				if (!$house->furnishings()->where('furnish', $furnish)->exists()) {
					// 不存在重複的設備，可以新增
					$newFurnish = new Furnish([
						'house_id' => $house->id,
						'furnish' => $furnish,
					]);
					$house->furnishings()->save($newFurnish);
				}
			}
			// 檢查設備是否需要刪除
				//獲取所有設備
			$existingFurnishings = $house->furnishings()->pluck('furnish')->all();
				//找出那些設備不在 $request->furnishings 集合中的設備
			$furnishingsToDelete = array_diff($existingFurnishings, $request->furnishings);
			foreach ($furnishingsToDelete as $furnishToDelete) {
				$house->furnishings()->where('furnish', $furnishToDelete)->delete();
			}
		}
		
		//更新特色
		if ($request->features !== null) {
			// 新增特色
			foreach ($request->features as $feature) {
				// 檢查特色是否已經存在
				if (!$house->features()->where('feature', $feature)->exists()) {
					// 不存在重複的特色，可以新增
					$newFeature = new Feature([
						'house_id' => $house->id,
						'feature' => $feature,
					]);
					$house->features()->save($newFeature);
				}
			}

			// 檢查特色是否需要刪除
				//獲取所有特色
			$existingFeatures = $house->features()->pluck('feature')->all();
			//dump($existingFeatures);
				//找出那些特色不在 $request->features 集合中的特色
			$featuresToDelete = array_diff($existingFeatures, $request->features);
			//dd($featuresToDelete);
			foreach ($featuresToDelete as $featureToDelete) {
				$house->features()->where('feature', $featureToDelete)->delete();
			}
		}

		// 重定向到房屋管理頁面
		return redirect()->route('owners.home.index', [$location->id, $house->id])->with('success', '修改成功！');
    }

    public function publish_update()
    {
        //
    }

    public function unpublish_update(House $house)
    {

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location, House $house)
    {
        if (!$house) {
			return redirect()->back()->with('error', '房屋找不到');
		}
		$house->delete();
		return redirect()->back()->with('success', '房屋刪除成功');
    }
}
