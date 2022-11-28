<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'blog_name',
        'blog_description',
        'phone',
        'email',
        'address'
    ];
    use HasFactory;
}
