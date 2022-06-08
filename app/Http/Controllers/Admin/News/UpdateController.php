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

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request ,News $news)
    {
        $data = $request->validated();

        if(isset($data['deleteImg'])) {

            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);

            foreach($deleteImgs as $deleteImg) {
                DB::table('news_images')->where('path', '=', $deleteImg)->delete();
            }
        }

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        $data = $this->service->seoUpdate($data, $news);

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/news', $data['main_image']);
        }

        if(isset($images)) {
            NewsImage::store($news, $images);
        }

        $news->update($data);

        return redirect()->route('admin.news.index');
    }
}
