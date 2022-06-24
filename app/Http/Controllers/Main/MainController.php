<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\DeviceType;
use App\Models\Film;
use App\Models\MainPage;
use App\Models\Page;
use Illuminate\Http\Request;
use Detection\MobileDetect;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $mainPage = MainPage::first();
        $bannersTop = Banner::where('position', 'top')->get();
        $bannersBottom = Banner::where('position', 'bottom')->get();
        $films = Film::all();
        $pages = Page::all();

        $detect = new MobileDetect;
        $ip = $request->ip();
        $mainController = new MainController;

        return view('main.index',
            compact('mainPage', 'bannersTop', 'bannersBottom',
                'films', 'pages', 'detect', 'ip', 'mainController'));
    }

    public function store($ip, $type)
    {
        DeviceType::updateOrCreate(['ip' => $ip, 'type' => $type], [
            'ip' => $ip,
            'type' => $type,
            'date' => now()
        ]);
    }
}
