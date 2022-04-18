<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke(Page $page)
    {
        $pageImages = DB::table('page_images')->where('page_id', '=', $page->id)->get();

        if(isset($pageImages)) {
            foreach ($pageImages as $pageImage) {
                $pagePaths[] = $pageImage->path;
            }
        }

        $seoBlock = SeoBlock::find($page->seo_block_id);

        if(isset($pagePaths)) {
            return view('admin.page.edit', compact('page', 'pageImages', 'pagePaths', 'seoBlock'));
        } else {
            return view('admin.page.edit', compact('page', 'pageImages', 'seoBlock'));
        }


    }
}
