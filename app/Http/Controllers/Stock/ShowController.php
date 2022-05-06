<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Models\MainPage;
use App\Models\Stock;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Stock $stock)
    {
        $mainPage = MainPage::find(1);
        return view('stock.show', compact('mainPage', 'stock'));
    }
}
