<?php

namespace App\Http\Controllers\Film\Soon;

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
        return view('film.soon.index', compact('mainPage', 'films'));
    }
}
