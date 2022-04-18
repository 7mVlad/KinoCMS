<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }
}
