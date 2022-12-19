<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->type == 'super_admin') {
            $settings = Setting::first();
            return view('admin.settings.index',compact('settings'));
        }
        return abort(404);

    }



    public function update(Request $request, Setting $setting)
    {

        if(auth()->user()->type == 'super_admin') {


            $request->validate([
                'blog_name' => 'required|min:5',
                'blog_name_en' => 'required|min:5',
                'blog_name_fr' => 'required|min:5',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
            ]);


            $setting->update($request->all());

            return redirect()->back()->with([
                'success' => 'تم تعديل إعدادات الموقع بنجاح'
            ]);

        }

        return abort(404);

    }


}
