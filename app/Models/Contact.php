<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $guarded = false;

    public function getCinema() {
        return $this->hasOne(Cinema::class, 'id', 'cinema_id');
    }
}
