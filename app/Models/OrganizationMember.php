<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationMember extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function full_name() {

        if(config('app.locale') == 'en' || config('app.locale') == 'fr')
            return  $this -> name_latin;

        return $this ->  name ;
    }

    public function occupation() {

        if(config('app.locale') == 'en')
            return  $this -> occupation_en;
        elseif(config('app.locale') == 'fr')
            return  $this-> occupation_fr;

        return $this ->occupation ;
    }
}
