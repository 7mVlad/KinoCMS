<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\UpdateRequest;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();

        if(isset($data['deleteImg'])) {
            $deleteImgs = $data['deleteImg'];

            foreach($deleteImgs as $key => $deleteImg) {
                DB::table('banner_images')->where('path', '=', $deleteImg)->delete();
            }
        }

        if(isset($data['images'])) {
            $images = $data['images'];
            $urls = $data['url'];
            $texts = $data['text'];

            foreach($images as $key => $image) {
                $banner = BannerImage::find($key);
                if($banner != null) {
                    $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/banner', $image);
                    $imageURL = Storage::put('/public/images/banner', $image);

                    $banner->update(
                        [
                            'id' => $key,
                            'image' => $imageURL,
                            'path' => $imagePath,
                            'url' => $urls[$key],
                            'text' => $texts[$key],
                        ]
                    );
                } else {
                    $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/banner', $image);
                    $imageURL = Storage::put('/public/images/banner', $image);

                    BannerImage::create(
                        [
                            'id' => $key,
                            'image' => $imageURL,
                            'path' => $imagePath,
                            'url' => $urls[$key],
                            'text' => $texts[$key],
                        ]
                    );
                }


            }
        }



        // return redirect()->route('admin.film.index');
    }
}
