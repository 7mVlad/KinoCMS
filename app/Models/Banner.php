<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';
    protected $guarded = false;

    public static function deleteBanner($data)
    {
        if (isset($data['deleteBannerTop'])) {

            foreach ($data['deleteBannerTop'] as $deleteBanner) {
                $banner = Banner::find($deleteBanner);

                isset($banner->image) ? Storage::disk('public')->delete($banner->image) : '';
                $banner->delete();
            }

            unset($data['deleteBannerTop']);
        }

        if (isset($data['deleteBannerBottom'])) {

            foreach ($data['deleteBannerBottom'] as $deleteBanner) {
                $banner = Banner::find($deleteBanner);

                isset($banner->image) ? Storage::disk('public')->delete($banner->image) : '';
                $banner->delete();
            }

            unset($data['deleteBannerBottom']);
        }

        return $data;
    }

    public static function storeOrUpdate($data)
    {

        $data = Banner::deleteBanner($data);

        if (isset($data['position'])) {
            $position = $data['position'];

            $banners = Banner::where('position', $position)->get();

            if (isset($data['images'])) {
                $images = $data['images'];
            }
            if (isset($data['url'])) {
                $urls = $data['url'];
                $text = $data['text'];

                foreach ($urls as $key => $url) {

                    $id = $banners[$key]->id ?? 0;

                    if (isset($images[$key])) {

                        $imagePath = Storage::disk('public')->put('images/banners', $images[$key]);
                        isset($banners[$key]->image) ? Storage::disk('public')->delete($banners[$key]->image) : '';

                        Banner::updateOrCreate(['id' => $id], [
                            'image' => $imagePath,
                            'url' => $url,
                            'text' => $text[$key],
                            'position' => $position
                        ]);
                    } else {
                        Banner::updateOrCreate(['id' => $id], [
                            'url' => $url,
                            'text' => $text[$key],
                            'position' => $position
                        ]);
                    }
                }
            }
        }
    }
}
