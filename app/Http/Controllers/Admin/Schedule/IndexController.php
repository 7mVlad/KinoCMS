<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\News;
use App\Models\Schedule;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $schedules = Schedule::all();
        return view('admin.schedule.index', compact('schedules'));
    }
}
