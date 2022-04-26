<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockImage extends Model
{
    use HasFactory;

    protected $table = 'stock_images';
    protected $guarded = false;
}