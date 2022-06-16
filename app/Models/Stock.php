<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';
    protected $guarded = false;

    public function cinemas()
    {
        return $this->belongsToMany( Cinema::class, 'stock_cinemas', 'stock_id', 'cinema_id');
    }

    public static function imageDelete($data)
    {
        if(isset($data['deleteImages'])) {

            $deleteImages = $data['deleteImages'];
            unset($data['deleteImages']);

            foreach($deleteImages as $deleteImage) {

                $image = StockImage::find($deleteImage);

                Storage::disk('public')->delete($image->path);

                $image->delete();
            }
        }

        if(isset($data['deleteMainImage'])) {
            $mainImage = Stock::find($data['deleteMainImage']);

            Storage::disk('public')->delete($mainImage->main_image);

            $mainImage->update([
                'main_image' => null
            ]);
            unset($data['deleteMainImage']);
        }

        return $data;
    }

    public static function storeOrUpdate($data, $stock)
    {

        $data = Stock::imageDelete($data);


        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('images/stock', $data['main_image']);
            isset($stock->main_image) ? Storage::disk('public')->delete($stock->main_image) : '';

        }

        $id = $stock->id ?? 0;

        $stock = Stock::updateOrCreate(['id' => $id], $data);

        if(isset($images)) {
            StockImage::storeImages($stock, $images);
        }

        return $stock;
    }
}
