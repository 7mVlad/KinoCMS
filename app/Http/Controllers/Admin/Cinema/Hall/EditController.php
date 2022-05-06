<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke(Hall $hall)
    {

        $hallImages = DB::table('hall_images')->where('hall_id', '=', $hall->id)->get();

        foreach ($hallImages as $hallImage) {
            $hallPaths[] = $hallImage->path;
        }

        $seoBlock = SeoBlock::find($hall->seo_block_id);

        if(isset($hallPaths)) {
            return view('admin.cinema.hall.edit', compact('hall', 'hallImages', 'hallPaths', 'seoBlock'));
        } else {
            return view('admin.cinema.hall.edit', compact('hall', 'hallImages', 'seoBlock'));
        }
    }
}
