<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $guarded = false;

    public function getHall() {
        return $this->hasOne(Hall::class, 'id', 'hall_id');
    }

    public function getFilm() {
        return $this->hasOne(Film::class, 'id', 'film_id');
    }

}
