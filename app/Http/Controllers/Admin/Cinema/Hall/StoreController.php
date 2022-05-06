<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cinema\Hall\StoreRequest;
use App\Models\Cinema;
use App\Models\Hall;
use App\Models\HallImage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, Cinema $cinema)
    {
        $data = $request->validated();
        $data['cinema_id'] = $cinema->id;

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

        $data['hall_scheme'] = Storage::put('/public/images/hall', $data['hall_scheme']);
        $data['top_banner'] = Storage::put('/public/images/hall', $data['top_banner']);

        $hall = Hall::firstOrCreate($data);

        if(isset($images)) {
            foreach ($images as $image) {
                $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/hall', $image);
                Storage::put('/public/images/hall', $image);

                HallImage::create([
                    'path' => $imagePath,
                    'hall_id' => $hall->id
                ]);

                Storage::delete($imagePath);
            }
        }

        return redirect()->route('admin.cinema.edit', $cinema->id);

    }
}
