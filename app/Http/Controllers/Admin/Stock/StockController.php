<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stock\StoreRequest;
use App\Http\Requests\Admin\Stock\UpdateRequest;
use App\Models\Cinema;
use App\Models\SeoBlock;
use App\Models\Stock;
use App\Models\StockImage;
use App\Service\SeoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    public $service;

    public function __construct(SeoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $stocks = Stock::all();
        return view('admin.stock.index', compact('stocks'));
    }

    public function create()
    {
        $cinemas = Cinema::all();
        return view('admin.stock.create', compact('cinemas'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['cinema_ids'])) {
            $cinemaIds = $data['cinema_ids'];
            unset($data['cinema_ids']);
        }

        $data = $this->service->seoCreate($data);

        $stock = Stock::storeOrUpdate($data, null);

        $stock->cinemas()->attach($cinemaIds);

        return redirect()->route('admin.stock.index');
    }

    public function edit($stock)
    {
        $stock = Stock::find($stock);

        $stockImages = DB::table('stock_images')->where('stock_id', '=', $stock->id)->get()->toArray();
        $cinemas = Cinema::all();

        $seoBlock = SeoBlock::find($stock->seo_block_id);

        return view('admin.stock.edit', compact('stock', 'stockImages', 'seoBlock', 'cinemas'));
    }

    public function update(UpdateRequest $request, $stock)
    {
        $stock = Stock::find($stock);

        $data = $request->validated();

        if (isset($data['cinema_ids'])) {
            $cinemaIds = $data['cinema_ids'];
            unset($data['cinema_ids']);

            $stock->cinemas()->sync($cinemaIds);
        }

        $data = $this->service->seoUpdate($data, $stock);

        Stock::storeOrUpdate($data, $stock);

        return redirect()->route('admin.stock.index');
    }

    public function delete($stock)
    {
        $stock = Stock::find($stock);

        $stockImages = StockImage::where('stock_id', $stock->id)->get()->pluck('path');

        foreach ($stockImages as $stockImage) {
            Storage::disk('public')->delete($stockImage);
        }

        SeoBlock::find($stock->seo_block_id)->delete();

        Storage::disk('public')->delete($stock->main_image);
        $stock->delete();

        return redirect()->route('admin.stock.index');
    }
}
