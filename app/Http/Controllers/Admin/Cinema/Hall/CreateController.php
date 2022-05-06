<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Cinema $cinema)
    {
        return view('admin.cinema.hall.create', compact('cinema'));
    }
}
