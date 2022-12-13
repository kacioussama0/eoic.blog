<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function title() {
        if(config('app.locale') == 'en')
            return   $this -> title_en;

        elseif(config('app.locale') == 'fr')

            return  $this->title_fr;

        return   $this -> title;

    }

    public function thumbnail() {

        if(config('app.locale') == 'en')
            return   $this -> thumbnail_en;
        elseif(config('app.locale') == 'fr')
            return  $this->thumbnail_fr;

        return $this -> thumbnail ;
    }


    public function book() {

        if(config('app.locale') == 'en')
            return   $this -> book_en;
        elseif(config('app.locale') == 'fr')
            return  $this->book_fr;

        return $this -> book ;
    }

}
