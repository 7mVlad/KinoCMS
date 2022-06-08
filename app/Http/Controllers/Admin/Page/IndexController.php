<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\MainPage;
use App\Models\Page;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $mainPage = MainPage::find(1);
        $pages = Page::all();
        return view('admin.page.index', compact('pages', 'mainPage'));
    }
}
