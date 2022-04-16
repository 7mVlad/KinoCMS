<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke(News $news)
    {
        $newsImages = DB::table('news_images')->where('news_id', '=', $news->id)->get();

        if(isset($newsImages)) {
            foreach ($newsImages as $newsImage) {
                $newsPaths[] = $newsImage->path;
            }
        }

        $seoBlock = SeoBlock::find($news->seo_block_id);

        if(isset($newsPaths)) {
            return view('admin.news.edit', compact('news', 'newsImages', 'newsPaths', 'seoBlock'));
        } else {
            return view('admin.news.edit', compact('news', 'newsImages', 'seoBlock'));
        }


    }
}
