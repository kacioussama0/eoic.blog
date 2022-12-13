<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    use HasFactory;
    protected $guarded = [];

    public function display_name() {
        if(config('app.locale') == 'en')
            return   $this -> blog_name_en;

        elseif(config('app.locale') == 'fr')

         return  $this->blog_name_fr;

        return   $this -> blog_name;

    }

    public function slogan() {
        if(config('app.locale') == 'en')
            return   $this -> slogan_en;

        elseif(config('app.locale') == 'fr')

            return  $this->slogan_fr;

        return   $this -> slogan;

    }

    public function vision() {
        if(config('app.locale') == 'en')
            return   $this -> vision_en;

        elseif(config('app.locale') == 'fr')

            return  $this->vision_fr;

        return   $this -> vision;

    }

    public function message() {
        if(config('app.locale') == 'en')
            return   $this -> message_en;

        elseif(config('app.locale') == 'fr')

            return  $this->message_fr;

        return   $this -> message;

    }

    public function goals() {
        if(config('app.locale') == 'en')
            return   $this -> goals_en;

        elseif(config('app.locale') == 'fr')

            return  $this->goals_fr;

        return   $this -> goals;

    }

    public function values() {
        if(config('app.locale') == 'en')
            return   $this -> values_en;

        elseif(config('app.locale') == 'fr')

            return  $this->values_fr;

        return   $this -> values;

    }

    public function description() {

        if(config('app.locale') == 'en')
            return   $this -> blog_description_en;
        elseif(config('app.locale') == 'fr')
            return  $this->blog_description_fr;

        return $this -> blog_description ;
    }
}
