<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $cinemas = Cinema::all();
        return view('admin.cinema.index', compact('cinemas'));
    }
}
