<?php

namespace App\Http\Controllers\Admin\Page\Main;

use App\Http\Controllers\Controller;
use App\Models\MainPage;
use App\Models\SeoBlock;
use App\Service\SeoService;
use App\Http\Requests\Admin\Page\Main\UpdateRequest;


class MainController extends Controller
{
    public function edit()
    {
        $mainPage = MainPage::first();
        $seoBlock = SeoBlock::find($mainPage->seo_block_id);

        return view('admin.page.main.edit', compact('mainPage', 'seoBlock'));
    }

    public function update(UpdateRequest $request)
    {
        $mainPage = MainPage::first();

        $data = $request->validated();

        $data = $this->service->seoUpdate($data, $mainPage);

        $mainPage->update($data);

        return redirect()->route('admin.page.index');
    }
}
