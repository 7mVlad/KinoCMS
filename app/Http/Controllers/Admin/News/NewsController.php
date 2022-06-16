<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreRequest;
use App\Http\Requests\Admin\News\UpdateRequest;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\SeoBlock;
use App\Service\SeoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public $service;

    public function __construct(SeoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $newsMuch = News::all();
        return view('admin.news.index', compact('newsMuch'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data = $this->service->seoCreate($data);

        News::storeOrUpdate($data, null);

        return redirect()->route('admin.news.index');
    }

    public function edit($news)
    {
        $news = News::find($news);

        $newsImages = DB::table('news_images')->where('news_id', $news->id)->get()->toArray();

        $seoBlock = SeoBlock::find($news->seo_block_id);

        return view('admin.news.edit', compact('news', 'newsImages', 'seoBlock'));
    }

    public function update(UpdateRequest $request, $news)
    {
        $news = News::find($news);

        $data = $request->validated();

        $data = $this->service->seoUpdate($data, $news);

        News::storeOrUpdate($data, $news);

        return redirect()->route('admin.news.index');
    }

    public function delete($news)
    {
        $news = News::find($news);

        $newsImages = NewsImage::where('news_id', $news->id)->get()->pluck('path');

        foreach ($newsImages as $newsImage) {
            Storage::disk('public')->delete($newsImage);
        }

        SeoBlock::find($news->seo_block_id)->delete();

        Storage::disk('public')->delete($news->main_image);
        $news->delete();

        return redirect()->route('admin.news.index');
    }
}
