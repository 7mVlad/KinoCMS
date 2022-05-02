<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoContact extends Model
{
    use HasFactory;

    protected $table = 'seo_contacts';
    protected $guarded = false;
}
