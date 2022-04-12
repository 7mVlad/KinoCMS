<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\StoreRequest;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['main_image'] = Storage::put('/', $data['main_image']);

        for($i = 1; $i < 6; $i++) {
            if(isset($data['image_'.$i])) {
                $data['image_'.$i] = Storage::put('/', $data['image_'.$i]);
            }
        }

        Film::firstOrCreate($data);
        return redirect()->route('admin.film.index');

    }
}
