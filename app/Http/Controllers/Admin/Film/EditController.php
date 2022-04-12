<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Film $film)
    {
        return view('admin.film.edit', compact('film'));
    }
}
