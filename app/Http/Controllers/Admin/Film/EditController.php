<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmImage;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Film $film)
    {
        $filmImages = FilmImage::all();

        foreach ($filmImages as $filmImage) {
            if($film->id == $filmImage->film_id) {
                $filmPaths[] = $filmImage->path;
            }
        }

        // for($i = 0; $i < 5; $i++) {
        //     dump(isset($filmPaths[$i]));
        // }


        return view('admin.film.edit', compact('film', 'filmImages', 'filmPaths'));
    }
}
