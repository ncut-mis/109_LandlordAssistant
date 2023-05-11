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
    public function create(House $house)
    {
        $house_id=$house->id;
        $house = House::where('id','=',$house_id)->get();
        $view_data = [
            'house' => $house,
            'house_id' => $house_id,
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
            'title' => $request->title,
            'status' => '未維修',
            'content' => $request->contents,
            'date' => null,
        ]);
        return redirect()->route('renters.houses.show',$request->id)->with('success', '申請成功！');

    }

    /**
     * Display the specified resource.
     */
    public function show(Repair $repair,House $house)
    {
        $repair_num=$repair->id;
        $house_num=$house->id;
        $house=House::find($house_num);
        $repairs = Repair::find ($repair_num);
        $view_data = [
            'repairs'=>$repairs,
            'houses'=>$house,
        ];
        return view('renters.houses.repairs.show',$view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repair $repair)
    {
        $house_id=$repair->id;
        $house = House::whereHas('signatories', function ($q) {
            $q->where('renter_id', '=', 1);
        })->get();
        $edit_data = [
            'repairs' => $repair,
            'houses' => $house,
            'house_id' => $house_id,
        ];
        return view('renters.houses.repairs.edit2', $edit_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepairRequest $request, Repair $repair)
    {
        $house_id = $repair->house_id;
        $repair->update([
            'content' => $request->input('contents')
        ]);
        //要改為跳回房屋詳細資訊
        return redirect()->route('renters.houses.show',[$house_id])->with('success', '修改成功！');
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
