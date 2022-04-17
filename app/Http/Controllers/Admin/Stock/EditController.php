<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Controllers\Controller;
use App\Models\SeoBlock;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke(Stock $stock)
    {
        $stockImages = DB::table('stock_images')->where('stock_id', '=', $stock->id)->get();

        if(isset($stockImages)) {
            foreach ($stockImages as $stockImage) {
                $stockPaths[] = $stockImage->path;
            }
        }

        $seoBlock = SeoBlock::find($stock->seo_block_id);

        if(isset($stockPaths)) {
            return view('admin.stock.edit', compact('stock', 'stockImages', 'stockPaths', 'seoBlock'));
        } else {
            return view('admin.news.edit', compact('stock', 'stockImages', 'seoBlock'));
        }


    }
}
