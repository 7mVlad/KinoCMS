<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function index()
    {
        $cinemas = DB::table("cinemas")->get();
        $films = DB::table('films')->where('release', '=', '1')->get();

        return view('admin.schedule.create',compact('cinemas', 'films'));
    }
    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax($id)
    {
        $halls = DB::table("halls")
                    ->where("cinema_id", $id)
                    ->get();
        return json_encode($halls);
    }
}
