<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\MainPage;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $mainPage = MainPage::find(1);
        $muchNews = News::all();
        return view('news.index', compact('mainPage', 'muchNews'));
    }
}
