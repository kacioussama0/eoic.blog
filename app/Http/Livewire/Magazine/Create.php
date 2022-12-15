<?php

namespace App\Http\Livewire\Magazine;

use App\Models\Magazine;
use Illuminate\Validation\Rules\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;


    public $title;
    public $title_en;
    public $title_fr;
    public $thumbnail;
    public $thumbnail_en;
    public $thumbnail_fr;
    public $book;
    public $book_en;
    public $book_fr;
    public $is_published;


    public function create() {
        $this->validate([
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

    }


    public function render()
    {
        return view('livewire.magazine.create');
    }
}
