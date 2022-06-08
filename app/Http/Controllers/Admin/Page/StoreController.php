<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Requests\Admin\Page\StoreRequest;
use App\Models\Page;
use App\Models\PageImage;
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

        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/page', $data['main_image']);
        }

        $page = Page::firstOrCreate($data);

        if(isset($images)) {
            PageImage::store($page, $images);
        }

        return redirect()->route('admin.page.index');

    }
}
