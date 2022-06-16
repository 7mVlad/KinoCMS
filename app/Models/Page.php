<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $guarded = false;

    public static function imageDelete($data)
    {
        if(isset($data['deleteImages'])) {

            $deleteImages = $data['deleteImages'];
            unset($data['deleteImages']);

            foreach($deleteImages as $deleteImage) {

                $image = PageImage::find($deleteImage);

                Storage::disk('public')->delete($image->path);

                $image->delete();
            }
        }

        if(isset($data['deleteMainImage'])) {
            $mainImage = Page::find($data['deleteMainImage']);

            Storage::disk('public')->delete($mainImage->main_image);
            $mainImage->update([
                'main_image' => null
            ]);
            unset($data['deleteMainImage']);
        }

        return $data;
    }

    public static function storeOrUpdate($data, $page)
    {

        $data = Page::imageDelete($data);


        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('images/page', $data['main_image']);
            isset($page->main_image) ? Storage::disk('public')->delete($page->main_image) : '';
        }

        $id = $page->id ?? 0;

        $page = Page::updateOrCreate(['id' => $id], $data);

        if(isset($images)) {
            PageImage::storeImages($page, $images);
        }
    }
}
