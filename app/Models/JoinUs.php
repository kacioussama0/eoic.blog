<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JoinUs extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'full_name',
        'date_of_birth',
        'place_of_birth',
        'email',
        'phone',
        'nationality_and_residence',
        'national_card_id',
        'national_card_place',
        'address',
        'level',
        'level_speciality',
        'job',
        'joined_associations',
        'joined_associations_name',
        'joined_political_parts',
        'joined_political_parts_name',
        'inclinations',
        'abilities',
        'additions_human_rights',
        'additions_media',
        'why_join',
    ];
}
