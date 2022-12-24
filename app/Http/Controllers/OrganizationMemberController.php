<?php

namespace App\Http\Controllers;

use App\Models\OrganizationMember;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class OrganizationMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = OrganizationMember::paginate(5);
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
            'name' => 'required|min:5',
            'name_latin' => 'required|min:5',
            'occupation' => 'required|min:5',
            'occupation_en' => 'required|min:5',
            'occupation_fr' => 'required|min:5',
            'age' => 'required',
            'avatar'=> [
                'required',
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 4)
            ]
        ]);

        $avatar = $request->file('avatar')->store('organization_members','public');

        OrganizationMember::create(
            [
                'name' => $request->name,
                'name_latin' =>  $request->name_latin,
                'occupation' =>  $request->occupation,
                'occupation_en' =>  $request->occupation_en,
                'occupation_fr' =>  $request->occupation_fr,
                'age' => $request->age,
                'avatar' => $avatar,
            ]
        );

        return redirect()->to('admin/organization-members')-> with([
            'success' =>  __('forms.add-success')
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganizationMember  $organizationMember
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationMember $organizationMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganizationMember  $organizationMember
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationMember $organizationMember)
    {
        return view('admin.join-users.edit',['user' => $organizationMember]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrganizationMember  $organizationMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationMember $organizationMember)
    {
        $request->validate([
            'name' => 'required|min:5',
            'name_latin' => 'required|min:5',
            'occupation' => 'required|min:5',
            'occupation_en' => 'required|min:5',
            'occupation_fr' => 'required|min:5',
            'age' => 'required',
            'avatar'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 4)
            ]
        ]);

        $avatar = '';

        if(!empty($request->file('avatar'))) {
            if(\Illuminate\Support\Facades\File::exists('storage/' . $organizationMember -> avatar)) {
                unlink(public_path('storage/' . $organizationMember -> avatar));
            }
            $avatar = $request->file('avatar')->store('organization_members','public');
        }

        $organizationMember->update(
            [
                'name' => $request->name,
                'name_latin' =>  $request->name_latin,
                'occupation' =>  $request->occupation,
                'occupation_en' =>  $request->occupation_en,
                'occupation_fr' =>  $request->occupation_fr,
                'age' => $request->age,
                'avatar' => $avatar ? $avatar : $organizationMember -> avatar,
            ]
        );

        return redirect()->to('admin/organization-members')-> with([
            'success' =>  __('forms.edit-success')
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationMember  $organizationMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationMember $organizationMember)
    {
        if(\Illuminate\Support\Facades\File::exists('storage/' . $organizationMember -> avatar)) {
            unlink(public_path('storage/' . $organizationMember -> avatar));
        }

        $organizationMember -> delete();

        return redirect()->to('admin/organization-members')-> with([
            'success' =>  __('forms.deleted-success')
        ]);

    }
}
