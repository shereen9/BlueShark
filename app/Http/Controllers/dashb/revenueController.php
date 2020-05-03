<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\revenue as current;
use Auth;

class revenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenues = current::all();
        return view('dashb.revenue.index', compact('revenues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashb.revenue.create');
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
        $month = date('m', strtotime($date));

        $newRevenue = new current;
        $newRevenue->statement = $request['statement'];
        $newRevenue->date = $request['date'];
        $newRevenue->month = $month;
        $newRevenue->amount = $request['amount'];
        $newRevenue->notes = $request['notes'];
        $newRevenue->user_id = Auth::id();

        $newRevenue->save();
        return redirect("/revenue");
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
        $revenue = current::find($id);
        return view('dashb.revenue.edit', compact('revenue'));

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

        $revenue = current::find($id);
        $revenue->statement = $request['statement'];
        $revenue->date = $request['date'];
        $revenue->month = $month;
        $revenue->amount = $request['amount'];
        $revenue->notes = $request['notes'];
        $revenue->user_id = Auth::id();

        $revenue->save();
        return redirect("/revenue");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $revenue = current::find($id);
        $revenue->delete();
        return redirect("/revenue");
    }
}
