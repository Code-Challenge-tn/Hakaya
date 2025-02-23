<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'image',
        'video_url',
        'description',
        'date_publication',
        'categorie'

    ];
}
