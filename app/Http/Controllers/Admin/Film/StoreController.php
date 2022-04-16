<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\StoreRequest;
use App\Models\Film;
use App\Models\FilmImage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $images = $data['images'];
        unset($data['images']);

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

        $data['main_image'] = Storage::put('/public/images/film', $data['main_image']);

        $film = Film::firstOrCreate($data);

        foreach ($images as $image) {
            $imagePath = Storage::put('/public/images/films', $image);

            FilmImage::create([
                'path' => $imagePath,
                'url' => Storage::url($imagePath),
                'film_id' => $film->id
            ]);
        }

        return redirect()->route('admin.film.index');

    }
}
