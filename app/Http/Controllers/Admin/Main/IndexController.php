<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();

        $bookings = Booking::all();

        foreach($bookings as $booking) {

            if($booking->getUser->gender == 'man') {
                $allManUsers[] = $booking->getUser->id;
            } else {
                $allWomanUsers[] = $booking->getUser->id;
            }
        }

        $manUsers = count($allManUsers) / count($bookings) * 100;
        $womanUsers = count($allWomanUsers) / count($bookings) * 100;

        $sessions = Schedule::all()->groupBy('date')->toArray();
        foreach($sessions as $key => $session) {

            $dates[] = $key;
            $sessionCounts[] = count($session);
        }

        // dump($keys);
        // dump($sessionsCount);
        // dd($sessions);

        return view('admin.main.index', compact('users', 'manUsers', 'womanUsers', 'sessions'));
    }
}
