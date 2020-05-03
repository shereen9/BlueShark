<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\schedule as current;
use App\sport;
use Auth;
use App\branch;
use App\group_sport;
use App\trainer;
class scheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = current::all();
        return view('dashb.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $branches = branch::pluck('name', 'id');
        $sports = sport::pluck('name', 'id');
        $trainers = trainer::pluck('firstName', 'id');
        return view('dashb.schedule.create', compact('branches', 'sports', 'trainers'));
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
            "branch" => "required",
            "sport" => "required",
            "trainer" => "required",
            "count" => "required",
            "time_from" => "required",
            "time_to" => "required",
        ]);

        $newSchedule = new current;   
        $newSchedule->branch()->associate($request['branch']);
        $newSchedule->sport()->associate($request['sport']);
        $newSchedule->trainer()->associate($request['trainer']);
        $newSchedule->time_from = $request['time_from'];
        $newSchedule->time_to = $request['time_to'];
        $newSchedule->count = $request['count'];
        $newSchedule->save();

        return redirect("/schedule");
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
        $branches = branch::pluck('name', 'id');
        $sports = sport::pluck('name', 'id');
        $trainers = trainer::pluck('firstName', 'id');
        $schedule = current::find($id);
        return view('dashb.schedule.edit', compact('schedule','branches','sports', 'trainers'));
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
            "branch" => "required",
            "sport" => "required",
            "trainer" => "required",
            "count" => "required",
            "time_from" => "required",
            "time_to" => "required",
        ]);

        $schedule = current::find($id);     
        $schedule->branch()->associate($request['branch']);
        $schedule->sport()->associate($request['sport']);
        $schedule->trainer()->associate($request['trainer']);
        $schedule->time_from = $request['time_from'];
        $schedule->time_to = $request['time_to'];
        $schedule->count = $request['count'];
        $schedule->save();

        return redirect("/schedule");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = current::find($id);
        $schedule->delete();
        return redirect("/schedule");
    }
}
