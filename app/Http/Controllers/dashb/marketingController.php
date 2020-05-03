<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User as current;
use App\sport;
use App\branch;
use App\group;
use App\lead;
use App\contact;
use Auth;
class marketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $totalLeads = lead::where('user_id', Auth::id())->count();
        $members = current::where('profession', 'marketing')->get();
        return view('dashb.marketing.index', compact('members'));
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
        return view('dashb.marketing.create', compact('branches', 'permission'));
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
        
        
        $newMarketing = new current;   
        $newMarketing->firstName = $request['firstName'];
        $newMarketing->lastName = $request['lastName'];
        $newMarketing->email = $request['email'];
        $newMarketing->mobile = $request['mobile'];
        $newMarketing->address = $request['address'];
        $newMarketing->city = $request['city'];
        $newMarketing->notes = $request['notes'];
        $newMarketing->profession = 'marketing';
        $newMarketing->permission = $request['permission'];
        $newMarketing->password = bcrypt($request['password']);
        // $newMarketing->branch()->associate($request['branch']);
        $branches = $request->input('branches');
        $newMarketing->branches = implode( ",",$branches);
        // $branches = $request->input('branches');
        
        $newMarketing->save();

        $insert_id = $newMarketing->id;
        
        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            $profileImage = $insert_id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            current::where('id', $insert_id)->update(['profileImage' => $profileImage]);
        }
        return redirect("/marketing");
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
        $marketing = current::find($id);
        return view('dashb.marketing.edit', compact('marketing','branches', 'permission'));
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

        $marketing = current::find($id);   
        $marketing->firstName = $request['firstName'];
        $marketing->lastName = $request['lastName'];
        $marketing->email = $request['email'];
        $marketing->mobile = $request['mobile'];
        $marketing->address = $request['address'];
        $marketing->city = $request['city'];
        $marketing->notes = $request['notes'];
        if(request("password") !=""){
            $marketing->password = bcrypt($request['password']);
        }
        $marketing->permission = $request['permission'];
        // $marketing->branch()->associate($request['branch']);
        $branches = $request->input('branches');
        $marketing->branches = implode( ",",$branches);
        

        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            $profileImage = $id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            $marketing->profileImage = $profileImage;

        }

        $marketing->save();
        return redirect("/marketing");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marketing = current::find($id);
        if(file_exists('uploads/'. $marketing->profileImage)){
            unlink('uploads/'. $marketing->profileImage);
            }
        $marketing->delete();
        return redirect("/marketing");
    }
}
