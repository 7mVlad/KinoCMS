<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $stocks = Stock::all();
        return view('admin.user.index', compact('stocks'));
    }
}
