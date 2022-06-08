<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends BaseController
{
    public function __invoke(News $news)
    {
        $newsImages = DB::table('news_images')->where('news_id', '=', $news->id)->get()->pluck('path')->toArray();

        $seoBlock = SeoBlock::find($news->seo_block_id);

        return view('admin.news.edit', compact('news', 'newsImages', 'seoBlock'));
    }
}
