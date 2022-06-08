<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\MainPage;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function __invoke(Request $request)
    {
        $cinemaId = $request->cinema_id;
        $hallId = $request->hall_id;
        $filmId = $request->film_id;
        $date = $request->date;

        if(isset($cinemaId) && isset($hallId) && isset($filmId) && isset($date)) {
            $schedules = Schedule::where("cinema_id", '=',  $cinemaId)
            ->where("hall_id", '=',  $hallId)
            ->where("film_id", '=',  $filmId)
            ->where("date", '=',  $date)
            ->get()
            ->groupBy('date');
        } elseif(isset($cinemaId) && isset($hallId) && isset($filmId)) {
            $schedules = Schedule::where("cinema_id", '=',  $cinemaId)
            ->where("hall_id", '=',  $hallId)
            ->where("film_id", '=',  $filmId)
            ->get()
            ->groupBy('date');
        } elseif(isset($cinemaId) && isset($hallId)) {
            $schedules = Schedule::where("cinema_id", '=',  $cinemaId)
            ->where("hall_id", '=',  $hallId)
            ->get()
            ->groupBy('date');
        } elseif(isset($cinemaId)) {
            $schedules = Schedule::where("cinema_id", '=',  $cinemaId)
            ->get()
            ->groupBy('date');
        } else {
            $schedules = Schedule::all()->groupBy('date');
        }

        $mainPage = MainPage::find(1);
        $cinemas = Cinema::all();

        $films = DB::table('films')->where('release', '=', '1')->get();

        return view('schedule.index', compact('schedules', 'mainPage', 'cinemas', 'films'));
    }
}
