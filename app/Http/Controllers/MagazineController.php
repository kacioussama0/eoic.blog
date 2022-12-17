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
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 4)
            ],'book' => [
                'required',
                \Illuminate\Validation\Rules\File::types([
                    'pdf'
                ])->max(1024 * 100)
            ],
            'thumbnail_en' => [
                \Illuminate\Validation\Rules\File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 4)
            ],'book_en' => [
                \Illuminate\Validation\Rules\File::types([
                    'pdf'
                ])->max(1024 * 100)
            ],'thumbnail_fr' => [
                \Illuminate\Validation\Rules\File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 4)
            ],'book_fr' => [
                \Illuminate\Validation\Rules\File::types([
                    'pdf'
                ])->max(1024 * 100)
            ],
        ]);

        $bookEN = $bookFR = $thumbnailEN = $thumbnailFR = '';

        if(!empty($request->file('thumbnail_en'))) {
            $thumbnailEN = $request->file('thumbnail_en')->store('magazines/thumbnails/en','public');
        }

        if(!empty($request->file('thumbnail_fr'))) {
            $thumbnailFR= $request->file('thumbnail_fr')->store('magazines/thumbnails/fr','public');
        }


        if(!empty($request->file('book_en'))) {
            $bookEN = $request->file('book_en')->store('magazines/books/en','public');
        }

        if(!empty($request->file('book_fr'))) {
            $bookFR= $request->file('book_fr')->store('magazines/books/fr','public');
        }

        $thumbnail = $request->file('thumbnail')->store('magazines/thumbnails/ar','public');
        $book = $request->file('book')->store('magazines/books/ar','public');

        $magazine = Magazine::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'thumbnail' => $thumbnail,
            'thumbnail_en' => $thumbnailEN,
            'thumbnail_fr' => $thumbnailFR,
            'book' => $book,
            'book_en' => $bookEN,
            'book_fr' => $bookFR ,
            'is_published' => $request->is_published ? 1 : 0,
        ]);

        return redirect()->to('admin/magazines')->with([
            'success' => 'تم إضافة المجلة بنجاح'
        ]);

    }

    public function books()
    {
        $magazines = Magazine::latest()->get();
        return view('books',compact('magazines'));
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
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 4)
            ],'book' => [
                \Illuminate\Validation\Rules\File::types([
                    'pdf'
                ])->max(1024 * 100)
            ],
            'thumbnail_en' => [
                \Illuminate\Validation\Rules\File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 4)
            ],'book_en' => [
                \Illuminate\Validation\Rules\File::types([
                    'pdf'
                ])->max(1024 * 100)
            ],'thumbnail_fr' => [
                \Illuminate\Validation\Rules\File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 4)
            ],'book_fr' => [
                \Illuminate\Validation\Rules\File::types([
                    'pdf'
                ])->max(1024 * 100)
            ],
        ]);

        $book = $thumbnail = $bookEN = $thumbnailEN = $bookFR = $thumbnailFR = '';

        if($request->file('book') != null) {
            unlink(public_path("storage/" . $magazine->book));
            $book = $request->file('book')->store('magazines/books/ar','public');
        }

        if($request->file('thumbnail') != null) {
            unlink(public_path("storage/" . $magazine->thumbnail));
            $thumbnail = $request->file('thumbnail')->store('magazines/thumbnails/ar','public');
        }

        if($request->file('book_en') != null) {
            unlink(public_path("storage/" . $magazine->book_en));
            $bookEN = $request->file('book_en')->store('magazines/books/en','public');
        }

        if($request->file('thumbnail_en') != null) {
            unlink(public_path("storage/" . $magazine->thumbnail_en));
            $thumbnailEN = $request->file('thumbnail_en')->store('magazines/thumbnails/en','public');
        }

        if($request->file('book_fr') != null) {
            unlink(public_path("storage/" . $magazine->book_fr));
            $bookFR = $request->file('book_fr')->store('magazines/books/fr','public');
        }

        if($request->file('thumbnail_fr') != null) {
            unlink(public_path("storage/" . $magazine->thumbnail_fr));
            $thumbnailFR = $request->file('thumbnail_fr')->store('magazines/thumbnails/fr','public');
        }

         $magazine->update([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'thumbnail' => !empty($thumbnail) ? $thumbnail : $magazine -> thumbnail ,
            'thumbnail_en' => !empty($thumbnailEN) ? $thumbnailEN : $magazine -> thumbnail_en ,
            'thumbnail_fr' => !empty($thumbnailFR) ? $thumbnailFR : $magazine -> thumbnail_fr ,
            'book' => !empty($book) ? $book : $magazine->book,
            'book_en' => !empty($bookEN) ? $bookEN : $magazine->book_en,
            'book_fr' => !empty($bookFR) ? $bookFR : $magazine->book_fr,
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

        if(File::exists(asset("storage/" . $magazine->thumbnail))) {
            unlink(public_path("storage/" . $magazine->thumbnail));
        }

        if(File::exists(asset("storage/" . $magazine->thumbnail_en))) {
            unlink(public_path("storage/" . $magazine->thumbnail_en));
        }


        if(File::exists(asset("storage/" . $magazine->thumbnail_fr))) {
            unlink(public_path("storage/" . $magazine->thumbnail_fr));
        }

        if(File::exists(asset("storage/" . $magazine->book))) {
            unlink(public_path("storage/" . $magazine->book));
        }

        if(File::exists(asset("storage/" . $magazine->book_en))) {
            unlink(public_path("storage/" . $magazine->book_en));
        }

        if(File::exists(asset("storage/" . $magazine->book_fr))) {
            unlink(public_path("storage/" . $magazine->book_fr));
        }

        $magazine->delete();

        return redirect()->to('admin/magazines')->with([
            'success' => 'تم حذف المجلة بنجاح'
        ]);
    }
}
