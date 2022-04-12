<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\UpdateRequest;
use App\Models\Film;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Film $film)
    {
        $data = $request->validated();
        $film->update($data);
        return view('admin.film.show', compact('film'));
    }
}
