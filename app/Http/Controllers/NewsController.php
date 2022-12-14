<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(6);;
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');

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
            'title' => 'required|min:10',
            'title_en' => 'required|min:10',
            'title_fr' => 'required|min:10',
        ]);

        News::create($request -> all());

        return redirect()->to('admin/news')->with([
            'success' => __('forms.add-success')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request -> validate([
            'title' => 'required|min:10',
            'title_en' => 'required|min:10',
            'title_fr' => 'required|min:10',
        ]);



        if($request -> is_published == null) {

            $news->update(
                [
                    'is_published' => null,
                    'title' => $request -> title
                ]
            );

            return redirect()->to('admin/news')->with([
                'success' =>  __('forms.edit-success')
            ]);
        }

        $news->update($request -> all());

        return redirect()->to('admin/news')->with([
            'success' =>  __('forms.edit-success')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news -> delete();
        return redirect()->to('admin/news')->with([
            'success' => __('forms.deleted-success')
        ]);
    }
}
