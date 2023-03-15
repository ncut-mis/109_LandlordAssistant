<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\House;
use App\Models\Renter;
use App\Models\Repair;
use App\Models\User;
use App\Http\Requests\StoreRepairRequest;
use App\Http\Requests\UpdateRepairRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = House::whereHas('repairs',function ($q){
            $q->where('renter_id','=',1);
        })->with('repairs')->get();
        $view_data = [
            'houses' => $houses,
        ];

        return view('renters.houses.repairs.index',$view_data);
        //
    }

    public function owners_index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $house = House::whereHas('contracts',function ($q){
            $q->where('renter_id','=',1);
        })->get();

        $view_data = [
            'house' => $house,
        ];
        return view('renters.houses.repairs.create',$view_data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRepairRequest $request)
    {
        $repair=Repair::create([
            'renter_id' =>1 ,
            'house_id' => $request->id,
            'status' => '未維修',
            'content' => $request->contents,
            'date' => null,
        ]);
        return redirect()->route('renters.houses.repairs.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Repair $repair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepairRequest $request, Repair $repair)
    {
        //
    }

    public function update_status(UpdateRepairRequest $request, Repair $repair)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repair $repair)
    {
        //
    }
}
