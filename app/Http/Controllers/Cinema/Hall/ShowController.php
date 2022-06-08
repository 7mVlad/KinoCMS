<?php

namespace App\Http\Controllers\Cinema\Hall;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\MainPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke(Hall $hall)
    {
        $mainPage = MainPage::find(1);

        $hallImages = DB::table('hall_images')->where('hall_id', '=', $hall->id )->get();

        return view('cinema.hall.show', compact('mainPage', 'hall', 'hallImages'));
    }
}
