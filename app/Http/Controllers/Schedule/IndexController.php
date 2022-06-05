<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\MainPage;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $mainPage = MainPage::find(1);
        $schedules = Schedule::all()->groupBy('date');
        $cinemas = Cinema::all();

        $films = DB::table('films')->where('release', '=', '1')->get();

        return view('schedule.index', compact('schedules', 'mainPage', 'cinemas', 'films'));
    }
}
