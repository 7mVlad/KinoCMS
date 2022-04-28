<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Models\BannerBottom;
use App\Models\BannerTop;
use App\Models\MainPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke()
    {

        $bannersTop = BannerTop::all();
        $bannersBottom = BannerBottom::all();
        $mainPage = MainPage::find(1);

        return view('admin.banner.index', compact('bannersTop', 'bannersBottom', 'mainPage'));

    }
}
