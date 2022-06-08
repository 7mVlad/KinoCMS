<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Models\Cinema;
use App\Models\SeoBlock;
use Illuminate\Support\Facades\DB;

class EditController extends BaseController
{
    public function __invoke(Cinema $cinema)
    {
        $cinemaImages = DB::table('cinema_images')->where('cinema_id', '=', $cinema->id)->get()->pluck('path')->toArray();
        $halls = DB::table('halls')->where('cinema_id', '=', $cinema->id)->get();

        $seoBlock = SeoBlock::find($cinema->seo_block_id);

        return view('admin.cinema.edit', compact('cinema', 'cinemaImages', 'seoBlock', 'halls'));
    }
}
