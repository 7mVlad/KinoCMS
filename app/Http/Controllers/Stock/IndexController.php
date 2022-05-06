<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Models\MainPage;
use App\Models\Stock;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $mainPage = MainPage::find(1);
        $stocks = Stock::all();
        return view('stock.index', compact('mainPage', 'stocks'));
    }
}
