<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Film $film)
    {
        return view('admin.film.show', compact('film'));
    }
}
