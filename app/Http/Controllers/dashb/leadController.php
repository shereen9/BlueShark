<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\lead as current;
use App\sport;
use App\contact;
use Carbon;
use Auth;
class leadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = current::all();
        return view('dashb.lead.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $sports = sport::all();
        $gender = ['male'=>'male', 'female'=>'female'];
        $leadSource = ['call'=>'call', 'facebook'=>'facebook', 'self'=>'self', 'employee'=>'employee', 'friend'=>'friend', 'word of mouth'=>'word of mouth'];
        $status = ['no answer'=>'no answer', 'cold-contact in future'=>'cold-contact in future', 'contacted'=>'contacted', 'hot'=>'hot', 'lost lead'=>'lost lead', 'not contacted'=>'not contacted' ,'not qualified'=>'not qualified', 'other reason'=>'other reason' ];
        return view('dashb.lead.create', compact('leadSource', 'status','sports', 'gender'));
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
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required",
            "mobile" => "required",
            "address" => "required",
            "city" => "required",
            "leadSource" => "required",
            "status" => "required",
            "notes" => "required",
            "age" => "required",
            "gender" => "required", 
            "date" => "required",
            "sports" => "required"
        ]);
        
        
        $newLead = new current;   
        $newLead->firstName = $request['firstName'];
        $newLead->lastName = $request['lastName'];
        $newLead->email = $request['email'];
        $newLead->mobile = $request['mobile'];
        $newLead->address = $request['address'];
        $newLead->city = $request['city'];
        $newLead->leadSource = $request['leadSource'];
        $newLead->status = $request['status'];
        $sports = $request->input('sports');
        $newLead->sports = implode( ",",$sports);
        $newLead->notes = $request['notes'];
        $newLead->age = $request['age'];
        $newLead->gender = $request['gender'];
        $newLead->birthdate = $request['date'];
        $newLead->user_id = Auth::id();
        $newLead->save();
        return redirect("/lead");
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
        $sports = sport::all();
        $gender = ['male'=>'male', 'female'=>'female'];
        $leadSource = ['call'=>'call', 'facebook'=>'facebook', 'self'=>'self', 'employee'=>'employee', 'friend'=>'friend', 'word of mouth'=>'word of mouth'];
        $status = ['no answer'=>'no answer', 'cold-contact in future'=>'cold-contact in future', 'contacted'=>'contacted', 'hot'=>'hot', 'lost lead'=>'lost lead', 'not contacted'=>'not contacted' ,'not qualified'=>'not qualified', 'other reason'=>'other reason' ];
        $lead = current::find($id);
        return view('dashb.lead.edit', compact('lead', 'leadSource', 'status', 'sports', 'gender'));
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
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required",
            "mobile" => "required",
            "address" => "required",
            "city" => "required",
            "leadSource" => "required",
            "status" => "required",
            "notes" => "required",
            "age" => "required",
            "gender" => "required", 
            "date" => "required",
            "sports" => "required"
        ]);
        
        
        $lead = current::find($id);   
        $sports = $request->input('sports');
        $lead->firstName = $request['firstName'];
        $lead->lastName = $request['lastName'];
        $lead->email = $request['email'];
        $lead->mobile = $request['mobile'];
        $lead->address = $request['address'];
        $lead->city = $request['city'];
        $lead->leadSource = $request['leadSource'];
        $lead->status = $request['status'];
        $lead->sports = implode( ",",$sports);
        $lead->notes = $request['notes'];
        $lead->age = $request['age'];
        $lead->gender = $request['gender'];
        $lead->birthdate = $request['date'];

        $lead->save();
        return redirect("/lead");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = current::find($id);
        $lead->delete();
        return redirect("/lead");
    }

    public function transmit($id)
    {
        $lead = current::find($id);
        $contact = new contact;
        $contact->firstName = $lead->firstName;
        $contact->lastName = $lead->lastName;
        $contact->email = $lead->email;
        $contact->mobile = $lead->mobile;
        $contact->address = $lead->address;
        $contact->city = $lead->city;
        $contact->leadSource = $lead->leadSource;;
        $contact->status = $lead->status;
        $contact->sports = $lead->sports;
        $contact->notes = $lead->notes;
        $contact->age = $lead->age;
        $contact->gender = $lead->gender;
        $contact->birthdate = $lead->birthdate;
        $contact->user_id = $lead->user_id;
        $contact->convert_by = Auth::id();
        $contact->convert_time = Carbon\Carbon::now();;
        $contact->save();
        $lead->delete();
        return redirect("/lead");
    }
}
