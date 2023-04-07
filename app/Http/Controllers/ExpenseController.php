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
    public function owners_create()
    {
        $houses = House::whereHas('expenses',function ($e){
            $e ->where('house_id','=',2); //2為當時點進去的房間id
        })->get();

        $houses_data = [
            'houses' => $houses,
        ];
        return view('owners.locations.houses.expenses.create',$houses_data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function owners_store(Request $request)
    {
        $expense = Expense::create([
            'house_id' => 2,
            'type' => $request->type,
            'amount' => $request->amount,
            'interval' => $request->interval,
        ]);
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
        $houses = House::whereHas('expenses', function ($q){
            $q->where('house_id','=',2);
        })->get();

        $houses_data = [
            'houses' => $houses,
            'expenses'=> $expense,
        ];
        return view('owners.locations.houses.expenses.edit',$houses_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $data=$request->only([
            'type',
            'amount',
            'interval'
        ]);
        $expense->update($data);
        return redirect()->route('houses.expenses.index')->with('success', '修改成功！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->back()->with('success', '刪除成功！');
    }
}
