<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cinema\StoreRequest;
use App\Models\Cinema;
use App\Models\CinemaImage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        $seoURL = $data['seo_url'];
        $seoTitle = $data['seo_title'];
        $seoKeywords = $data['seo_keywords'];
        $seoDescription = $data['seo_description'];

        unset($data['seo_url']);
        unset($data['seo_title']);
        unset($data['seo_keywords']);
        unset($data['seo_description']);

        $seoBlock = SeoBlock::create([
            'url' => $seoURL,
            'title' => $seoTitle,
            'keywords' => $seoKeywords,
            'description' => $seoDescription,
        ]);

        $data['seo_block_id'] = $seoBlock->id;

        $data['logo_image'] = Storage::put('/public/images/cinema', $data['logo_image']);
        $data['top_banner'] = Storage::put('/public/images/cinema', $data['top_banner']);

        $cinema = Cinema::firstOrCreate($data);

        if(isset($images)) {
            foreach ($images as $image) {
                $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/cinema', $image);
                Storage::put('/public/images/cinema', $image);

                CinemaImage::create([
                    'path' => $imagePath,
                    'cinema_id' => $cinema->id
                ]);

                Storage::delete($imagePath);
            }
        }

        return redirect()->route('admin.film.index');

    }
}
