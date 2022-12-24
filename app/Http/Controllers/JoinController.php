<?php

namespace App\Http\Controllers;

use App\Models\Join;
use App\Models\Setting;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joins = Join::all();
        return view('admin.join-us.index',compact('joins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('join')->with('settings',Setting::first());
    }

    public function destroy($id)
    {

        Join::find($id)->delete();

        return  redirect()->to('admin/join-us')->with(
            [
                'success' => __('forms.deleted-success')
            ]
        );
    }
}
