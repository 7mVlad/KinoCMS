<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmImage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends BaseController
{
    public function __invoke(Film $film)
    {

        $filmImages = DB::table('film_images')->where('film_id', '=', $film->id)->get()->pluck('path')->toArray();

        $seoBlock = SeoBlock::find($film->seo_block_id);

        return view('admin.film.edit', compact('film', 'filmImages', 'seoBlock'));

    }
}
