<?php

namespace App\Http\Controllers;
use App\Models\Signatory;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class SignatoryController extends Controller
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
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //獲取邀請碼
        $invite_code = $request->input('invite_code');
        //搜尋
        $house = House::where('invitation_code', $invite_code)->first();
        if (!$house) {
            //房間不存在回傳畫面
            return back()->with('no', '未找到房屋');
        }
		$renter_id = Auth::user()->renter->id;
        // 檢查租客是否已經加入了這個房屋
        //auth()->renter()->id //之後有登入要取得租客ID 先用1
        $existingSignatory = Signatory::where('renter_id', $renter_id)
            ->where('house_id', $house->id)
            ->first();
        if ($existingSignatory) {
            // 租客已經加入過這個房屋，回傳畫面
            return back()->with('no', '您已經加入過這個房屋');
        }
        //將租客與房間關聯
        $house->id;
        $signatory = new Signatory;
        $signatory->renter_id = $renter_id;//之後有登入要取得租客ID
        $signatory->house_id = $house->id;
        $signatory->save();

        $random_str = Str::random(8);
        $house->invitation_code = $random_str;
        $house->save();
        //回傳成功畫面
        return back()->with('yes', '您已成功加入房屋');
    }

    /**
     * Display the specified resource.
     */
    public function show(Signatory $signatory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Signatory $signatory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSignatoryRequest $request, Signatory $signatory,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Signatory $signatory)
    {
        $signatory->delete();

        // 刪除成功，重定向到原始頁面，並顯示成功訊息
        return redirect()->back()->with('success', '已移除租客');



    }
}
