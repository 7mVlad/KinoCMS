<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\BannerBottom;
use App\Models\BannerTop;
use App\Models\Film;
use App\Models\MainPage;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $mainPage = MainPage::find(1);
        $bannersTop = BannerTop::all();
        $bannersBottom = BannerBottom::all();
        $films = Film::all();
        $pages = Page::all();
        return view('main.index', compact('mainPage', 'bannersTop', 'bannersBottom', 'films', 'pages'));
    }
}
