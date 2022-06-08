<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Requests\Admin\Film\UpdateRequest;
use App\Models\Film;
use App\Models\FilmImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request ,Film $film)
    {
        $data = $request->validated();

        if(isset($data['deleteImg'])) {

            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);

            foreach($deleteImgs as $deleteImg) {
                DB::table('film_images')->where('path', '=', $deleteImg)->delete();
            }
        }

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        $data = $this->service->seoUpdate($data, $film);

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/films', $data['main_image']);
        }


        if(isset($images)) {
            FilmImage::store($film, $images);
        }

        $film->update($data);

        return redirect()->route('admin.film.index');
    }
}
