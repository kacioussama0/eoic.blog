<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function name() {

        if(config('app.locale') == 'en')
            return   $this -> name_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> name_fr;

        return $this ->  name ;
    }
}
