<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cinema\UpdateRequest;
use App\Models\Cinema;
use App\Models\CinemaImage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Cinema $cinema)
    {
        $data = $request->validated();

        if(isset($data['deleteImg'])) {
            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);
        }

        if(isset($deleteImgs)) {

            foreach($deleteImgs as $deleteImg) {

                DB::table('cinema_images')->where('path', '=', $deleteImg)->delete();

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

        $seoBlock = SeoBlock::find($cinema->seo_block_id);
        $seoBlock->update([
            'url' => $seoURL,
            'title' => $seoTitle,
            'keywords' => $seoKeywords,
            'description' => $seoDescription,
        ]);

        if(isset($data['logo_image'])) {
            $data['logo_image'] = Storage::put('/public/images/cinema', $data['logo_image']);
        }

        if(isset($data['top_banner'])) {
            $data['top_banner'] = Storage::put('/public/images/cinema', $data['top_banner']);
        }

        $cinemaImages = DB::table('cinema_images')->where('cinema_id', '=', $cinema->id)->get();

        foreach($cinemaImages as $key => $cinemaImage) {
            $cinemaArr[] = $cinemaImage;
        }

        if(isset($images)) {
            foreach($images as $key => $image) {

                if(isset($cinemaArr)) {
                    if(array_key_exists($key, $cinemaArr)) {
                        $id = $cinemaArr[$key]->id;
                        $cinemaImage = CinemaImage::find($id);
                        $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/cinema', $image);
                        Storage::put('/public/images/cinema', $image);
                        $cinemaImage->update([
                            'path' => $imagePath,
                        ]);
                        Storage::delete($imagePath);
                    }
                    else {
                        $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/cinema', $image);
                        Storage::put('/public/images/cinema', $image);

                        CinemaImage::create([
                            'path' => $imagePath,
                            'cinema_id' => $cinema->id
                        ]);
                        Storage::delete($imagePath);
                    }
                }
                else {
                    $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/cinema', $image);
                    Storage::put('/public/images/cinema', $image);

                    CinemaImage::create([
                        'path' => $imagePath,
                        'cinema_id' => $cinema->id
                    ]);
                    Storage::delete($imagePath);
                }
            }
        }

        $cinema->update($data);

        return redirect()->route('admin.cinema.index');
    }
}
