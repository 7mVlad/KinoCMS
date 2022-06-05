<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\MainPage;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index($schedule)
    {
        $mainPage = MainPage::find(1);
        $schedule = Schedule::find($schedule);

        $booking = DB::table('bookings')->where('schedule_id', '=', $schedule->id)->get();

        $rowCols = $booking->pluck('row_col');

        return view('schedule.booking', compact('schedule', 'mainPage', 'rowCols'));
    }

    public function bookingStore(Request $request)
    {
        $rowCols = $request->input('row_col');
        $schedule = Schedule::find($request->input('schedule'));
        $user = $request->input('user');

        foreach ($rowCols as $rowCol) {
            Booking::firstOrCreate([
                'user_id' => $user,
                'schedule_id' => $schedule->id,
                'row_col' => $rowCol,
            ]);
        }

        return redirect()->route('booking.index', $schedule->id);
    }
}
