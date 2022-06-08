<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Requests\Admin\Film\StoreRequest;
use App\Models\Film;
use App\Models\FilmImage;

use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        $data = $this->service->seoCreate($data);

        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/films', $data['main_image']);
        }

        $film = Film::firstOrCreate($data);

        if (isset($images)) {
            FilmImage::store($film, $images);
        }

        return redirect()->route('admin.film.index');
    }
}
