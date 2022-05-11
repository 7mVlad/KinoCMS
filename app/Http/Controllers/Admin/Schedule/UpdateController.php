<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Schedule\UpdateRequest;
use App\Models\Film;
use App\Models\Schedule;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Schedule $schedule)
    {
        $data = $request->validated();

        if(empty($data['film_title'])) {
            $film = Film::find($data['film_id']);
            $data['film_title'] = $film->title;
        }

        $schedule->update($data);

        return redirect()->route('admin.schedule.index');
    }
}
