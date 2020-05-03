<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\branch;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::where('profession', 'admin')->get();
         $profession = ['admin', 'management', 'marketer', 'other'];
         $permission = ['Author', 'editor', 'admin'];
         return view('dashb.user.index',compact('users', 'profession', 'permission'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = branch::all();
        // $profession = ['admin'=>'admin'];
        $permission = ['author'=>'author', 'editor'=>'editor', 'admin'=>'admin'];
        return view('dashb.user.create', compact( 'permission', 'branches'));
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

        $newUser = new User;   
        $newUser->firstName = $request['firstName'];
        $newUser->lastName = $request['lastName'];
        $newUser->email = $request['email'];
        $newUser->mobile = $request['mobile'];
        $newUser->address = $request['address'];
        $newUser->city = $request['city'];
        $newUser->salary = $request['salary'];
        $newUser->active = $request['active'];
        $newUser->notes = $request['notes'];
        $newUser->password = bcrypt($request['password']);
        $newUser->profession = 'admin';
        $newUser->permission = $request['permission'];
        $branches = $request->input('branches');
        $newUser->branch_id = implode( ",",$branches);
        $newUser->save();

        $insert_id = $newUser->id;
        
        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            $profileImage = $insert_id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            User::where('id', $insert_id)->update(['profileImage' => $profileImage]);
        }
        return redirect("/user");

        // $newUser = new User([
        //     "name" => $request['name'],
        //     "email" => $request['email'],
        //     "password" => bcrypt($request['password'])
        // ]);
        // $newUser->save();
        // return redirect("/user");
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
        $branches = branch::all();
        $user = User::find($id);
        // $profession = ['admin'=>'admin'];
        $permission = ['author'=>'author', 'editor'=>'editor', 'admin'=>'admin'];
        return view('dashb.user.edit', compact('user', 'permission', 'branches'));
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
        $user = User::find($id);
        $user->firstName = $request['firstName'];
        $user->lastName = $request['lastName'];
        $user->email = $request['email'];
        $user->mobile = $request['mobile'];
        $user->address = $request['address'];
        $user->salary = $request['salary'];
        $user->active = $request['active'];
        $user->city = $request['city'];
        $user->notes = $request['notes'];
        if(request("password") !=""){
        $user->password = bcrypt($request['password']);
    }
        $user->permission = $request['permission'];
        $branches = $request->input('branches');
        $user->branch_id = implode( ",",$branches);
        // $user->branch()->associate($request['branches']);

        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            $profileImage = $id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            $user->profileImage = $profileImage;

        }
        $user->save();
        return redirect("/user");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =User::find($id);
        if(file_exists('uploads/'. $user->profileImage)){
            unlink('uploads/'. $user->profileImage);
            }
        $user->delete();
        return redirect("/user");
    }
}
