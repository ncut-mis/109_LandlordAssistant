<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Owner;
use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\House;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($owner)
    {
        //房東管理頁面首頁
        /*$locations = Location::all();
        $houses = $locations->houses;*/
        //抓取全部地點
		$locations = Location::with('houses')->get();
        //抓取出租中地點
		$for_rent = Location::whereHas('houses', function ($query) {
                $query->where('lease_status', '出租中');})->with('houses')->get();
        //抓取已刊登地點
		$listed = Location::whereHas('houses', function ($query) {
                $query->where('lease_status', '已刊登');})->with('houses')->get();
        //抓取閒置地點
		$vacancy = Location::whereHas('houses', function ($query) {
                $query->where('lease_status', '閒置');})->with('houses')->get();
        $locations_data = [
            'locations' => $locations,
            'for_rent' => $for_rent,
            'listed' => $listed,
            'vacancy' => $vacancy,
        ];
        return view('owners.home.index',$locations_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOwnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house)
    {
		$image = House::whereHas('image')->find($house->id);        
		$data = [
            'house' => $house,
            'image' => $image,
			
        ];
        return view('owners.houses.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
