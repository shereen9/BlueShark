<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\managerAttendance;
use Auth;
use App\branch;

class managementAttendance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = branch::pluck('name', 'id');
        $managers = User::where('profession', 'management')->get();
        return view('dashb.managersAttendance.index', compact('managers', 'branches'));
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
        
        $attendance = new managerAttendance;
        $attendance->date = $request['date'];
        $attendance->month = $m;
        $attendance->over = $request['over'];
        $attendance->penality = $request['penality'];
        $attendance->status = $request['attend'];
        $attendance->manager_id = $request['id'];
        $attendance->branch_id = $request['branch_id'];
        $attendance->user_id = Auth::id();
        $attendance->save();

        return redirect("/mAttendance");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manager = User::find($id);
        $mAttends = managerAttendance::where('manager_id',$id)->get();

        return view('dashb.managersAttendance.show', compact('mAttends', 'manager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mAttend = managerAttendance::find($id);
        return view('dashb.managersAttendance.edit', compact('mAttend'));
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
        
        $mAttend = managerAttendance::find($id);
        $mAttend->date = $request['date'];
        $mAttend->month = $m;
        $mAttend->over = $request['over'];
        $mAttend->penality = $request['penality'];
        $mAttend->status = $request['attend'];

        $mAttend->save();
        return redirect("/mAttendance");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mAttend = managerAttendance::find($id);
        $mAttend->delete();
        return redirect("/mAttendance");
    }

    public function createA($id, $branch_id)
    {
        $mytime = Carbon::today()->toDateString();
        return view('dashb.managersAttendance.create', compact('mytime', 'id', 'branch_id'));
    }

    public function getmanagers(Request $request)
    {
        $branch_id = $request->id;
        $managers = User::whereRaw($branch_id." in (branches)")->where('profession','management')->get();

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
        foreach ($managers as  $i=>$manager) {
           

        echo '<th scope="row">'.++$i.'</th>';                      
                    
        echo '<td> <a href="' .url('/').'/mAttendance/'.$manager->id.'">'. $manager->firstName .'</td>';
        echo '<td>'. $manager->email .'</td>';
        echo '<td>'. $manager->mobile .'</td>';
        echo '<td><a href="' .url('/').'/managementAttendance/createA/'.$manager->id.'/'.$branch_id.'"><i class="far fa-arrow-alt-circle-right"></i></a></td>';
        echo '</tr>';
               
        }
        echo '</tbody>';
        echo '</table>';
    }
}
