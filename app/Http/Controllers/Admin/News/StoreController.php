<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreRequest;
use App\Models\News;
use App\Models\NewsImage;
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

        $data['main_image'] = Storage::put('/public/images/news', $data['main_image']);

        $news = News::firstOrCreate($data);

        if(isset($images)) {
            foreach ($images as $image) {
                $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/films', $image);
                Storage::put('/public/images/films', $image);

                NewsImage::create([
                    'path' => $imagePath,
                    'news_id' => $news->id
                ]);
                Storage::delete($imagePath);
            }
        }

        return redirect()->route('admin.news.index');

    }
}
