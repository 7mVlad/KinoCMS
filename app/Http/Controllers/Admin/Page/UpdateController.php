<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\UpdateRequest;
use App\Models\Page;
use App\Models\PageImage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Page $page)
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

        $seoBlock = SeoBlock::find($page->seo_block_id);
        $seoBlock->update([
            'url' => $seoURL,
            'title' => $seoTitle,
            'keywords' => $seoKeywords,
            'description' => $seoDescription,
        ]);

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/page', $data['main_image']);
        }

        $pageImages = DB::table('page_images')->where('page_id', '=', $page->id)->get();

        foreach($pageImages as $key => $pageImage) {
            $pageArr[] = $pageImage;
        }

        if(isset($images)) {
            foreach($images as $key => $image) {
                if(array_key_exists($key, $pageArr)) {
                    $id = $pageArr[$key]->id;
                    $pageImage = PageImage::find($id);
                    $imagePath = Storage::put('/public/images/stock', $image);
                    $pageImage->update([
                        'path' => $imagePath,
                    ]);
                } else {
                    $imagePath = Storage::put('/public/images/stock', $image);

                    PageImage::create([
                        'path' => $imagePath,
                        'page_id' => $page->id
                    ]);
                }
            }
        }

        $page->update($data);

        return redirect()->route('admin.page.index');
    }
}
