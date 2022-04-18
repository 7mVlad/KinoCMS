<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SeoBlock;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Page $page)
    {
        $seoBlock = SeoBlock::find($page->seo_block_id);
        $seoBlock->delete();
        $page->delete();
        return redirect()->route('admin.page.index');
    }
}
