<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Models\Cinema;
use App\Models\SeoBlock;
use Illuminate\Support\Facades\DB;

class DeleteController extends BaseController
{
    public function __invoke(Cinema $cinema)
    {
        SeoBlock::find($cinema->seo_block_id)->delete();

        DB::table('halls')->where('cinema_id', '=', $cinema->id)->delete();

        $cinema->delete();

        return redirect()->route('admin.cinema.index');
    }
}
