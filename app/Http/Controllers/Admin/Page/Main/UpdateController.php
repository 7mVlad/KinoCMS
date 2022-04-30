<?php

namespace App\Http\Controllers\Admin\Page\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\Main\UpdateRequest;
use App\Models\MainPage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $mainPage = MainPage::find(1);
        $data = $request->validated();

        $seoURL = $data['seo_url'];
        $seoTitle = $data['seo_title'];
        $seoKeywords = $data['seo_keywords'];
        $seoDescription = $data['seo_description'];

        unset($data['seo_url']);
        unset($data['seo_title']);
        unset($data['seo_keywords']);
        unset($data['seo_description']);

        $seoBlock = SeoBlock::find($mainPage->seo_block_id);
        $seoBlock->update([
            'url' => $seoURL,
            'title' => $seoTitle,
            'keywords' => $seoKeywords,
            'description' => $seoDescription,
        ]);

        $mainPage->update($data);

        return redirect()->route('admin.page.index');
    }
}
