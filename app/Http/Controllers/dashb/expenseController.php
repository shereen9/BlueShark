<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\expense as current;
use Auth;

class expenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = current::all();
        return view('dashb.expense.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashb.expense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "statement" => "required",
            "date" => "required",
            "amount" => "required",

        ]);

        $date = $request['date'];
        $month = date('m' ,strtotime($date));

        $newExpense = new current;
        $newExpense->statement = $request['statement'];
        $newExpense->date = $request['date'];
        $newExpense->month = $month;
        $newExpense->amount = $request['amount'];
        $newExpense->notes = $request['notes'];
        $newExpense->user_id = Auth::id();

        $newExpense->save();
        return redirect("/expense");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = current::find($id);
        return view('dashb.expense.edit', compact('expense'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "statement" => "required",
            "date" => "required",
            "amount" => "required",

        ]);

        $date = $request['date'];
        $month = date('m' ,strtotime($date));

        $expense = current::find($id);
        $expense->statement = $request['statement'];
        $expense->date = $request['date'];
        $expense->month = $month;
        $expense->amount = $request['amount'];
        $expense->notes = $request['notes'];
        $expense->user_id = Auth::id();

        $expense->save();
        return redirect("/expense");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = current::find($id);
        $expense->delete();
        return redirect("/expense");
    }
}
