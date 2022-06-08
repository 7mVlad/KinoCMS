<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\SeoBlock;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends BaseController
{
    public function __invoke(Stock $stock)
    {
        $stockImages = DB::table('stock_images')->where('stock_id', '=', $stock->id)->get()->pluck('path')->toArray();
        $cinemas = Cinema::all();

        $seoBlock = SeoBlock::find($stock->seo_block_id);

        return view('admin.stock.edit', compact('stock', 'stockImages', 'seoBlock', 'cinemas'));

    }
}
