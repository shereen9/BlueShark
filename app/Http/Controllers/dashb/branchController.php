<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\branch;
use App\sport;

class branchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = branch::all();
        return view('dashb.branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sports = sport::all();
        return view('dashb.branch.create', compact('sports'));
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
            "name" => "required",
            "address" => "required",
            "telephone" => "required",
            "responsible" => "required"
        ]);


        $sports = $request->input('sports');
        $newBranch = new branch;   
        $newBranch->name = $request['name'];
        $newBranch->address = $request['address'];
        $newBranch->telephone = $request['telephone'];
        $newBranch->responsible = $request['responsible'];
        $newBranch->sports = implode( ",",$sports);
        $newBranch->save();
        return redirect("/branch");
    
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
        $branch = branch::find($id);
        $sports = sport::all();
        return view('dashb.branch.edit', compact('branch', 'sports'));
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
            "name" => "required",
            "address" => "required",
            "telephone" => "required",
            "responsible" => "required"
        ]);
        
        $branch = branch::find($id);   
        $sports = $request->input('sports');
        $branch->name = $request['name'];
        $branch->address = $request['address'];
        $branch->telephone = $request['telephone'];
        $branch->responsible = $request['responsible'];
        $branch->sports = implode( ",",$sports);
        $branch->save();
        return redirect("/branch");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = branch::find($id);
        $branch->delete();
        return redirect("/branch");
    }
}
