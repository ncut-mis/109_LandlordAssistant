<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\House;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function owners_index()
    {
        $houses = House::with('expenses')->get();
        $houses_data = [
            'houses' => $houses,
        ];

        return view('owners.locations.houses.expenses.index',$houses_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function owners_create()
    {
        $houses = House::with('expenses')->get();
        $houses_data = [
            'houses' => $houses,
        ];
        return view('owners.locations.houses.expenses.create',$houses_data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function owners_store(StoreExpenseRequest $request, $house)
    {
        // 驗證輸入資料
        $validatedData = $request->validate([
            'type' => 'required|max:255',
            'amount' => 'required|numeric',
            'interval' => 'required|numeric',
        ]);

        // 建立新的 Expense 實例並設定屬性值
        $l = House::find('expense');
        $house_id = $l->houses->id;
        $expense = new Expense();
        $expense->house_id =
        $expense->type = $validatedData['type'];
        $expense->amount = $validatedData['amount'];
        $expense->interval = $validatedData['interval'];

        // 將實例存入資料庫
        $expense->save();

        // 返回頁面或其他操作
        return redirect()->route('houses.expenses.index')->with('success', '費用新增成功！');;
    }
    public function store(StoreExpenseRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
