<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function  __construct() {
        return $this->middleware(['role:admin']);
    }


    public function index()
    {
        $users = User::where('id','<>',Auth::id())->get();
        return view('admin.users.index',compact('users'));
    }


    public function create()
    {
        return view('admin.users.create')->with('roles', Role::all());
    }


    public function store(Request $request)
    {

        $request -> validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:50|unique:users'
        ]);

        $user = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make('password')
        ]);

        $user -> attachRole($request -> role);

        return  redirect()->to('admin/users');
    }


    public function show($id)
    {
        //
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

        $user = User::where('id',$id)-> update([
            'name' => $request -> name,
            'email' => $request -> email,
        ]);

        return  redirect()->to('admin/users');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return  redirect()->to('admin/users');
    }
}
