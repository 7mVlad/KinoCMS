<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\Hall;
use App\Models\News;
use App\Models\Schedule;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke(Schedule $schedule)
    {
        $cinemas = DB::table("cinemas")->get();
        $films = Film::all();
        $cinema = Cinema::find($schedule->cinema_id);
        $hall = Hall::find($schedule->hall_id);

        return view('admin.schedule.edit', compact('schedule', 'cinema', 'cinemas', 'films', 'hall'));
    }
}
