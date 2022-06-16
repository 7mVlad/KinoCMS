<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cinema extends Model
{
    use HasFactory;

    protected $table = 'cinemas';
    protected $guarded = false;

    public static function imageDelete($data)
    {
        if (isset($data['deleteImages'])) {

            $deleteImages = $data['deleteImages'];
            unset($data['deleteImages']);

            foreach ($deleteImages as $deleteImage) {

                $image = CinemaImage::find($deleteImage);

                Storage::disk('public')->delete($image->path);

                $image->delete();
            }
        }

        if (isset($data['deleteLogoImage'])) {
            $image = Cinema::find($data['deleteLogoImage']);

            Storage::disk('public')->delete($image->logo_image);

            $image->update([
                'logo_image' => null
            ]);
            unset($data['deleteLogoImage']);
        }

        if (isset($data['deleteBannerImage'])) {
            $image = Cinema::find($data['deleteBannerImage']);

            Storage::disk('public')->delete($image->top_banner);

            $image->update([
                'top_banner' => null
            ]);
            unset($data['deleteBannerImage']);
        }

        return $data;
    }

    public static function storeOrUpdate($data, $cinema)
    {

        $data = Cinema::imageDelete($data);

        if (isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        if (isset($data['logo_image'])) {
            $data['logo_image'] = Storage::disk('public')->put('images/cinema', $data['logo_image']);
            isset($cinema->logo_image) ? Storage::disk('public')->delete($cinema->logo_image) : '';
        }

        if (isset($data['top_banner'])) {
            $data['top_banner'] = Storage::disk('public')->put('images/cinema', $data['top_banner']);
            isset($cinema->top_banner) ? Storage::disk('public')->delete($cinema->top_banner) : '';
        }

        $id = $cinema->id ?? 0;

        $cinema = Cinema::updateOrCreate(['id' => $id], $data);

        if (isset($images)) {
            CinemaImage::storeImages($cinema, $images);
        }

        return $cinema;
    }
}
