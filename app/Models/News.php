<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $guarded = false;

    public static function imageDelete($data)
    {
        if(isset($data['deleteImages'])) {

            $deleteImages = $data['deleteImages'];
            unset($data['deleteImages']);

            foreach($deleteImages as $deleteImage) {

                $image = NewsImage::find($deleteImage);

                Storage::disk('public')->delete($image->path);

                $image->delete();
            }
        }

        if(isset($data['deleteMainImage'])) {
            $mainImage = News::find($data['deleteMainImage']);

            Storage::disk('public')->delete($mainImage->main_image);

            $mainImage->update([
                'main_image' => null
            ]);
            unset($data['deleteMainImage']);
        }

        return $data;
    }

    public static function storeOrUpdate($data, $news)
    {

        $data = News::imageDelete($data);


        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('images/news', $data['main_image']);
            isset($news->main_image) ? Storage::disk('public')->delete($news->main_image) : '';
        }

        $id = $news->id ?? 0;

        $news = News::updateOrCreate(['id' => $id], $data);

        if(isset($images)) {
            NewsImage::storeImages($news, $images);
        }
    }

}
