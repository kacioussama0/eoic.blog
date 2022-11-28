<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class ComplaintController extends Controller
{

    public function __construct() {

        return $this -> middleware('auth')->except(['create','store']);

    }

    public function index()
    {
        $complaints = Complaint::all();
        return view('admin.complaints.index',compact('complaints'));
    }


    public function show(Complaint $complaint)
    {

        return view('admin.complaints.show',compact('complaint'));
    }

    public function create()
    {
        return  view('complaint')->with('settings',Setting::first());

    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'full_name' => 'required|max:50',
                'email' => 'required|email',
                'phone' => 'required|min:10|max:10',
                'complaint_type' => 'required',
                'description' => 'required|min:15|max:100',
                'attachment'=> [
                        File::types([
                            'jpg','gif','png','webp','pdf','docx','doc','xlsx','xls'
                        ])->max(1024 * 10)
                    ]
            ]
        );


        $complaint = Complaint::create($request->all());


        if(!empty($request->file('attachment'))) {

            $attachment = $request->file('attachment')->store('documents', 'public');

            $complaint -> attachment = $attachment;

            $complaint -> save();

        }


        return  redirect()->back()->with(['success'=>'تمت إرسال الشكوى بنجاح']);

    }



    public function destroy(Complaint $complaint)
    {
        $complaint -> delete();

        return redirect() -> back();
    }
}
