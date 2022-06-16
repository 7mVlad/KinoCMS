<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Schedule\StoreRequest;
use App\Http\Requests\Admin\Schedule\UpdateRequest;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('admin.schedule.index', compact('schedules'));
    }

    public function create()
    {
        $cinemas = DB::table("cinemas")->get();
        $films = DB::table('films')->where('release', '=', '1')->get();

        return view('admin.schedule.create',compact('cinemas', 'films'));
    }

    public function ajax($id)
    {
        $halls = DB::table("halls")
                    ->where("cinema_id", $id)
                    ->get();
        return json_encode($halls);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Schedule::create($data);

        return redirect()->route('admin.schedule.index');
    }

    public function edit(Schedule $schedule)
    {
        $cinemas = DB::table("cinemas")->get();
        $films = DB::table('films')->where('release', '=', '1')->get();

        return view('admin.schedule.edit', compact('schedule', 'cinemas', 'films'));
    }

    public function update(UpdateRequest $request, Schedule $schedule)
    {
        $data = $request->validated();

        $schedule->update($data);

        return redirect()->route('admin.schedule.index');
    }

    public function delete(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedule.index');
    }
}
