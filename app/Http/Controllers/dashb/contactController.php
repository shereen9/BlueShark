<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\contact as current;
use App\sport;
use App\branch;
use App\group;
use Auth;
class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = current::all();
        return view('dashb.contact.index',compact('contacts'));
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
        // $branches = branch::pluck('name', 'id');
        $branches = branch::all();
        $groups = group::pluck('name', 'id');
        $leadSource = ['call'=>'call', 'facebook'=>'facebook', 'self'=>'self', 'employee'=>'employee', 'friend'=>'friend', 'word of mouth'=>'word of mouth'];
        $status = ['no answer'=>'no answer', 'cold-contact in future'=>'cold-contact in future', 'contacted'=>'contacted', 'hot'=>'hot', 'lost contact'=>'lost contact', 'not contacted'=>'not contacted' ,'not qualified'=>'not qualified', 'other reason'=>'other reason' ];
        return view('dashb.contact.create', compact('leadSource', 'status','sports', 'branches', 'groups', 'gender'));
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
            "fees" => "required",
            "subscriptionDate" => "required",
            "notes" => "required",
            "age" => "required",
            "gender" => "required", 
            "date" => "required",
            "sports" => "required",
            "level" => "required",
            "rate" => "required", 
            "unions" => "required"
        ]);
        
        
        $newcontact = new current;   
        $newcontact->firstName = $request['firstName'];
        $newcontact->lastName = $request['lastName'];
        $newcontact->email = $request['email'];
        $newcontact->mobile = $request['mobile'];
        $newcontact->address = $request['address'];
        $newcontact->city = $request['city'];
        $newcontact->leadSource = $request['leadSource'];
        $newcontact->status = $request['status'];
        $newcontact->fees = $request['fees'];
        $newcontact->subscriptionDate = $request['subscriptionDate'];
        $sports = $request->input('sports');
        $newcontact->sports = implode( ",",$sports);
        $newcontact->notes = $request['notes'];
        $newcontact->user_id = Auth::id();
        // $newcontact->branch()->associate($request['branch']);
        $branches = $request->input('branches');
        $newcontact->branches = implode( ",",$branches);
        $newcontact->group()->associate($request['group']);
        $newcontact->age = $request['age'];
        $newcontact->gender = $request['gender'];
        $newcontact->birthdate = $request['date'];
        $newcontact->level = $request['level'];
        $newcontact->rate = $request['rate'];
        $newcontact->unions = $request['unions'];
        $newcontact->save();

        $insert_id = $newcontact->id;
        
        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            $profileImage = $insert_id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            current::where('id', $insert_id)->update(['profileImage' => $profileImage]);
        }
        return redirect("/contact");
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
        // $branches = branch::pluck('name', 'id');
        $branches = branch::all();
        $groups = group::pluck('name', 'id');
        $leadSource = ['call'=>'call', 'facebook'=>'facebook', 'self'=>'self', 'employee'=>'employee', 'friend'=>'friend', 'word of mouth'=>'word of mouth'];
        $status = ['no answer'=>'no answer', 'cold-contact in future'=>'cold-contact in future', 'contacted'=>'contacted', 'hot'=>'hot', 'lost contact'=>'lost contact', 'not contacted'=>'not contacted' ,'not qualified'=>'not qualified', 'other reason'=>'other reason' ];
        $contact = current::find($id);
        return view('dashb.contact.edit', compact('contact', 'leadSource', 'status', 'sports', 'branches', 'groups', 'gender'));
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
            "fees" => "required",
            "subscriptionDate" => "required",
            "notes" => "required",
            "age" => "required",
            "gender" => "required", 
            "date" => "required",
            "sports" => "required",
            "level" => "required",
            "rate" => "required", 
            "unions" => "required"
        ]);

        $contact = current::find($id);   
        $contact->firstName = $request['firstName'];
        $contact->lastName = $request['lastName'];
        $contact->email = $request['email'];
        $contact->mobile = $request['mobile'];
        $contact->address = $request['address'];
        $contact->city = $request['city'];
        $contact->leadSource = $request['leadSource'];
        $contact->status = $request['status'];
        $sports = $request->input('sports');
        $contact->sports = implode( ",",$sports);
        $contact->fees = $request['fees'];
        $contact->notes = $request['notes'];
        $contact->subscriptionDate = $request['subscriptionDate'];
        // $contact->branch()->associate($request['branch']);
        $branches = $request->input('branches');
        $contact->branches = implode( ",",$branches);
        $contact->group()->associate($request['group']);
        $contact->age = $request['age'];
        $contact->gender = $request['gender'];
        $contact->birthdate = $request['date'];
        $contact->level = $request['level'];
        $contact->rate = $request['rate'];
        $contact->unions = $request['unions'];

        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            $profileImage = $id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            $contact->profileImage = $profileImage;

        }

        $contact->save();
        return redirect("/contact");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = current::find($id);
        if(file_exists('uploads/'. $contact->profileImage)){
            unlink('uploads/'. $contact->profileImage);
            }
        $contact->delete();
        return redirect("/contact");
    }
}
