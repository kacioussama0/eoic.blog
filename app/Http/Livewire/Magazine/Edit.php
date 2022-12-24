<?php

namespace App\Http\Livewire\Magazine;

use App\Models\Magazine;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
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


    public function updated($name, $value)
    {
        $this->validate([
            'title' => 'required',
            'thumbnail' => 'required|mimes:jpeg,webp,png',
            'book' => 'mimes:pdf|required'
        ]);

    }

    public function edit(Request $request , Magazine $magazine) {

        $this->validate([
            'title' => 'required',
            'thumbnail' => 'required|mimes:jpeg,webp,png',
            'book' => 'required|mimes:pdf',

        ]);

        $book = $bookEN = $bookFR = $thumbnail = $thumbnailEN = $thumbnailFR =  '';

        $book = $this->book->store('magazines/book/ar','public');
        $thumbnail = $this->thumbnail->store('magazines/thumbnail/ar','public');

        if(!empty($this->thumbnail_en)) {
            $thumbnailEN = $this->thumbnail_en->store('magazines/thumbnail/en','public');
        }

        if(!empty($this->book_en)) {
            $bookEN = $this->book_en->store('magazines/book/en','public');
        }

        if(!empty($this->thumbnail_fr)) {
            $thumbnailFR = $this->thumbnail_fr->store('magazines/thumbnail/fr','public');
        }

        if(!empty($this->book_fr)) {
            $bookFR = $this->book_fr->store('magazines/book/fr','public');
        }

        $magazine->update([
            'title' => $this->title,
            'title_en' => $this->title_en,
            'title_fr' => $this->title_fr,
            'book' => $book,
            'book_en' => $bookEN,
            'book_fr' => $bookFR,
            'thumbnail' => $thumbnail,
            'thumbnail_en' => $thumbnailEN,
            'thumbnail_fr' => $thumbnailFR,
            'is_published' => $this->is_published ? 1 : 0,
        ]);

        return redirect()->to('admin/magazines')->with([
            'success'=> 'تم تعديل المجلة بنجاح'
        ]);

    }


    public function render()
    {
        return view('livewire.magazine.edit');
    }
}
