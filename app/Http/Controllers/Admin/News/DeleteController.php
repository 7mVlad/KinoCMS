<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\SeoBlock;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(News $news)
    {
        $seoBlock = SeoBlock::find($news->seo_block_id);
        $seoBlock->delete();
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
