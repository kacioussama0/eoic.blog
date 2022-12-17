<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function description() {

        if(config('app.locale') == 'en')
            return   $this -> description_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> description_fr;

        return $this ->  description ;
    }

    public function thumbnail() {

        if(config('app.locale') == 'en')
            return   $this -> thumbnail_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> thumbnail_fr;

        return $this ->  thumbnail ;
    }

    public function title() {

        if(config('app.locale') == 'en')
            return  $this -> title_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> title_fr;

        return $this ->  title ;
    }
}
