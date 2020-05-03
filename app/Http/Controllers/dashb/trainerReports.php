<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\branch;
use App\sport;
use App\tAttendance;
use App\trainer;

class trainerReports extends Controller
{
    public function index()
    {
        $branches = branch::pluck('name', 'id');
        $months = ['1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September','10'=>'October', '11'=>'November', '12'=>'December'];
        $sports = sport::pluck('name', 'id');
        return view('dashb.trainerReports.index', compact('branches', 'months','sports'));
    }

    // public function gettsportss(Request $request)
    // {
    //     $branch_id = $request->id;
    //     // echo $branch_id;
    //     $branch = branch::where('id', $branch_id)->first();
    //     // print_r($branch);
    //     $sports = explode(',',$branch->sports);
    //     // print_r($sports);
    //     echo '<label class="col-form-label col-md-3 col-sm-3 label-align" for="old-name">Sports<span class="required">*</span></label>';
    //     echo '<div class="col-md-6 col-sm-6 ">';
    //     echo '<select name="sports" class="form-control" onchange="gettrainers(this.value,'.$branch_id.')">';
    //     echo '<option >'.'------'.'</option>';
    //     foreach ($sports as $sport):
    //         $s = sport::find($sport);
    //     print_r($s->name);   
    //     echo '<option value="'.$sport.'">'.$s->name.'</option>';
    // endforeach;
    // echo '</select>';
    
    // }


    public function getdata(Request $request)
    {
        $branch = $request->branch;
        // print_r($branch);
        $month = $request->month;
        $sport = $request->sport;
        // print_r($sport);
        // if($sport != null)
        $trainers = trainer::whereRaw($branch." in (branches)")->whereRaw($sport." in (sports)")->get();
        // $trainers = trainer::where([['branch_id','=',$branch],['sports','=',$sport]])->get();
        echo '<table class="table table-striped">';
        echo '<br>';
        echo '<thead  class="thead-light ">';
        echo '<tr>';
        echo '<th>'.'#'.'</th>';
        echo '<th> Name </th>';
        echo '<th> Attendance</th>';
        echo '<th> Over</th>';
        echo '<th> Penality</th>';
        // echo '<th></th>';
        echo '</tr>';
        echo '<tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($trainers as  $i=>$trainer) {
           

    echo '<th scope="row">'.++$i.'</th>';                      
                
    // echo '<td> <a href="' .url('/').'/tAttendance/'.$trainer->id.'">'. $trainer->firstName .'</td>';
    $attendance = tAttendance::where(['month'=> $month,'branch_id'=> $branch,'sport_id'=> $sport,'trainer_id'=> $trainer->id])->count();
    echo '<td>'. $trainer->firstName .'</td>';
    // echo '<td>'. $trainer->branch->name .'</td>';
    echo '<td>'. $attendance .'</td>';
    $over = tAttendance::where(['month'=> $month,'branch_id'=> $branch,'sport_id'=> $sport,'trainer_id'=> $trainer->id])->sum('over');
    echo '<td>'. $over .'</td>';
    $penality = tAttendance::where(['month'=> $month,'branch_id'=> $branch,'sport_id'=> $sport,'trainer_id'=> $trainer->id])->sum('penality');
    echo '<td>'. $penality .'</td>';

    echo '</tr>';
            
    }
    echo '</tbody>';
    echo '</table>';
    }

   
}
