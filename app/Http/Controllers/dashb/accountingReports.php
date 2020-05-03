<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\revenue;
use App\expense;
use App\payment;

class accountingReports extends Controller
{
    public function index()
    {
        $months = ['1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September','10'=>'October', '11'=>'November', '12'=>'December'];
        return view('dashb.accountingReports.index', compact('months'));
    }

    public function getpayments(Request $request)
    {
        $month = $request->month;
        // print_r($month);  
        $revenues = revenue::where('month', $month)->sum('amount');
        $expenses = expense::where('month', $month)->sum('amount');
        $payments = payment::where('month', $month)->sum('fees');
        $netRevenue = ($revenues + $payments) - $expenses;
        // print_r($revenues);  echo '<br>';
        // print_r($expenses);  echo '<br>';
        // print_r($payments);  echo '<br>';
        // print_r($netRevenue);  

        echo '<table class="table table-striped">';
        echo '<br>';
        echo '<thead  class="thead-light ">';
        echo '<tr>';
        // echo '<th>'.'#'.'</th>';
        echo '<th> Revenues </th>';
        echo '<th> Expenses</th>';
        echo '<th> Payments</th>';
        echo '<th> Net Revenues</th>';
        // echo '<th></th>';
        echo '</tr>';
        echo '<tr>';
        echo '</thead>';
        echo '<tbody>';

        // echo '<th scope="row">'.++$i.'</th>';                      
                    
        echo '<td>'.$revenues. '</td>';
        echo '<td>'. $expenses .'</td>';
        echo '<td>'. $payments .'</td>';
        echo '<td>'. $netRevenue .'</td>';
        // echo '<td><a href="' .url('/').'/contactAttendance/createA/'.$c->id.'/'.$sport_id.'"><i class="far fa-arrow-alt-circle-right"></i></a></td>';
        echo '</tr>';
               
            
        
        echo '</tbody>';
        echo '</table>';


    }

}
