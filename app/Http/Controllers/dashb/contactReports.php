<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\branch;
use App\sport;
use App\contact;
use App\cAttendance;

class contactReports extends Controller
{
    public function index()
    {
        $branches = branch::pluck('name', 'id');
        $sports = sport::pluck('name', 'id');
        $months = ['1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September','10'=>'October', '11'=>'November', '12'=>'December'];
        return view('dashb.contactReports.index', compact('branches', 'months', 'sports'));
    }

    public function getContactData(Request $request)
    {
        $branch = $request->branch;
        $month = $request->month;
        $sport = $request->sport;
        // if($sport != null)
        $contacts = contact::whereRaw($branch." in (branches)")->whereRaw($sport." in (sports)")->get();
        // $trainers = trainer::where([['branch_id','=',$branch],['sports','=',$sport]])->get();
        echo '<table class="table table-striped">';
        echo '<br>';
        echo '<thead  class="thead-light ">';
        echo '<tr>';
        echo '<th>'.'#'.'</th>';
        echo '<th> Name </th>';
        // echo '<th> Branch</th>';
        echo '<th> Attendance</th>';
        // echo '<th> Over</th>';
        // echo '<th> Penality</th>';
        // echo '<th></th>';
        echo '</tr>';
        echo '<tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($contacts as  $i=>$contact) {
           

    echo '<th scope="row">'.++$i.'</th>';                      
                
    // echo '<td> <a href="' .url('/').'/tAttendance/'.$trainer->id.'">'. $trainer->firstName .'</td>';
    $attendance = cAttendance::where(['month'=> $month,'branch_id'=> $branch,'sport_id'=> $sport,'contact_id'=> $contact->id])->count();
    echo '<td>'. $contact->firstName .'</td>';
    // echo '<td>'. $trainer->branch->name .'</td>';
    echo '<td>'. $attendance .'</td>';

    echo '</tr>';
            
    }
    echo '</tbody>';
    echo '</table>';
    }

}
