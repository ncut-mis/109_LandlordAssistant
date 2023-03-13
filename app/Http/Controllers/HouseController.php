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
		$locations_data = [
            'locations' => $locations,
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
        'furnish' => 'required|max:255',
		]);
		
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
		// 建立 Furnish 資料
        $furnish = new Furnish([
            'house_id' => $house_id,
            'furnish' => $validatedData['furnish'],
        ]);
		// 透過關聯存取資料庫
        $house->furnishings()->save($furnish);

		// 建立 Expense 資料
        $expense = new Expense([
            'house_id' => $house_id,
            'amount' => $request->amount,
        ]);
		// 透過關聯存取資料庫
        $house->expenses()->save($expense);

		// 建立 Feature 資料
        $feature = new Feature([
            'house_id' => $house_id,
            'feature' => $request->feature,
        ]);
		// 透過關聯存取資料庫
        $house->features()->save($feature);
		return redirect()->route('owners.houses.index')->with('success', '儲存成功！');
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
		$locations_data = [
            'locations' => $location,
            'houses' => $house,
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
			'furnish',
			'amount',
			'feature',
			'introduce'
		]);

		// 更新房屋信息
		$house->update($data);

		// 重定向到房屋管理頁面
		return redirect()->route('owners.houses.show', [$location->id, $house->id]);
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
