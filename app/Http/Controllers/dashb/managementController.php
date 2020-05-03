<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User as current;
use App\sport;
use App\branch;
use App\group;
use Auth;
class managementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = current::where('profession', 'management')->get();
        return view('dashb.management.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $branches = branch::pluck('name', 'id');
        $branches = branch::all();
        $permission = ['author'=>'author', 'editor'=>'editor', 'admin'=>'admin'];
        return view('dashb.management.create', compact('branches', 'permission'));
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
            "permission" => "required",
            "password" => ['required', 'confirmed']
        ]);
        
        
        $newManagement = new current;   
        $newManagement->firstName = $request['firstName'];
        $newManagement->lastName = $request['lastName'];
        $newManagement->email = $request['email'];
        $newManagement->mobile = $request['mobile'];
        $newManagement->address = $request['address'];
        $newManagement->city = $request['city'];
        $newManagement->notes = $request['notes'];
        $newManagement->profession = 'management';
        $newManagement->permission = $request['permission'];
        $newManagement->password = bcrypt($request['password']);
        // $newManagement->branch()->associate($request['branch']);
        $branches = $request->input('branches');
        $newManagement->branches = implode( ",",$branches);
        $newManagement->save();

        $insert_id = $newManagement->id;
        
        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            $profileImage = $insert_id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            current::where('id', $insert_id)->update(['profileImage' => $profileImage]);
        }
        return redirect("/management");
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
        // $branches = branch::pluck('name', 'id');
        $branches = branch::all();
        $permission = ['author'=>'author', 'editor'=>'editor', 'admin'=>'admin'];
        $management = current::find($id);
        return view('dashb.management.edit', compact('management','branches', 'permission'));
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
            "permission" => "required",
        ]);

        if(request("password") !=""){
            $request->validate([
                "password" => ['required', 'confirmed']
            ]);
        }

        $management = current::find($id);   
        $management->firstName = $request['firstName'];
        $management->lastName = $request['lastName'];
        $management->email = $request['email'];
        $management->mobile = $request['mobile'];
        $management->address = $request['address'];
        $management->city = $request['city'];
        $management->notes = $request['notes'];
        if(request("password") !=""){
            $management->password = bcrypt($request['password']);
        }
        $management->permission = $request['permission'];
        // $management->branch()->associate($request['branch']);
        $branches = $request->input('branches');
        $management->branches = implode( ",",$branches);
        // $management->branch()->associate($request['branch']);

        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            $profileImage = $id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            $management->profileImage = $profileImage;

        }

        $management->save();
        return redirect("/management");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $management = current::find($id);
        if(file_exists('uploads/'. $management->profileImage)){
            unlink('uploads/'. $management->profileImage);
            }
        $management->delete();
        return redirect("/management");
    }
}
