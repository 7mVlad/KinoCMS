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

    public static function storeImages($stock, $images)
    {
        $stockImages = DB::table('stock_images')->where('stock_id', $stock->id)->get()->toArray();

        foreach ($images as $key => $image) {

            $id = $stockImages[$key]->id ?? 0;

            $imagePath = Storage::disk('public')->put('images/stock', $image);

            StockImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'stock_id' => $stock->id
            ]);

            if(isset($stockImages[$key]->path)) {
                Storage::disk('public')->delete($stockImages[$key]->path);
            }
        }
    }
}
