<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::latest()->paginate(6);
        return view('admin.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');

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
            'title'=>'required',
            'url'=>'required|url',
        ]);

        Video::create([
            'title' => $request -> title,
            'url' => $request -> url,
            'is_published' => $request -> is_published ? 1 : 0,
        ]);

        return redirect()->to('admin/videos')->with([
            'success' => __('forms.add-success')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title'=>'required',
            'url'=>'required|url',
        ]);

        $video->update([
            'title' => $request -> title,
            'url' => $request -> url,
            'is_published' => $request -> is_published ? 1 : 0,
        ]);

        return redirect()->to('admin/videos')->with([
            'success' => __('forms.edit-success')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {

        $video -> delete();

        return redirect()->to('admin/videos')->with([
            'success' => __('forms.deleted-success')
        ]);
    }

    public function videos() {
        $videos = Video::where('is_published',1)->latest()->paginate(9);
        return view('videos',compact('videos'));
    }
}
