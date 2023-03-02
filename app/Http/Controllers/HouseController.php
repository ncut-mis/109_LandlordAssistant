<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;

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
    public function create()
    {
        //
    }

    public function advance_search_create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHouseRequest $request)
    {
        //
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
    public function edit(House $house)
    {
        //
    }

    public function publish_edit(House $house)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHouseRequest $request, House $house)
    {
        //
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
    public function destroy(House $house)
    {
        //
    }
}
