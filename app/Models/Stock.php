<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';
    protected $guarded = false;

    public function cinemas()
    {
        return $this->belongsToMany( Cinema::class, 'stock_cinemas', 'stock_id', 'cinema_id');
    }
}
