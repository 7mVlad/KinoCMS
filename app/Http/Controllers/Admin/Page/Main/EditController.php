<?php

namespace App\Http\Controllers\Admin\Page\Main;

use App\Http\Controllers\Controller;
use App\Models\MainPage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends BaseController
{
    public function __invoke()
    {
        $mainPage = MainPage::find(1);
        $seoBlock = SeoBlock::find($mainPage->seo_block_id);

        return view('admin.page.main.edit', compact('mainPage', 'seoBlock'));

    }
}
