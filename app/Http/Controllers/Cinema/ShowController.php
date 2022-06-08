<?php

namespace App\Http\Controllers\Cinema;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\CinemaImage;
use App\Models\MainPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke(Cinema $cinema)
    {
        $mainPage = MainPage::find(1);

        $cinemaImages = DB::table('cinema_images')->where('cinema_id', '=', $cinema->id )->get();
        $halls = DB::table('halls')->where('cinema_id', '=', $cinema->id )->get();

        return view('cinema.show', compact('mainPage', 'cinema', 'cinemaImages', 'halls'));
    }
}
