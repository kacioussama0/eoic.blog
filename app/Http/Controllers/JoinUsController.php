<?php

namespace App\Http\Controllers;

use App\Models\JoinUs;
use App\Models\Setting;
use Illuminate\Http\Request;

class JoinUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct() {

        return $this -> middleware('auth')->except(['create','store']);

    }


    public function index()
    {
        $joins = JoinUs::all();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'full_name' => 'required|min:10|max:50',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|min:3|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required|min:10|max:10',
            'nationality_and_residence' => 'required|min:10|max:50',
            'national_card_id' => 'required|min:10|max:50',
            'national_card_place' => 'required|min:10|max:50',
            'address' => 'required|min:10|max:50',
            'level' => 'required',
            'job' => 'required|max:50',
            'joined_associations' => 'required',
            'joined_political_parts' => 'required',
            'inclinations' => 'required',
            'abilities' => 'required',
            'additions_human_rights' => 'required',
            'additions_media' => 'required',
            'why_join' => 'required',
        ]);

        JoinUs::create($request->all());


        return redirect()->back()->with([
            'success' => 'تم إستقبال طلبك بنجاح'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JoinUs  $joinUs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $join = JoinUs::find($id);
        return view('admin.join-us.show',compact('join'));
    }



    public function destroy($id)
    {
        JoinUs::find($id) -> delete();

        return redirect() -> back();
    }
}
