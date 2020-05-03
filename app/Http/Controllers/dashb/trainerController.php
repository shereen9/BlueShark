<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\trainer as current;
use App\sport;
use App\branch;
class trainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = current::all();
        return view('dashb.trainer.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $sports = sport::all();
        // $branches = branch::pluck('name', 'id');
        $branches = branch::all();
        return view('dashb.trainer.create', compact('branches','sports'));
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
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required",
            "mobile" => "required",
            "address" => "required",
            "city" => "required",
            "notes" => "required",
            "salary_per_hour" => "required",
            "salary_per_month" => "required"
        ]);
        
        
        $newTrainer = new current;   
        $newTrainer->firstName = $request['firstName'];
        $newTrainer->lastName = $request['lastName'];
        $newTrainer->email = $request['email'];
        $newTrainer->mobile = $request['mobile'];
        $newTrainer->address = $request['address'];
        $newTrainer->city = $request['city'];
        $sports = $request->input('sports');
        $newTrainer->sports = implode( ",",$sports);
        $newTrainer->notes = $request['notes'];
        $newTrainer->salary_per_hour = $request['salary_per_hour'];
        $newTrainer->salary_per_month = $request['salary_per_month'];
        // $newTrainer->branch()->associate($request['branch']);
        $branches = $request->input('branches');
        $newTrainer->branches = implode( ",",$branches);
        $newTrainer->save();

        $insert_id = $newTrainer->id;
        
        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            $profileImage = $insert_id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            current::where('id', $insert_id)->update(['profileImage' => $profileImage]);
        }
        return redirect("/trainer");
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
        $sports = sport::all();
        // $branches = branch::pluck('name', 'id');
        $branches = branch::all();
        $trainer = current::find($id);
        return view('dashb.trainer.edit', compact('trainer', 'sports', 'branches'));
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
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required",
            "mobile" => "required",
            "address" => "required",
            "city" => "required",
            "notes" => "required",
            "salary_per_hour" => "required",
            "salary_per_month" => "required"
        ]);
        
        $trainer = current::find($id);
        $trainer->firstName = $request['firstName'];
        $trainer->lastName = $request['lastName'];
        $trainer->email = $request['email'];
        $trainer->mobile = $request['mobile'];
        $trainer->address = $request['address'];
        $trainer->city = $request['city'];
        $sports = $request->input('sports');
        $trainer->sports = implode( ",",$sports);
        $trainer->notes = $request['notes'];
        // $trainer->branch()->associate($request['branch']);
        $branches = $request->input('branches');
        $trainer->branches = implode( ",",$branches);
        $trainer->salary_per_hour = $request['salary_per_hour'];
        $trainer->salary_per_month = $request['salary_per_month'];

        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            // $path = $destinationPath.$trainer->image;
            // unlink($path);
            
            $profileImage = $id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            $trainer->profileImage = $profileImage;

        }

        $trainer->save();
        return redirect("/trainer");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = current::find($id);
        if(file_exists('uploads/'. $trainer->profileImage)){
            unlink('uploads/'. $trainer->profileImage);
            }
        $trainer->delete();
        return redirect("/trainer");
    }
}
