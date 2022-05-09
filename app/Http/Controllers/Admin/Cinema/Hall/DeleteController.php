<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\SeoBlock;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Hall $hall)
    {
        $seoBlock = SeoBlock::find($hall->seo_block_id);
        $seoBlock->delete();
        $cinemaId = $hall->id;
        $hall->delete();
        return redirect()->route('admin.cinema.edit', $cinemaId);
    }
}
