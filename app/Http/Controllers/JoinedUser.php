<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class JoinedUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\Models\JoinedUser::paginate(5);
        return view('admin.join-users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.join-users.create');

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
            'full_name' => 'required|min:5',
            'age' => 'required',
            'occupation' => 'required|max:50',
            'profession' => 'required|max:50',
            'image'=> [
                'required',
                File::types([
                    'jpg','gif','png','webp'
                ])->max(1024 * 4)
            ]
        ]);


        $image = $request->file('image')->store('joined_users','public');

        $joinedUsers = new \App\Models\JoinedUser();

        $joinedUsers -> full_name = $request -> full_name;
        $joinedUsers -> age = $request -> age;
        $joinedUsers -> occupation = $request -> occupation;
        $joinedUsers -> profession = $request -> profession;
        $joinedUsers -> image = $image;

        $joinedUsers -> save();



        return redirect()->to('admin/joined-users');


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
        $user = \App\Models\JoinedUser::find($id);
        return view('admin.join-users.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|min:5',
            'age' => 'required',
            'occupation' => 'required|max:50',
            'profession' => 'required|max:50',
            'image'=> [
                File::types([
                    'jpg','gif','png','webp'
                ])->max(1024 * 4)
            ]
        ]);


        $image = $request->file('image')->store('joined_users','public');

        $joinedUsers = new \App\Models\JoinedUser();

        $joinedUsers -> full_name = $request -> full_name;
        $joinedUsers -> age = $request -> age;
        $joinedUsers -> occupation = $request -> occupation;
        $joinedUsers -> profession = $request -> profession;
        $joinedUsers -> image = $image;

        $joinedUsers -> save();



        return redirect()->to('admin/joined-users');
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
