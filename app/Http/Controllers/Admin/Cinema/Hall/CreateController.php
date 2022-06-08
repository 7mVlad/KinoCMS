<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Http\Controllers\Controller;
use App\Models\Cinema;

class CreateController extends BaseController
{
    public function __invoke(Cinema $cinema)
    {
        return view('admin.cinema.hall.create', compact('cinema'));
    }
}
