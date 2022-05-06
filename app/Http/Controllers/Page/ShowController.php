<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\MainPage;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        $page = Page::find($id);
        $pageImages = DB::table('page_images')->where('page_id', '=', $page->id)->get();
        $mainPage = MainPage::find(1);
        return view('page.show', compact('mainPage', 'page', 'pageImages'));
    }
}
