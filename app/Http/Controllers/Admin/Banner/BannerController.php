<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\UpdateRequest;
use App\Models\Banner;
use App\Models\MainPage;

class BannerController extends Controller
{
    public function edit()
    {
        $bannersTop = Banner::where('position', 'top')->get();
        $bannersBottom = Banner::where('position', 'bottom')->get();
        $mainPage = MainPage::first();

        return view('admin.banner.index', compact('bannersTop', 'bannersBottom', 'mainPage'));
    }

    public function update(UpdateRequest $request)
    {
        $data = $request->validated();

        $data = MainPage::storeBanner($data);

        Banner::storeOrUpdate($data);

        return redirect()->route('admin.banner.index');
    }
}
