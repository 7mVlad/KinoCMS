<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke(Cinema $cinema)
    {

        $cinemaImages = DB::table('cinema_images')->where('cinema_id', '=', $cinema->id)->get();
        $halls = DB::table('halls')->where('cinema_id', '=', $cinema->id)->get();

        foreach ($cinemaImages as $cinemaImage) {
            $cinemaPaths[] = $cinemaImage->path;
        }

        $seoBlock = SeoBlock::find($cinema->seo_block_id);

        if(isset($cinemaPaths)) {
            return view('admin.cinema.edit', compact('cinema', 'cinemaImages', 'cinemaPaths', 'seoBlock', 'halls'));
        } else {
            return view('admin.cinema.edit', compact('cinema', 'cinemaImages', 'seoBlock', 'halls'));
        }
    }
}
