<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cinema\Hall\UpdateRequest;
use App\Models\Hall;
use App\Models\HallImage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Hall $hall)
    {
        $data = $request->validated();

        if(isset($data['deleteImg'])) {
            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);
        }

        if(isset($deleteImgs)) {

            foreach($deleteImgs as $deleteImg) {

                DB::table('hall_images')->where('path', '=', $deleteImg)->delete();

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

        $seoBlock = SeoBlock::find($hall->seo_block_id);
        $seoBlock->update([
            'url' => $seoURL,
            'title' => $seoTitle,
            'keywords' => $seoKeywords,
            'description' => $seoDescription,
        ]);

        if(isset($data['hall_scheme'])) {
            $data['hall_scheme'] = Storage::put('/public/images/hall', $data['hall_scheme']);
        }

        if(isset($data['top_banner'])) {
            $data['top_banner'] = Storage::put('/public/images/hall', $data['top_banner']);
        }

        $hallImages = DB::table('hall_images')->where('hall_id', '=', $hall->id)->get();

        foreach($hallImages as $key => $hallImage) {
            $hallArr[] = $hallImage;
        }

        if(isset($images)) {
            foreach($images as $key => $image) {

                if(isset($hallArr)) {
                    if(array_key_exists($key, $hallArr)) {
                        $id = $hallArr[$key]->id;
                        $hallImage = HallImage::find($id);
                        $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/hall', $image);
                        Storage::put('/public/images/hall', $image);
                        $hallImage->update([
                            'path' => $imagePath,
                        ]);
                        Storage::delete($imagePath);
                    }
                    else {
                        $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/hall', $image);
                        Storage::put('/public/images/hall', $image);

                        HallImage::create([
                            'path' => $imagePath,
                            'hall_id' => $hall->id
                        ]);
                        Storage::delete($imagePath);
                    }
                }
                else {
                    $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/hall', $image);
                    Storage::put('/public/images/hall', $image);

                    HallImage::create([
                        'path' => $imagePath,
                        'hall_id' => $hall->id
                    ]);
                    Storage::delete($imagePath);
                }
            }
        }

        $hall->update($data);

        return redirect()->route('admin.cinema.edit', $hall->cinema_id);
    }
}
