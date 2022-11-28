<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinedUser extends Model
{
    protected $fillable = [
        'full_name',
        'image',
        'age',
        'profession',
        'occupation',
    ];



    use HasFactory;
}
