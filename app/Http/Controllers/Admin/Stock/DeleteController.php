<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Controllers\Controller;
use App\Models\SeoBlock;
use App\Models\Stock;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Stock $stock)
    {
        SeoBlock::find($stock->seo_block_id)->delete();

        $stock->delete();

        return redirect()->route('admin.stock.index');
    }
}
