<?php

namespace App\Http\Controllers;

use App\Models\Renter;
use App\Models\House;
use App\Http\Requests\StoreRenterRequest;
use App\Http\Requests\UpdateRenterRequest;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = House::whereHas('contracts', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with('repairs')->get();
        $view_data = [
            'houses' => $houses,
        ];
        return view('renters.houses.index',$view_data);
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
    public function store(StoreRenterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Renter $renter)
    {
        //
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
