<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Requests\Admin\News\StoreRequest;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        $data = $this->service->seoCreate($data);

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/news', $data['main_image']);
        }

        $news = News::firstOrCreate($data);

        if(isset($images)) {
            NewsImage::store($news, $images);
        }

        return redirect()->route('admin.news.index');

    }
}
