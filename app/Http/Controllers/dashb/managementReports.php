<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\branch;
use App\User;
use App\managerAttendance;

class managementReports extends Controller
{
    public function index()
    {
        $branches = branch::pluck('name', 'id');
        $months = ['1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September','10'=>'October', '11'=>'November', '12'=>'December'];
        return view('dashb.managementReports.index', compact('branches', 'months'));
    }

    public function getManagementData(Request $request)
    {
        $branch = $request->branch;
        // print_r($branch);
        $month = $request->month;
        $managers = User::whereRaw($branch." in (branches)")->where('profession', 'management')->get();
        // $trainers = trainer::where([['branch_id','=',$branch],['sports','=',$sport]])->get();
        echo '<table class="table table-striped">';
        echo '<br>';
        echo '<thead  class="thead-light ">';
        echo '<tr>';
        echo '<th>'.'#'.'</th>';
        echo '<th> Name </th>';
        // echo '<th> Branch</th>';
        echo '<th> Attendance</th>';
        echo '<th> Over</th>';
        echo '<th> Penality</th>';
        // echo '<th></th>';
        echo '</tr>';
        echo '<tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($managers as  $i=>$manager) {
           

    echo '<th scope="row">'.++$i.'</th>';                      
                
    // echo '<td> <a href="' .url('/').'/tAttendance/'.$trainer->id.'">'. $trainer->firstName .'</td>';
    $attendance = managerAttendance::where(['month'=> $month,'branch_id'=> $branch,'manager_id'=> $manager->id])->count();
    echo '<td>'. $manager->firstName .'</td>';
    // echo '<td>'. $manager->branch->name .'</td>';
    echo '<td>'. $attendance .'</td>';
    $over = managerAttendance::where(['month'=> $month,'branch_id'=> $branch,'manager_id'=> $manager->id])->sum('over');
    echo '<td>'. $over .'</td>';
    $penality = managerAttendance::where(['month'=> $month,'branch_id'=> $branch,'manager_id'=> $manager->id])->sum('penality');
    echo '<td>'. $penality .'</td>';

    echo '</tr>';
            
    }
    echo '</tbody>';
    echo '</table>';
    }

}
