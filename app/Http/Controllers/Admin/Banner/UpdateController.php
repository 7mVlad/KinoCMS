<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\UpdateRequest;
use App\Models\BannerBottom;
use App\Models\BannerTop;
use App\Models\MainPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();

        // Сквозной баннер
        if (isset($data['bg_image'])) {

            $mainPage = MainPage::find(1);
            $image = $data['bg_image'];

            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/banner', $image);
            Storage::put('/public/images/banner', $image);

            $mainPage->update([
                'bg_banner' => $imagePath
            ]);
            Storage::delete($imagePath);
        }

        // Баннеры
        if (isset($data['position'])) {
            $position = $data['position'];

            if (isset($position)) {

                if (isset($data['deleteImg'])) {
                    $deleteImgs = $data['deleteImg'];

                    foreach ($deleteImgs as $key => $deleteImg) {
                        if ($position == 'top') {
                            DB::table('banner_top')->where('image', '=', $deleteImg)->delete();
                        } else {
                            DB::table('banner_bottom')->where('image', '=', $deleteImg)->delete();
                        }
                    }
                }

                if (isset($data['images'])) {

                    $images = $data['images'];
                    $url = $data['url'];
                    $text = $data['text'];

                    foreach ($images as $key => $image) {

                        $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/banner', $image);
                        Storage::put('/public/images/banner', $image);

                        if ($position == 'top') {
                            BannerTop::updateOrCreate(['id' => $key], [
                                'id' => $key,
                                'image' => $imagePath,
                                'url' => $url[$key],
                                'text' => $text[$key],
                            ]);
                        } else {
                            BannerBottom::updateOrCreate(['id' => $key], [
                                'id' => $key,
                                'image' => $imagePath,
                                'url' => $url[$key],
                                'text' => $text[$key],
                            ]);
                        }

                        Storage::delete($imagePath);
                    }
                }
            }
        }


        return redirect()->route('admin.banner.index');
    }
}
