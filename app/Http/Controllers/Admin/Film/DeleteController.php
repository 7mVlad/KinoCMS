<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Film $film)
    {
        $film->delete();
        return redirect()->route('admin.film.index');
    }
}
