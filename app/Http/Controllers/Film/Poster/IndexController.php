<?php

namespace App\Http\Controllers\Film\Poster;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\MainPage;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $mainPage = MainPage::find(1);
        $films = Film::all();
        return view('film.poster.index', compact('mainPage', 'films'));
    }
}
