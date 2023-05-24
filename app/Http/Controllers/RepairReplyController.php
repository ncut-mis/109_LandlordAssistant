<?php

namespace App\Http\Controllers;

use App\Models\RepairReply;
use App\Models\Repair;
use App\Models\House;
use App\Http\Requests\StoreRepairReplyRequest;
use App\Http\Requests\UpdateRepairReplyRequest;

class RepairReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Repair $repair)
    {
        $houseId = request('house_id');
        $repair_id = $repair->id;
        $repair_title = $repair->title;
        $view_data = [
            'repair_id' => $repair_id,
            'repair_title' => $repair_title,
            'house_id' => $houseId,
        ];
        return view('owners.houses.repairs.reply.create', $view_data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRepairReplyRequest $request,Repair $repair)
    {
        $reply = RepairReply::create([
            'repair_id' => $request->id,
            'content' => $request->contents,
//            'date' => null,
        ]);
        return redirect()->route('sendemail.repair.reply', $reply->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(RepairReply $repairReply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RepairReply $repairReply)
    {
        $repairReplies = RepairReply::with('repair.house')->get();
        $repair_title = '';
        $houseId = null;

        foreach ($repairReplies as $repairReply) {
            $repair = $repairReply->repair;
            if ($repair) {
                $repair_title = $repair->title;
                $houseId = $repair->house->id;
                break; // 如果只需要第一個標題和相應的 house ID，可以使用 break 跳出循環
            }
        }
        $view_data = [
            'repair_title' => $repair_title,
            'repairReply' => $repairReply,
            'house_id' => $houseId,
            'repair_title'=>$repair_title,
        ];
        return view('owners.houses.repairs.reply.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepairReplyRequest $request, RepairReply $repairReply)
    {
        $houseId = request('house_id');
        $repairReply->update([
            'content' => $request->input('contents')
        ]);
        //要改為跳回房屋詳細資訊
        return redirect()->route('owners.houses.show',[$houseId])->with('success', '修改成功！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RepairReply $repairReply)
    {
        $repairReply->delete();
        return redirect()->back()->with('success', '刪除成功');
    }
}
