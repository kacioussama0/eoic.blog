<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;

class MessageController extends Controller
{


      public function __construct() {

            return $this -> middleware('auth')->except(['create','store']);

    }

    public function index()
    {
        $messages = Message::all();
        return view('admin.messages.index',compact('messages'));
    }


    public function create()
    {
        return  view('contact')->with('settings',Setting::first());

    }


    public function store(Request $request)
    {
        $request->validate(
           [
               'name' => 'required|min:3|max:50',
               'email' => 'required|email|max:50',
               'subject' => 'required|min:5|max:50',
               'message' => 'required|min:15|max:100'
           ]
        );

        Message::create($request->all());

        return  redirect()->back()->with(['success'=>'تمت إرسال الرسالة بنجاح']);

    }



    public function destroy(Message $message)
    {
        $message -> delete();

        return redirect() -> back();
    }
}
