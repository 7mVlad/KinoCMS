<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaImage extends Model
{
    use HasFactory;

    protected $table = 'cinema_images';
    protected $guarded = false;
}
