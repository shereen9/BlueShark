<?php

namespace App\Http\Controllers\dashb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\message;
use DB;

class messageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = message::where('from','!=', Auth::id())->where('to',Auth::id())->get();
        $msgs = message::where('from', Auth::id())->where('to','!=',Auth::id())->get();
        return view('dashb.message.index', compact('messages', 'msgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id','!=', Auth::id())->pluck('firstName', 'id');
        return view('dashb.message.create', compact('users'));
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
            "to" => "required",
            "message" => "required"
        ]);
        
        
        $newMessage = new message;   
        $newMessage->from = Auth::id();
        $newMessage->to = $request['to'];
        $newMessage->message = $request['message'];
        $newMessage->status ="unread";
        
        $newMessage->save();

        $insert_id = $newMessage->id;
        
        if($files = $request->file('image')){
            $destinationPath = 'uploads/';
            $profileImage = $insert_id . "_img." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$profileImage);
            message::where('id', $insert_id)->update(['image' => $profileImage]);
        }
        return redirect("/message");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = message::find($id);
        $msgs = message::where([['from','=',$message->from],['to','=',$message->to]])->orWhere([['from','=',$message->to],['to','=',$message->from]])->get();
        DB::table('messages')->where('id', $id)->update(['status' => 'read']);
  
        return view('dashb.message.show', compact('message','msgs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
