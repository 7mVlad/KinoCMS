<?php

namespace App\Http\Controllers\Film\Poster;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Film;
use App\Models\FilmImage;
use App\Models\MainPage;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Film $film)
    {
        $mainPage = MainPage::find(1);
        $filmImages = FilmImage::where('film_id', '=', $film->id)->get();
        return view('film.show', compact('mainPage', 'film', 'filmImages'));
    }
}
