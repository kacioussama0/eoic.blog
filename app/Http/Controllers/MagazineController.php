<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use \Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazines = Magazine::latest()->paginate(6);
        return view('admin.magazines.index',compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.magazines.create');

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
            'title' => 'required',
            'thumbnail' => [
                'required',
                \Illuminate\Validation\Rules\File::types([
                    'jpg','gif','png','webp'
                ])->max(1024 * 4)
            ],'book' => [
                'required',
                \Illuminate\Validation\Rules\File::types([
                    'pdf'
                ])->max(1024 * 100)
            ],
        ]);

        $thumbnail = $request->file('thumbnail')->store('magazines/thumbnail','public');
        $book = $request->file('book')->store('magazines/book','public');

        $magazine = Magazine::create([
            'title' => $request->title,
            'thumbnail' => $thumbnail,
            'book' => $book,
            'is_published' => $request->is_published ? 1 : 0,
        ]);

        return redirect()->to('admin/magazines')->with([
            'success' => 'تم إضافة المجلة بنجاح'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function edit(Magazine $magazine)
    {
        return view('admin.magazines.edit',compact('magazine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magazine $magazine)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => [
                \Illuminate\Validation\Rules\File::types([
                    'jpg','gif','png','webp'
                ])->max(1024 * 4)
            ],'book' => [

                \Illuminate\Validation\Rules\File::types([
                    'pdf'
                ])->max(1024 * 100)
            ],
        ]);


        $book = '';
        $thumbnail = '';

        if($request->file('book') != null) {
            unlink(public_path("storage/" . $magazine->book));
            $book = $request->file('book')->store('magazines/book','public');
        }

        if($request->file('thumbnail') != null) {
            unlink(public_path("storage/" . $magazine->thumbnail));
            $thumbnail = $request->file('thumbnail')->store('magazines/thumbnail','public');
        }

         $magazine->update([
            'title' => $request->title,
            'thumbnail' => !empty($thumbnail) ? $thumbnail : $magazine -> thumbnail ,
            'book' => !empty($book) ? $book : $magazine->book,
            'is_published' => $request->is_published ? 1 : 0,
        ]);


        return redirect()->to('admin/magazines')->with([
            'success' => 'تم تعديل  المجلة بنجاح'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magazine $magazine)
    {

        unlink(public_path("storage/" . $magazine->thumbnail));
        unlink(public_path("storage/" . $magazine->book));

        $magazine->delete();

        return redirect()->to('admin/magazines')->with([
            'success' => 'تم حذف المجلة بنجاح'
        ]);
    }
}
