<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\branch;
use App\sport;
use Carbon\Carbon;
use App\contact;
use App\cAttendance;
use Auth;

class contactAttendance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = branch::pluck('name', 'id');
        // $sports = sport::all()->pluck('name', 'id');
        return view('dashb.contactAttendance.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "date" => "required",
            "attend" => "required"
        ]);
        
        $mont = $request['date'];
        $m =date('m', strtotime($mont));

        $attendance = new cAttendance;
        $attendance->month = $m;
        $attendance->date = $request['date'];
        $attendance->time = $request['time'];
        $attendance->status = $request['attend'];
        $attendance->contact_id = $request['id'];
        $attendance->sport_id = $request['sport_id'];
        $attendance->branch_id = $request['branch_id'];
        $attendance->user_id = Auth::id();
        $attendance->save();

        return redirect("/cAttendance");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = contact::find($id);
        $cAttends = cAttendance::where('contact_id',$id)->get();

        return view('dashb.contactAttendance.show', compact('contact', 'cAttends'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cAttend = cAttendance::find($id);
        return view('dashb.contactAttendance.edit', compact('cAttend'));
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
            "date" => "required",
            "attend" => "required"
        ]);
        
        $mont = $request['date'];
        $m =date('m', strtotime($mont));

        $cAttend = cAttendance::find($id);
        $cAttend->date = $request['date'];
        $cAttend->month = $m;
        $cAttend->time = $request['time'];
        $cAttend->status = $request['attend'];

        $cAttend->save();
        return redirect("/cAttendance");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cAttend = cAttendance::find($id);
        $cAttend->delete();
        return redirect("/cAttendance");
    }

    public function createA($id, $sport_id, $branch_id)
    {
        $mydate = Carbon::today()->toDateString();
        $mytime = date('h:i:s',time());
        
        return view('dashb.contactAttendance.create', compact('mydate', 'id', 'mytime', 'sport_id', 'branch_id'));
    }

    public function getsports(Request $request)
    {
        $id = $request->id;
        // echo $id;
        $branch = branch::where('id', $id)->first();
        // print_r($branch);
        $sports = explode(',',$branch->sports);
        // print_r($sports);
        echo '<label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Sports<span class="required">*</span></label>';
        echo '<div class="col-md-6 col-sm-6 ">';
        echo '<select name="sports" class="form-control" onchange="getcontacts(this.value,'.$id.')">';
        echo '<option >'.'------'.'</option>';
        foreach ($sports as $sport):
            $s = sport::find($sport);
        // print_r($s->name);   
        echo '<option value="'.$sport.'">'.$s->name.'</option>';
    endforeach;
    echo '</select>';
    
    }

    public function getcontacts(Request $request)
    {
        $sport_id = $request->id;
        $branch_id = $request->branch_id;
        //  print_r($branch_id);
        $contact = contact::whereRaw($branch_id." in (branches)")->get();
        //  print_r($contact);
        echo '<table class="table table-striped">';
        echo '<br>';
        echo '<thead  class="thead-light ">';
        echo '<tr>';
        echo '<th>'.'#'.'</th>';
        echo '<th> Name </th>';
        echo '<th> Email</th>';
        echo '<th></th>';
        echo '</tr>';
        echo '<tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($contact as  $i=>$c) {
            if(in_array($sport_id,explode(',',$c->sports))){

        echo '<th scope="row">'.++$i.'</th>';                      
                    
        echo '<td> <a href="' .url('/').'/cAttendance/'.$c->id.'">'. $c->firstName .'</td>';
        echo '<td>'. $c->email .'</td>';
        echo '<td><a href="' .url('/').'/contactAttendance/createA/'.$c->id.'/'.$sport_id.'/'.$branch_id.'"><i class="far fa-arrow-alt-circle-right"></i></a></td>';
        echo '</tr>';
               
            }
        }
        echo '</tbody>';
        echo '</table>';
        
    
    }


}






