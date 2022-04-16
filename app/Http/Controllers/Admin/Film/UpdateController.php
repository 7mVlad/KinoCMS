<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\UpdateRequest;
use App\Models\Film;
use App\Models\FilmImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Film $film)
    {
        $data = $request->validated();
        $images = $data['images'];
        unset($data['images']);

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/film', $data['main_image']);
        }

        $filmImages = DB::table('film_images')->where('film_id', '=', $film->id)->get();

        foreach($filmImages as $key => $filmImage) {
            $filmArr[] = $filmImage;
        }

        foreach($images as $key => $image) {
            if(array_key_exists($key, $filmArr)) {
                $id = $filmArr[$key]->id;
                $filmImage = FilmImage::find($id);
                $imagePath = Storage::put('/public/images/films', $image);
                $filmImage->update([
                    'path' => $imagePath,
                    'url' => Storage::url($imagePath),
                ]);
            } else {
                $imagePath = Storage::put('/public/images/films', $image);

                FilmImage::create([
                    'path' => $imagePath,
                    'url' => Storage::url($imagePath),
                    'film_id' => $film->id
                ]);
            }
        }

        return redirect()->route('admin.film.index');
    }
}
