<?php

namespace App\Http\Controllers\Cinema;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\MainPage;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $mainPage = MainPage::find(1);
        $cinemas = Cinema::all();
        return view('cinema.index', compact('mainPage', 'cinemas'));
    }
}
