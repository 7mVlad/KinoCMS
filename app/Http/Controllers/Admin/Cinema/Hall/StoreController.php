<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Http\Requests\Admin\Cinema\Hall\StoreRequest;
use App\Models\Cinema;
use App\Models\Hall;
use App\Models\HallImage;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request, Cinema $cinema)
    {
        $data = $request->validated();
        $data['cinema_id'] = $cinema->id;

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        $data = $this->service->seoCreate($data);

        if(isset($data['hall_scheme'])) {
            $data['hall_scheme'] = Storage::put('/public/images/hall', $data['hall_scheme']);
        }

        if(isset($data['top_banner'])) {
            $data['top_banner'] = Storage::put('/public/images/hall', $data['top_banner']);
        }

        $hall = Hall::firstOrCreate($data);

        if(isset($images)) {
            HallImage::store($hall, $images);
        }

        return redirect()->route('admin.cinema.edit', $cinema->id);

    }
}
