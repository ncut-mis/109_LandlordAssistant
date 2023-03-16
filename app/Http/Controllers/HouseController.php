<?php

namespace App\Http\Controllers;

use App\Models\House;
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
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'address' => 'required|max:255',
        'furnish.*' => 'required|max:255',
		]);
		
		//狀態等房屋底下的尚未全部可儲存
		
		$l = Location::find($location);
		$owner_id = $l->owner->id;
		// 建立 House 資料
		$house = House::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
			'introduce' => $request->introduce,
			'location_id' => $location,
			'owner_id' => $owner_id,
        ]);
		
		$house_id = $house->id;
		// 取得所有設備值
		//$furnishes = $request->input('furnish');
		// 建立 Furnish 資料
		foreach($request->furnish as $furnish) {
			$newFurnish = new Furnish([
				'house_id' => $house_id,
				'furnish' => $furnish,
			]);
			$house->furnishings()->save($newFurnish);
		}

		// 透過關聯存取資料庫
        //$house->furnishings()->save($furnish);

		// 建立 Expense 資料
        $expense = new Expense([
            'house_id' => $house_id,
            'amount' => $request->amount,
        ]);
		// 透過關聯存取資料庫
        $house->expenses()->save($expense);

		// 建立 Feature 資料
		foreach($request->feature as $feature) {
			$newFurnish = new Feature([
				'house_id' => $house_id,
				'feature' => $feature,
			]);
			$house->furnishings()->save($newFurnish);
		}
        
		// 透過關聯存取資料庫
        //$house->features()->save($feature);
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
		//初步版本，尚未全部可修改
		
		// 從請求中獲取表單提交的數據
		$data = $request->only([
			'name',
			'address',
			'introduce'
		]);
		$house->update($data);
		
		// 更新房屋信息
		if ($house->expenses !== null) {
			foreach ($house->expenses as $expense) {
				$expense->amount = $request->amount;
				$expense->save();
			}
		}

		if ($house->furnishings !== null) {
			foreach ($house->furnishings as $furnishing) {
				$furnishing->furnish = $request->furnish;
				$furnishing->save();
			}
		}

		if ($house->feature !== null) {
			foreach ($house->feature as $feature) {
				$feature->feature = $request->feature;
				$feature->save();
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
