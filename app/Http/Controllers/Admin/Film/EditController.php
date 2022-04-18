<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmImage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke(Film $film)
    {

        $filmImages = DB::table('film_images')->where('film_id', '=', $film->id)->get();

        foreach ($filmImages as $filmImage) {
            $filmPaths[] = $filmImage->path;
        }

        $seoBlock = SeoBlock::find($film->seo_block_id);

        if(isset($filmPaths)) {
            return view('admin.film.edit', compact('film', 'filmImages', 'filmPaths', 'seoBlock'));
        } else {
            return view('admin.film.edit', compact('film', 'filmImages', 'seoBlock'));
        }
    }
}
