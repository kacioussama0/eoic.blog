<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model

{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];




    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this -> belongsToMany(Tag::class);
    }

    public function user() {
        return $this -> belongsTo(User::class,'created_by');
    }

    public function slug() {

        if(config('app.locale') == 'en')
            return   $this -> slug_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> slug_fr;

        return $this -> slug ;
    }


    public function content() {

        if(config('app.locale') == 'en')
            return   $this -> content_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> content_fr;

        return $this ->  content ;
    }

    public function image() {

        if(config('app.locale') == 'en')
            return   $this -> image_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> image_fr;

        return $this ->  image ;
    }

    public function title() {

        if(config('app.locale') == 'en')
             return  $this -> title_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> title_fr;

        return $this ->  title ;
    }

}
