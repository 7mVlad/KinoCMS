<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\SeoBlock;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Stock $stock)
    {
        $seoBlock = SeoBlock::find($stock->seo_block_id);
        $seoBlock->delete();
        $stock->delete();
        return redirect()->route('admin.stock.index');
    }
}
