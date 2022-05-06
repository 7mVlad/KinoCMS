<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\MainPage;
use App\Models\News;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(News $news)
    {
        $mainPage = MainPage::find(1);
        return view('news.show', compact('mainPage', 'news'));
    }
}
