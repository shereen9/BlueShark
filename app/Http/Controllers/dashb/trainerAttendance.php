<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\trainer;
use Auth;
use Carbon\Carbon;
use App\tAttendance;
use App\branch;
use App\sport;

class trainerAttendance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = trainer::all();
        $branches = branch::pluck('name', 'id');
        $attendances = tAttendance::all();
        return view('dashb.trainerAttendance.index', compact('trainers', 'attendances', 'branches'));
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
        
        $attendance = new tAttendance;
        $mont = $request['date'];
        $m =date('m', strtotime($mont));

        $attendance->date = $request['date'];
        $attendance->month = $m;
        $attendance->over = $request['over'];
        $attendance->penality = $request['penality'];
        $attendance->status = $request['attend'];
        $attendance->trainer_id = $request['id'];
        $attendance->branch_id = $request['branch_id'];
        $attendance->sport_id = $request['sport_id'];
        $attendance->user_id = Auth::id();
        $attendance->save();

        return redirect("/tAttendance");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainer = trainer::find($id);
        $tAttends = tAttendance::where('trainer_id',$id)->get();

        return view('dashb.trainerAttendance.show', compact('tAttends', 'trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tAttend = tAttendance::find($id);
        return view('dashb.trainerAttendance.edit', compact('tAttend'));
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
        
        $tAttend = tAttendance::find($id);
        $mont = $request['date'];
        $m =date('m', strtotime($mont));
        $tAttend->date = $request['date'];
        $tAttend->over = $request['over'];
        $tAttend->month = $m;
        $tAttend->penality = $request['penality'];
        $tAttend->status = $request['attend'];

        $tAttend->save();
        return redirect("/tAttendance");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tAttend = tAttendance::find($id);
        $tAttend->delete();
        return redirect("/tAttendance");
    }

    public function createA($id, $branch_id, $sport_id)
    {
               // $mytime = Carbon\Carbon::now();
               $mytime = Carbon::today()->toDateString();
               // $mytime->format('d-m-Y');
               return view('dashb.trainerAttendance.create', compact('mytime', 'id', 'branch_id', 'sport_id'));
    }

    public function gettsports(Request $request)
    {
        $branch_id = $request->id;
        // echo $id;
        $branch = branch::where('id', $branch_id)->first();
        // print_r($branch);
        $sports = explode(',',$branch->sports);
        // print_r($sports);
        echo '<label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Sports<span class="required">*</span></label>';
        echo '<div class="col-md-6 col-sm-6 ">';
        echo '<select name="sports" class="form-control" onchange="gettrainers(this.value,'.$branch_id.')">';
        echo '<option >'.'------'.'</option>';
        foreach ($sports as $sport):
            $s = sport::find($sport);
        print_r($s->name);   
        echo '<option value="'.$sport.'">'.$s->name.'</option>';
    endforeach;
    echo '</select>';
    
    }

    public function gettrainers(Request $request)
    {
        $branch_id = $request->branch_id;
        //  print_r($sport_id);

        $sport_id = $request->id;
        //  print_r($sport_id);
        $trainers = trainer::whereRaw($branch_id." in (branches)")->whereRaw($sport_id." in (sports)")->get();
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
        foreach ($trainers as  $i=>$trainer) {
           

        echo '<th scope="row">'.++$i.'</th>';                      
                    
        echo '<td> <a href="' .url('/').'/tAttendance/'.$trainer->id.'">'. $trainer->firstName .'</td>';
        echo '<td>'. $trainer->email .'</td>';
        echo '<td>'. $trainer->mobile .'</td>';
        echo '<td><a href="' .url('/').'/trainerAttendance/createA/'.$trainer->id.'/'.$branch_id.'/'.$sport_id.'"><i class="far fa-arrow-alt-circle-right"></i></a></td>';
        echo '</tr>';
               
        }
        echo '</tbody>';
        echo '</table>';
    }

}
