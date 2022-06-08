<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Models\Hall;
use App\Models\SeoBlock;

class DeleteController extends BaseController
{
    public function __invoke(Hall $hall)
    {
        SeoBlock::find($hall->seo_block_id)->delete();

        $cinemaId = $hall->id;

        $hall->delete();
        return redirect()->route('admin.cinema.edit', $cinemaId);
    }
}
