<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\SeoBlock;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Film $film)
    {
        SeoBlock::find($film->seo_block_id)->delete();

        $film->delete();

        return redirect()->route('admin.film.index');
    }
}
