<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Http\Requests\Admin\Cinema\StoreRequest;
use App\Models\Cinema;
use App\Models\CinemaImage;
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

        if(isset($data['logo_image'])) {
            $data['logo_image'] = Storage::put('/public/images/cinema', $data['logo_image']);
        }
        if(isset($data['top_banner'])) {
            $data['top_banner'] = Storage::put('/public/images/cinema', $data['top_banner']);
        }

        $cinema = Cinema::firstOrCreate($data);

        if(isset($images)) {
            CinemaImage::store($cinema, $images);
        }

        return redirect()->route('admin.cinema.index');

    }
}
