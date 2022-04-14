<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmImage extends Model
{
    use HasFactory;

    protected $table = 'film_images';
    protected $guarded = false;
}
