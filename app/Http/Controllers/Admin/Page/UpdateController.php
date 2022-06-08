<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Requests\Admin\Page\UpdateRequest;
use App\Models\Page;
use App\Models\PageImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Page $page)
    {
        $data = $request->validated();

        if(isset($data['deleteImg'])) {

            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);

            foreach($deleteImgs as $deleteImg) {
                DB::table('page_images')->where('path', '=', $deleteImg)->delete();
            }
        }

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/page', $data['main_image']);
        }

        $data = $this->service->seoUpdate($data, $page);

        if(isset($images)) {
            PageImage::store($page, $images);
        }

        $page->update($data);

        return redirect()->route('admin.page.index');
    }
}
