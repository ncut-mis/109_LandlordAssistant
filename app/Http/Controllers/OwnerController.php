<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Owner;
use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\Contract;
use App\Models\Renter;
use App\Models\House;
use App\Models\Feature;
use App\Models\Furnish;
use App\Models\Image;
use App\Models\Expense;

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
            $query->where('lease_status', '出租中');
        })->with(['houses' => function ($query) {
            $query->where('lease_status', '出租中');
        }])->get();
		//抓取已刊登地點
		$listed = Location::whereHas('houses', function ($query) {
            $query->where('lease_status', '已刊登');
        })->with(['houses' => function ($query) {
            $query->where('lease_status', '已刊登');
        }])->get();
		//抓取閒置地點
		$vacancy = Location::whereHas('houses', function ($query) {
            $query->where('lease_status', '閒置');
        })->with(['houses' => function ($query) {
            $query->where('lease_status', '閒置');
        }])->get();


		$locations_data = [
            'locations' => $locations,
            'for_rent' => $for_rent,
            'listed' => $listed,
            'vacancy' => $vacancy,
            'owner_id' => $owner,
        ];
        return view('owners.home.index',$locations_data);
    }

	public function owners_index(House $house)
    {

	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

	public function owners_create(House $house)
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

	public function owners_store(Request $request, House $house)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house)
    {
		$location = $house->location;
		$signatories = $house->signatories; // 取得房屋的目前租客
		$renters = $signatories->map(function ($signatories) {
			return $signatories->renter; // 取得每個合約的租客
		});
		$renters_data = $renters->map(function ($renter) {
			return $renter->user; // 取得每個租客的使用者資料
		});

		$furnishings = $house->furnishings;
		$features = $house->features;
		$image = $house->image;
		$expenses = $house->expenses;
		$data = [
            'contract' =>$signatories,
            'location_id' =>$location->id,
			'renters_data' => $renters_data,
            'furnishings' => $furnishings,
            'features' => $features,
            'house' => $house,
            'image' => $image,
            'expenses' => $expenses,

        ];


        return view('owners.houses.show2',$data);

//        return view('owners.houses.show2',$data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        //
    }

	public function owners_edit(House $house, $rt)
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

	public function owners_update(Request $request, House $house, $rt)
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

	public function owners_destroy(House $house, $rt)
    {
        //
    }
}
