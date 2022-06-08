<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StockImage extends Model
{
    use HasFactory;

    protected $table = 'stock_images';
    protected $guarded = false;

    public static function store($stock, $images)
    {
        $stockImages = DB::table('stock_images')->where('stock_id', '=', $stock->id)->get()->pluck('id')->toArray();

        foreach ($images as $key => $image) {

            $id = $stockImages[$key] ?? 0;

            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/stock', $image);

            Storage::put('/public/images/stock', $image);

            StockImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'stock_id' => $stock->id
            ]);

            Storage::delete($imagePath);
        }
    }
}
