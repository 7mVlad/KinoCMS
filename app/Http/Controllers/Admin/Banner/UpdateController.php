<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\UpdateBgRequest;
use App\Http\Requests\Admin\Banner\UpdateRequest;
use App\Models\BannerBottom;
use App\Models\BannerTop;
use App\Models\MainPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();

        if(isset($data['bg_image'])) {

            $mainPage = MainPage::find(1);
            $image = $data['bg_image'];

            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/banner', $image);
            Storage::put('/public/images/banner', $image);

            $mainPage->update([
                'bg_banner' => $imagePath
            ]);
            Storage::delete($imagePath);
        }

        if(isset($data['position'])) {
            if($data['position'] == 'top') {
                if(isset($data['deleteImg'])) {
                    $deleteImgs = $data['deleteImg'];

                    foreach($deleteImgs as $key => $deleteImg) {
                        DB::table('banner_top')->where('path', '=', $deleteImg)->delete();
                    }
                }

                if(isset($data['images'])) {
                    $images = $data['images'];
                    $urls = $data['url'];
                    $texts = $data['text'];

                    foreach($images as $key => $image) {
                        $banner = BannerTop::find($key);
                        if($banner != null) {
                            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/banner', $image);
                            Storage::put('/public/images/banner', $image);

                            $banner->update([
                                    'id' => $key,
                                    'image' => $imagePath,
                                    'url' => $urls[$key],
                                    'text' => $texts[$key],
                                ]);

                            Storage::delete($imagePath);

                        } else {
                            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/banner', $image);
                            Storage::put('/public/images/banner', $image);

                            BannerTop::create(
                                [
                                    'id' => $key,
                                    'image' => $imagePath,
                                    'url' => $urls[$key],
                                    'text' => $texts[$key],
                                ]
                            );
                            Storage::delete($imagePath);
                        }


                    }
                }
            }
            else {
                if(isset($data['deleteImg'])) {
                    $deleteImgs = $data['deleteImg'];

                    foreach($deleteImgs as $key => $deleteImg) {
                        DB::table('banner_bottom')->where('path', '=', $deleteImg)->delete();
                    }
                }

                if(isset($data['images'])) {
                    $images = $data['images'];
                    $urls = $data['url'];
                    $texts = $data['text'];

                    foreach($images as $key => $image) {
                        $banner = BannerBottom::find($key);
                        if($banner != null) {
                            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/banner', $image);
                            Storage::put('/public/images/banner', $image);

                            $banner->update(
                                [
                                    'id' => $key,
                                    'image' => $imagePath,
                                    'url' => $urls[$key],
                                    'text' => $texts[$key],
                                ]
                            );
                            Storage::delete($imagePath);
                        } else {
                            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/banner', $image);
                            Storage::put('/public/images/banner', $image);

                            BannerBottom::create(
                                [
                                    'id' => $key,
                                    'image' => $imagePath,
                                    'url' => $urls[$key],
                                    'text' => $texts[$key],
                                ]
                            );
                            Storage::delete($imagePath);
                        }


                    }
                }
            }
        }



        return redirect()->route('admin.banner.index');
    }




}
