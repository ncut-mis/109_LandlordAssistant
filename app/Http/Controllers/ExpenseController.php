<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\House;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function owners_index()
    {
        $houses = House::with(['expenses'=> function($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();
        $houses_data = [
            'houses' => $houses,
        ];

        return view('owners.locations.houses.expenses.index',$houses_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function owners_create($house)
    {
        $houses = House::find($house);
        $houses_data = [
            'houses'=>$houses,
        ];

        return view('owners.locations.houses.expenses.create2',$houses_data);
    }

    public function rentals_create($house)
    {
        $houses = House::find($house);
        $houses_data = [
            'houses'=>$houses,
        ];

        return view('owners.locations.houses.expenses.rentals_create',$houses_data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function owners_store(Request $request, House $house)
    {
//        $house = House::find($house);如果是傳單一值(Model $參數)
        $location = $house->location_id;
        $house_id = $house-> id;

        //驗證資料不為空
        $amount = $request->amount;
        $type = $request->type;
        if (empty($amount)) {
//            dd('1');
            return redirect()->route('houses.expenses.create', ['house' => $house_id])->withInput()->with(['error'=> '請填入金額']);

            //            return redirect()->back()->withInput()->with(['error'=> '請填入金額'])->withInput(['house' => $house_id]);
        }
        elseif (empty($type)){
            return redirect()->back()->withInput()->with('error', '請選擇費用類型');
        }

        $expense = Expense::create([
            'house_id' => $house_id,
            'type' => $request->type,
            'amount' => $request->amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'remark' => $request->remark,
            'house'=>$house,
            'location'=> $location
        ]);

        if(isset($_REQUEST['store-and-next'])){
            $house = House::find($house_id);
            $data = [
                'houses'=>$house
            ];
            return view('owners.locations.houses.expenses.create2',['houses' => $house,'success'=>'費用新增成功！']);
        }

        // 返回頁面或其他操作
        return redirect()->route('owners.houses.show',['house' => $house_id])->with(['success'=>'費用新增成功！','expense' => '1']);
    }

    public function rentals_store(Request $request, House $house)
    {
        $location = $house->location_id;
        $house_id = $house-> id;
        $expense = Expense::create([
            'house_id' => $house_id,
            'type' => $request->type,
            'amount' => $request->amount,
            'interval' => $request->interval,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'remark' => $request->remark,
            'house'=>$house,
            'location'=> $location
        ]);


        // 返回頁面或其他操作
        return redirect()->route('owners.houses.show',['house' => $house->id])->with(['success', '租金新增成功！','expense' => '1']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $house_id=$expense->house_id;
        $data = House::whereHas('expenses',function ($e)use ($house_id){
            $e ->where('house_id','=',$house_id);
        })->get();
//            $houses = House::whereHas('expenses', function ($q){
//            $q->where('house_id','=',2);
//        })->get();
        $houses_data = [
            'houses' => $data,
            'expenses'=> $expense,
        ];
        return view('owners.locations.houses.expenses.edit2',$houses_data);
    }

    public function rentals_edit(Expense $expense)
    {
        $house_id=$expense->house_id;
        $data = House::whereHas('expenses',function ($e)use ($house_id){
            $e ->where('house_id','=',$house_id);
        })->get();
//            $houses = House::whereHas('expenses', function ($q){
//            $q->where('house_id','=',2);
//        })->get();
        $houses_data = [
            'houses' => $data,
            'expenses'=> $expense,
        ];
        return view('owners.locations.houses.expenses.rentals_edit',$houses_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $house_id = $expense->house_id;
        $location = House::find($house_id)->location_id;
        $owner_id = House::find($house_id)->owner_id;
        $data=$request->only([
            'type',
            'amount',
            'start_date',
            'end_date',
            'remark',
        ]);

        //如果送出費用或繳費被按下
        if(isset($_REQUEST['ownerpush']) || isset($_REQUEST['renterpush'])){
            if (isset($_REQUEST['ownerpush'])) {
                $v_expense = Expense::where('id', $expense->id)
                    ->whereNotNull('type')
                    ->whereNotNull('amount')
                    ->whereNotNull('start_date')
                    ->whereNotNull('end_date')
                    ->first();
                if ($v_expense) {
                    $owner_status = '1';
                    $data = array_merge(
                        ['owner_status' => $owner_status], $data
                    );
                    $expense->update($data);
//                return redirect()->back()->with('success', '已送出費用');
                    return redirect()->route('sendemail.expense', $expense->id);
                } else {
                    return redirect()->back()->with('error', '費用送出失敗，尚有未填寫的資料');
                }
            }
            //租客按下繳費
            elseif (isset($_REQUEST['renterpush'])) {
                $cardNumber = $request->input('card-number');
                $cvv = $request->input('CVV');
                $expiration = $request->input('expiration');
                if (empty($request->input('en-name')) || empty($cardNumber) || empty($cvv) || empty($expiration)) {
                    return redirect()->back()->with(['error'=>'尚有未填寫的欄位','expense' => '1']);
                } elseif (!preg_match('/^\d{16}$/', $cardNumber)){
                    return redirect()->back()->with(['error' => '請輸入16位數字的卡號', 'expense' => '1']);
                }elseif (!preg_match('/^\d{3}$/', $cvv)){
                    return redirect()->back()->with(['error' => '請輸入3位數字的安全碼', 'expense' => '1']);
                } elseif (!preg_match('/^\d{2}\/\d{2}$/', $expiration)) {
                    return redirect()->back()->with(['error' => '請輸入正確的卡片到期日格式 (MM / YY)', 'expense' => '1']);
                } else {
                    $renter_status = '1';
                    $data = array_merge(
                        ['renter_status' => $renter_status], $data
                    );
                    $expense->update($data);
                    return redirect()->route('renters.houses.show', [$house_id])->with(['success' => '繳費成功！', 'expense' => '1']);
                }
            }
            }


        $expense->update($data);
        return redirect()->route('owners.houses.show', [$house_id])->with('success', '費用修改成功！');
    }

    public function rentals_update(Request $request, Expense $expense)
    {
        $house_id = $expense->house_id;
        $location = House::find($house_id)->location_id;
        $owner_id = House::find($house_id)->owner_id;
//dd($owner_id);
        $data=$request->only([
            'type',
            'amount',
            'start_date',
            'end_date',
            'remark',
        ]);
        $expense->update($data);
        return redirect()->route('owners.houses.show', [$house_id])->with('success', '租金費用修改成功！');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->back()->with(['success'=>'刪除成功！','expense'=>'1']);
    }
}
