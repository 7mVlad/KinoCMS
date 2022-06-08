<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $cinemas = Cinema::all();
        return view('admin.stock.create', compact('cinemas'));
    }
}
