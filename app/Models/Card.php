<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'image',
        'image_en',
        'image_fr',
        'user_id',
        'is_published'
    ];


    public function image() {

        if(config('app.locale') == 'en')
            return   $this -> image_en;
        elseif(config('app.locale') == 'fr')
            return  $this->image_fr;

        return $this -> image ;
    }

}
