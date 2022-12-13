<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'title_fr',
        'is_published',
    ];


    public function title() {

        if(config('app.locale') == 'en')
            return  $this -> title_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> title_fr;

        return $this ->  title ;

    }
}
