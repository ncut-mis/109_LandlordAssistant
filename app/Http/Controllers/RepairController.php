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
        $houses = House::whereHas('repairs', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with('repairs')->get();
        $unrepair = House::whereHas('repairs', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with(['repairs' => function ($q) {
            $q->where('status', '=', '未維修');
        }])->get();
        $inrepair = House::whereHas('repairs', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with(['repairs' => function ($q) {
            $q->where('status', '=', '維修中');
        }])->get();
        $finsh = House::whereHas('repairs', function ($q) {
            $q->where('renter_id', '=', 1);
        })->with(['repairs' => function ($q) {
            $q->where('status', '=', '已維修');
        }])->get();
        $view_data = [
            'houses' => $houses,
            'unrepair' => $unrepair,
            'inrepair' => $inrepair,
            'finsh' => $finsh,
        ];

        return view('renters.houses.repairs.index', $view_data);
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
        $house = House::whereHas('contracts', function ($q) {
            $q->where('renter_id', '=', 1);
        })->get();
        $view_data = [
            'house' => $house,
        ];
        return view('renters.houses.repairs.create', $view_data);
    }

    public function create_in_house($house)
    {
        $house = House::find($house);
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
        $repair = Repair::create([
            'renter_id' => 1,
            'house_id' => $request->id,
            'status' => '未維修',
            'content' => $request->contents,
            'date' => null,
        ]);
        return redirect()->route('renters.houses.repairs.index')->with('success', '申請成功！');

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
        $house = House::whereHas('contracts', function ($q) {
            $q->where('renter_id', '=', 1);
        })->get();
        $edit_data = [
            'repairs' => $repair,
            'houses' => $house,
        ];
        return view('renters.houses.repairs.edit', $edit_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepairRequest $request, Repair $repair)
    {
        $data = $request->only([
            'house_id',
            'content'
        ]);
        $repair->update($data);
        return redirect()->route('renters.houses.repairs.index')->with('success', '修改成功！');
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
        $repair->delete();
        return redirect()->back()->with('success', '刪除成功');
    }
}
