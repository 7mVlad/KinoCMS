<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();

        $sessions = Booking::all();

        foreach($sessions as $session) {

            if($session->getUser->gender == 'man') {
                $allManUsers[] = $session->getUser->id;
            } else {
                $allWomanUsers[] = $session->getUser->id;
            }
        }

        $manUsers = count($allManUsers) / count($sessions) * 100;
        $womanUsers = count($allWomanUsers) / count($sessions) * 100;

        return view('admin.main.index', compact('users', 'manUsers', 'womanUsers'));
    }
}
