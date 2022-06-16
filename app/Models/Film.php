<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';
    protected $guarded = false;

    public static function imageDelete($data)
    {
        if(isset($data['deleteImages'])) {

            $deleteImages = $data['deleteImages'];
            unset($data['deleteImages']);

            foreach($deleteImages as $deleteImage) {

                $image = FilmImage::find($deleteImage);

                Storage::disk('public')->delete($image->path);

                $image->delete();
            }
        }

        if(isset($data['deleteMainImage'])) {
            $mainImage = Film::find($data['deleteMainImage']);

            Storage::disk('public')->delete($mainImage->main_image);
            $mainImage->update([
                'main_image' => null
            ]);
            unset($data['deleteMainImage']);
        }

        return $data;
    }

    public static function storeOrUpdate($data, $film)
    {

        $data = Film::imageDelete($data);

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('images/film', $data['main_image']);
            isset($film->main_image) ? Storage::disk('public')->delete($film->main_image) : '';
        }

        $id = $film->id ?? 0;

        $film = Film::updateOrCreate(['id' => $id], $data);

        if(isset($images)) {
            FilmImage::storeImages($film, $images);
        }
    }
}
