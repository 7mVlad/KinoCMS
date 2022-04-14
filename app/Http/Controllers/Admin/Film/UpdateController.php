<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\UpdateRequest;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Film $film)
    {
        $data = $request->validated();
        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/film', $data['main_image']);
        }


        for($i = 1; $i < 6; $i++) {
            if(isset($data['image_'.$i])) {
                $data['image_'.$i] = Storage::put('/public/images/film', $data['image_'.$i]);
            }
        }

        $film->update($data);
        return redirect()->route('admin.film.index');
    }
}
