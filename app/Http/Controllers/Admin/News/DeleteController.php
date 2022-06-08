<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\SeoBlock;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(News $news)
    {
        SeoBlock::find($news->seo_block_id)->delete();

        $news->delete();

        return redirect()->route('admin.news.index');
    }
}
