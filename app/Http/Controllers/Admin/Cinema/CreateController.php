<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $halls = Hall::all();
        return view('admin.cinema.create', compact('halls'));
    }
}
