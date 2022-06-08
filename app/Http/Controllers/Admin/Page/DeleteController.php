<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SeoBlock;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Page $page)
    {
        SeoBlock::find($page->seo_block_id)->delete();

        $page->delete();

        return redirect()->route('admin.page.index');
    }
}
