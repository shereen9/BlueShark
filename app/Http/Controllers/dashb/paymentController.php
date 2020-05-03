<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\payment;
use App\contact;
use Auth;

class paymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = payment::all();
        return view('dashb.payment.index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = contact::pluck('firstName', 'id');
        $months = ['1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September','10'=>'October', '11'=>'November', '12'=>'December'];
        return view('dashb.payment.create', compact('contacts', 'months'));
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
            "receipt" => "required",
            "Contact" => "required",
            "month" => "required",
            "paid" => "required",
        ]);
        
        
        $newReceipt = new payment;   
        $newReceipt->receipt_no = $request['receipt'];
        $newReceipt->Contact_id = $request['Contact'];
        $newReceipt->month = $request['month'];
        $newReceipt->fees = $request['paid'];
        $newReceipt->rest = $request['rest'];
        $newReceipt->user_id = Auth::id();
        $newReceipt->save();
        return redirect("/payment");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receipt = payment::find($id);
        $receipt->delete();
        return redirect("/payment");
    }

    public function getFees(Request $request)
    {
        $id = $request->id;
        $month = $request->month;
        $fees = contact::find($id);  
        $payment = payment::where('contact_id',$id)->where('month',$month)->sum('fees');
        $requiredFees = $fees->fees-$payment;
        echo  $requiredFees;
    }

}
