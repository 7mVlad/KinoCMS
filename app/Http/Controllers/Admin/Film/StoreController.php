<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\StoreRequest;
use App\Models\Film;
use App\Models\FilmImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $images = $data['images'];
        unset($data['images']);

        $data['main_image'] = Storage::put('/public/images/film', $data['main_image']);

        $film = Film::firstOrCreate($data);

        foreach ($images as $image) {
            $imagePath = Storage::put('/public/images/films', $image);

            FilmImage::create([
                'path' => $imagePath,
                'url' => Storage::url($imagePath),
                'film_id' => $film->id
            ]);
        }

        return redirect()->route('admin.film.index');

    }
}
