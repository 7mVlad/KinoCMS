<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\UpdateRequest;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,News $news)
    {
        $data = $request->validated();

        if(isset($data['deleteImg'])) {
            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);
        }

        if(isset($deleteImgs)) {

            foreach($deleteImgs as $deleteImg) {

                DB::table('news_images')->where('path', '=', $deleteImg)->delete();

            }
        }

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

        $seoBlock = SeoBlock::find($news->seo_block_id);
        $seoBlock->update([
            'url' => $seoURL,
            'title' => $seoTitle,
            'keywords' => $seoKeywords,
            'description' => $seoDescription,
        ]);

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/news', $data['main_image']);
        }

        $newsImages = DB::table('news_images')->where('news_id', '=', $news->id)->get();

        foreach($newsImages as $key => $newsImage) {
            $newsArr[] = $newsImage;
        }

        if(isset($images)) {
            foreach($images as $key => $image) {
                if(array_key_exists($key, $newsArr)) {
                    $id = $newsArr[$key]->id;
                    $newsImage = NewsImage::find($id);
                    $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/films', $image);
                    Storage::put('/public/images/films', $image);
                    $newsImage->update([
                        'path' => $imagePath,
                    ]);
                    Storage::delete($imagePath);
                } else {
                    $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/films', $image);
                    Storage::put('/public/images/films', $image);

                    NewsImage::create([
                        'path' => $imagePath,
                        'news_id' => $news->id
                    ]);
                    Storage::delete($imagePath);
                }
            }
        }

        $news->update($data);

        return redirect()->route('admin.news.index');
    }
}
