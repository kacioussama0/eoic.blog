<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\News;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:posts-create', ['only' => ['create']]);
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin.pages.home')->with('users', User::all())
            ->with('categories', Category::all())
            ->with('settings', Setting::first())
            ->with('posts', Post::all())
            ->with('tags', Tag::all())
            ->with('messages', Message::all())
            ->with('latest_news', News::all());
    }

    public function profile()
    {
        return view('admin.profile')->with('user', User::where('id', Auth::id())->first());
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        Auth::user()->update($request->all());

        return redirect()->to('admin/profile')->with([
            'success' => 'تم تعديل المعلومات بنجاح'
        ]);
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'actual_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = Auth::user();


        if (!Hash::check($request->actual_password, $user->password)) {
            return redirect()->back()->with([
                'failed' => 'كلمة السر الحالية خاطئة'
            ]);
        }

        $user->password = bcrypt($request->new_password);

        $user->save();

        return redirect()->back()->with([
            'success' => 'تم تغيير كلمة السر بنجاح'
        ]);

    }

    public function updateImage(Request $request)
    {
       $request -> validate([
           'image'=> [
               File::types([
                   'jpg','gif','png','webp'
               ])->max(1024 * 4)
           ]
       ]);

        if(!empty($request->file('image'))) {
            $image = $request->file('image')->store('avatar','public');


            $user = Auth::user();

            $user -> avatar = $image;

            $user -> save();

            return redirect()->back()->with([
                'success' => 'تم تغيير الصورة بنجاح'
            ]);

        }

        return  redirect()->back();

    }

}
