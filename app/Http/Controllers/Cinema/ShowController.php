<?php

namespace App\Http\Controllers\Cinema;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\MainPage;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Cinema $cinema)
    {
        $mainPage = MainPage::find(1);
        return view('cinema.show', compact('mainPage', 'cinema'));
    }
}
