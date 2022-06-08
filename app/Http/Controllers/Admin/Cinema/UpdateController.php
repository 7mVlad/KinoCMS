<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Http\Requests\Admin\Cinema\UpdateRequest;
use App\Models\Cinema;
use App\Models\CinemaImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request ,Cinema $cinema)
    {
        $data = $request->validated();

        $data = $this->service->seoUpdate($data, $cinema);

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        if(isset($data['deleteImg'])) {

            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);

            foreach($deleteImgs as $deleteImg) {
                DB::table('cinema_images')->where('path', '=', $deleteImg)->delete();
            }
        }

        if(isset($data['logo_image'])) {
            $data['logo_image'] = Storage::put('/public/images/cinema', $data['logo_image']);
        }
        if(isset($data['top_banner'])) {
            $data['top_banner'] = Storage::put('/public/images/cinema', $data['top_banner']);
        }

        if(isset($images)) {
            CinemaImage::store($cinema, $images);
        }

        $cinema->update($data);

        return redirect()->route('admin.cinema.index');
    }
}
