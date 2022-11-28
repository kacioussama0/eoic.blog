<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:settings-update',   ['only' => ['update']]);
        $this->middleware('permission:settings-read',   ['only' => ['show']]);
    }

    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.index',compact('settings'));
    }



    public function update(Request $request, Setting $setting)
    {

        $request -> validate([
            'blog_name' => 'required|min:5',
            'blog_description' => 'required|min:5',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $setting -> update($request -> all());
        return redirect()->back()->with([
            'success' => 'تم تعديل إعدادات الموقع بنجاح'
        ]);
    }


}
