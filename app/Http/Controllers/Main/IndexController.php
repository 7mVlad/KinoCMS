<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Film;
use App\Models\MainPage;
use App\Models\Page;


class IndexController extends Controller
{
    public function __invoke()
    {
        $mainPage = MainPage::first();
        $bannersTop = Banner::where('position', 'top')->get();
        $bannersBottom = Banner::where('position', 'bottom')->get();
        $films = Film::all();
        $pages = Page::all();
        return view('main.index', compact('mainPage', 'bannersTop', 'bannersBottom', 'films', 'pages'));
    }
}
