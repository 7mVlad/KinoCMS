<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hall extends Model
{
    use HasFactory;

    protected $table = 'halls';
    protected $guarded = false;

    public static function imageDelete($data)
    {
        if (isset($data['deleteImages'])) {

            $deleteImages = $data['deleteImages'];
            unset($data['deleteImages']);

            foreach ($deleteImages as $deleteImage) {

                $image = HallImage::find($deleteImage);

                Storage::disk('public')->delete($image->path);

                $image->delete();
            }
        }

        if (isset($data['deleteSchemeImage'])) {
            $image = Hall::find($data['deleteSchemeImage']);

            Storage::disk('public')->delete($image->hall_scheme);

            $image->update([
                'hall_scheme' => null
            ]);
            unset($data['deleteSchemeImage']);
        }

        if (isset($data['deleteBannerImage'])) {
            $image = Hall::find($data['deleteBannerImage']);

            Storage::disk('public')->delete($image->top_banner);

            $image->update([
                'top_banner' => null
            ]);
            unset($data['deleteBannerImage']);
        }

        return $data;
    }

    public static function storeOrUpdate($data, $hall)
    {
        $data = Hall::imageDelete($data);

        if (isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        if (isset($data['hall_scheme'])) {
            $data['hall_scheme'] = Storage::disk('public')->put('images/hall', $data['hall_scheme']);
            isset($hall->hall_scheme) ? Storage::disk('public')->delete($hall->hall_scheme) : '';
        }

        if (isset($data['top_banner'])) {
            $data['top_banner'] = Storage::disk('public')->put('images/hall', $data['top_banner']);
            isset($hall->top_banner) ? Storage::disk('public')->delete($hall->top_banner) : '';
        }

        $id = $hall->id ?? 0;

        $hall = Hall::updateOrCreate(['id' => $id], $data);

        if (isset($images)) {
            HallImage::storeImages($hall, $images);
        }

    }
}
