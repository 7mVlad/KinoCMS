<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke(Cinema $cinema)
    {
        $seoBlock = SeoBlock::find($cinema->seo_block_id);
        $seoBlock->delete();
        DB::table('halls')->where('cinema_id', '=', $cinema->id)->delete();
        $cinema->delete();
        return redirect()->route('admin.cinema.index');
    }
}
