<?php

namespace App\Http\Controllers;

use App\Models\OrganizationMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'name_latin' => 'required|min:5',
            'occupation' => 'required|min:5',
            'occupation_en' => 'required|min:5',
            'occupation_fr' => 'required|min:5',
            'order' => 'required',
            'avatar'=> [
                'required',
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 4)
            ]
        ]);

        $validatedData['avatar'] = $request->file('avatar')->store('organization_members','public');

        $created =  OrganizationMember::create($validatedData);

        if($created) {
            return redirect()->to('admin/organization-members')-> with([
                'success' =>  __('forms.add-success')
            ]);

        }



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
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'name_latin' => 'required|min:5',
            'occupation' => 'required|min:5',
            'occupation_en' => 'required|min:5',
            'occupation_fr' => 'required|min:5',
            'order' => 'required',
        ]);



        if(!empty($request->file('avatar'))) {
            Storage::delete('public/' . $organizationMember -> avatar);
            $validatedData['avatar'] = $request->file('avatar')->store('organization_members','public');
        }

        $updated = $organizationMember->update($validatedData);

        if($updated) {
            return redirect()->to('/admin/organization-members')-> with([
                'success' =>  __('forms.edit-success')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationMember  $organizationMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationMember $organizationMember)
    {

        if($organizationMember -> delete()) {
            Storage::delete('public/' . $organizationMember -> avatar);

            return redirect()->to('/admin/organization-members')-> with([
                'success' =>  __('forms.deleted-success')
            ]);
        }
    }
}
