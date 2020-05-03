<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\marketerAttendance;
use Auth;
use App\branch;

class marketingAttendance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = branch::pluck('name', 'id');
        $marketers = User::where('profession', 'marketing')->get();
        return view('dashb.marketerAttendance.index', compact( 'marketers', 'branches'));
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
        
        $attendance = new marketerAttendance;
        $attendance->date = $request['date'];
        $attendance->month = $m;
        $attendance->over = $request['over'];
        $attendance->penality = $request['penality'];
        $attendance->status = $request['attend'];
        $attendance->marketer_id = $request['id'];
        $attendance->branch_id = $request['branch_id'];
        $attendance->user_id = Auth::id();
        $attendance->save();

        return redirect("/marketerAttendance");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marketer = User::find($id);
        $mAttends = marketerAttendance::where('marketer_id',$id)->get();

        return view('dashb.marketerAttendance.show', compact('mAttends', 'marketer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mAttend = marketerAttendance::find($id);
        return view('dashb.marketerAttendance.edit', compact('mAttend'));
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
        
        $mAttend = marketerAttendance::find($id);
        $mAttend->date = $request['date'];
        $mAttend->month = $m;
        $mAttend->over = $request['over'];
        $mAttend->penality = $request['penality'];
        $mAttend->status = $request['attend'];

        $mAttend->save();
        return redirect("/marketerAttendance");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mAttend = marketerAttendance::find($id);
        $mAttend->delete();
        return redirect("/marketerAttendance");
    }
    
    public function createA($id, $branch_id)
    {
        $mytime = Carbon::today()->toDateString();
        return view('dashb.marketerAttendance.create', compact('mytime', 'id', 'branch_id'));
    }

    public function getmarketers(Request $request)
    {
        $branch_id = $request->id;
        $marketers = User::whereRaw($branch_id." in (branches)")->where('profession','marketing')->get();

        echo '<table class="table table-striped">';
        echo '<br>';
        echo '<thead  class="thead-light ">';
        echo '<tr>';
        echo '<th>'.'#'.'</th>';
        echo '<th> Name </th>';
        echo '<th> Email</th>';
        echo '<th> Mobile</th>';
        echo '<th></th>';
        echo '</tr>';
        echo '<tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($marketers as  $i=>$marketer) {
           

        echo '<th scope="row">'.++$i.'</th>';                      
                    
        echo '<td> <a href="' .url('/').'/marketerAttendance/'.$marketer->id.'">'. $marketer->firstName .'</td>';
        echo '<td>'. $marketer->email .'</td>';
        echo '<td>'. $marketer->mobile .'</td>';
        echo '<td><a href="' .url('/').'/marketerAttendance/createA/'.$marketer->id.'/'.$branch_id.'"><i class="far fa-arrow-alt-circle-right"></i></a></td>';
        echo '</tr>';
               
        }
        echo '</tbody>';
        echo '</table>';
    }
}
