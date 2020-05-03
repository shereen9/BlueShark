<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\group as current;
use App\sport;
use Auth;
use App\branch;
use App\group_sport;
class groupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = current::all();
        return view('dashb.group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $branches = branch::all();
        $sports = sport::all();
        return view('dashb.group.create', compact( 'branches', 'sports'));
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
            "name" => "required",
            "email" => "required",
            "mobile" => "required",
            "address" => "required",
            "city" => "required",
            "subscriptionDate" => "required",
            "notes" => "required"
        ]);
        
        
        $group = new current;   
        $group->name = $request['name'];
        $group->email = $request['email'];
        $group->mobile = $request['mobile'];
        $group->address = $request['address'];
        $group->city = $request['city'];
        // $group->count = $request['count'];
        $group->subscriptionDate = $request['subscriptionDate'];
        // $sports = $request->input('sports');
        // $group->sports = implode( ",",$sports);
        $group->notes = $request['notes'];
        // $group->fees = $request['fees'];
        $group->responsible_name = $request['responsible_name'];
        $branches = $request->input('branches');
        $group->branches = implode( ",",$branches);
        $group->save();
        $id = $group->id;

        $sports = $request['sports'];
        $fees = $request['fees'];
        $count = $request['count'];

        foreach ($sports as $key => $value) {
            $gsports = new group_sport;
            $gsports->group_id = $id;
            $gsports->sport_id = $value;
            $gsports->count = $count[$key];
            $gsports->fees = $fees[$key];
            $gsports->save();
        }


        return redirect("/group");
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
        // $sports = sport::all();
        $branches = branch::all();
        $group = current::find($id);
        return view('dashb.group.edit', compact('group','branches'));
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
            "name" => "required",
            "email" => "required",
            "mobile" => "required",
            "address" => "required",
            "city" => "required",
            "subscriptionDate" => "required",
            "notes" => "required"
        ]);
        
        $group = current::find($id);   
        $group->name = $request['name'];
        $group->email = $request['email'];
        $group->mobile = $request['mobile'];
        $group->address = $request['address'];
        $group->city = $request['city'];
        // $group->count = $request['count'];
        $group->subscriptionDate = $request['subscriptionDate'];
        // $sports = $request->input('sports');
        // $group->sports = implode( ",",$sports);
        $group->notes = $request['notes'];
        // $group->fees = $request['fees'];
        $group->responsible_name = $request['responsible_name'];
        $branches = $request->input('branches');
        $group->branches = implode( ",",$branches);

        $group->save();
        return redirect("/group");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = current::find($id);
        $group->delete();
        return redirect("/group");
    }
}
