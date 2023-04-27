<?php

namespace App\Http\Controllers;

use App\Models\Renter;
use App\Models\House;
use App\Http\Requests\StoreRenterRequest;
use App\Http\Requests\UpdateRenterRequest;
use App\Models\Signatory;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = House::whereHas('signatories', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with('repairs')->get();
        $view_data = [
            'houses' => $houses,
        ];
        return view('renters.houses.index',$view_data);
    }
    /*public function location_index()
    {
        $houses = House::whereHas('signatories', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with('repairs')->get();

        $locations = $houses->pluck('location')->unique();

        return view('renters.locations.index', compact('locations'));
    }*/
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
    public function store(StoreRenterRequest $request)
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
        $owners = $signatories->map(function ($signatories) {
            return $signatories->renter; // 取得每個合約的租客
        });
        $owners_data = $owners->map(function ($owner) {
            return $owner->user; // 取得每個租客的使用者資料
        });

        $furnishings = $house->furnishings;
        $features = $house->features;
        $image = $house->image;
        $expenses = $house->expenses;
        $data = [
            'contract' =>$signatories,
            'location_id' =>$location->id,
            'owners_data' => $owners_data,
            'furnishings' => $furnishings,
            'features' => $features,
            'house' => $house,
            'image' => $image,
            'expenses' => $expenses,

        ];
        return view('renters.houses.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Renter $renter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRenterRequest $request, Renter $renter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Renter $renter)
    {
        //
    }
}
