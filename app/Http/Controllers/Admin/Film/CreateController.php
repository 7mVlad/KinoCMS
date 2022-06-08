<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.film.create');
    }
}
