<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function  __construct() {
        return $this->middleware('auth');
    }


    public function index()
    {
        if(auth()->user()->type == 'super_admin') {

            $users = User::where('id', '<>', Auth::id())->paginate(5);
            return view('admin.users.index',compact('users'));
        }
        return abort(404);
    }


    public function create()
    {
        if(auth()->user()->type == 'super_admin') {

            return view('admin.users.create');

        }
        return abort(404);

    }


    public function store(Request $request)
    {

        $request -> validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|min:8'
        ]);

        if(auth()->user()->type == 'super_admin') {
            $user = User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'password' => Hash::make($request->password),
                'type' => 'editor'
            ]);
            return  redirect()->to('admin/users')->with(
                ['success' => __('forms.add-success')]
            );

        }


    }




    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:50'
        ]);

        if(auth()->user()->type == 'super_admin') {


            $user = User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->to('admin/users')->with(
                ['success' => __('forms.edit-success')]
            );

        }
    }


    public function destroy($id)
    {
        if(auth()->user()->type == 'super_admin') {
            $user = User::find($id);
            $user->notifications()->delete();
            $user -> delete();
            return redirect()->to('admin/users')->with(
                ['success' => __('forms.deleted-success')]
            );
        }
        return  abort(404);
    }
}
