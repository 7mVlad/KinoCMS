<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $stocks = Stock::all();
        return view('admin.stock.index', compact('stocks'));
    }
}
