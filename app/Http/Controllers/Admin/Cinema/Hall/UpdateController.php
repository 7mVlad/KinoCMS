<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Http\Requests\Admin\Cinema\Hall\UpdateRequest;
use App\Models\Hall;
use App\Models\HallImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Hall $hall)
    {
        $data = $request->validated();

        if (isset($data['deleteImg'])) {

            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);

            foreach ($deleteImgs as $deleteImg) {
                DB::table('hall_images')->where('path', '=', $deleteImg)->delete();
            }
        }

        if (isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        $data = $this->service->seoUpdate($data, $hall);

        if (isset($data['hall_scheme'])) {
            $data['hall_scheme'] = Storage::put('/public/images/hall', $data['hall_scheme']);
        }

        if (isset($data['top_banner'])) {
            $data['top_banner'] = Storage::put('/public/images/hall', $data['top_banner']);
        }

        if(isset($images)) {
            HallImage::store($hall, $images);
        }


        $hall->update($data);

        return redirect()->route('admin.cinema.edit', $hall->cinema_id);
    }
}
