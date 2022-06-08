<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\SeoBlock;
use Illuminate\Support\Facades\DB;

class EditController extends BaseController
{
    public function __invoke(Hall $hall)
    {
        $hallImages = DB::table('hall_images')->where('hall_id', '=', $hall->id)->get()->pluck('path')->toArray();

        $seoBlock = SeoBlock::find($hall->seo_block_id);

        return view('admin.cinema.hall.edit', compact('hall', 'hallImages', 'seoBlock'));

    }
}
