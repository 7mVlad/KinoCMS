<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\StoreRequest;
use App\Http\Requests\Admin\Page\UpdateRequest;
use App\Models\MainPage;
use App\Models\Page;
use App\Models\PageImage;
use App\Models\SeoBlock;
use App\Service\SeoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public $service;

    public function __construct(SeoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $mainPage = MainPage::first();
        $pages = Page::all();
        return view('admin.page.index', compact('pages', 'mainPage'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data = $this->service->seoCreate($data);

        Page::storeOrUpdate($data, null);

        return redirect()->route('admin.page.index');
    }

    public function edit($page)
    {
        $page = Page::find($page);

        $pageImages = DB::table('page_images')->where('page_id', '=', $page->id)->get()->toArray();

        $seoBlock = SeoBlock::find($page->seo_block_id);

        return view('admin.page.edit', compact('page', 'pageImages', 'seoBlock'));
    }

    public function update(UpdateRequest $request, $page)
    {
        $page = Page::find($page);

        $data = $request->validated();

        $data = $this->service->seoUpdate($data, $page);

        Page::storeOrUpdate($data, $page);

        return redirect()->route('admin.page.index');
    }

    public function delete($page)
    {
        $page = Page::find($page);

        $pageImages = PageImage::where('page_id', $page->id)->get()->pluck('path');

        foreach ($pageImages as $pageImage) {
            Storage::disk('public')->delete($pageImage);
        }

        SeoBlock::find($page->seo_block_id)->delete();

        Storage::disk('public')->delete($page->main_image);
        $page->delete();

        return redirect()->route('admin.page.index');
    }
}
