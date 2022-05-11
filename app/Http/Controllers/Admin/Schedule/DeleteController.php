<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedule.index');
    }
}
