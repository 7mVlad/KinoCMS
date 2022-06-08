<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $newsMuch = News::all();
        return view('admin.news.index', compact('newsMuch'));
    }
}
