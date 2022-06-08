<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Requests\Admin\Stock\StoreRequest;
use App\Models\Stock;
use App\Models\StockImage;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $cinemaIds = $data['cinema_ids'];
        unset($data['cinema_ids']);

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        $data = $this->service->seoCreate($data);

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/stock', $data['main_image']);
        }

        $stock = Stock::firstOrCreate($data);

        $stock->cinemas()->attach($cinemaIds);

        if(isset($images)) {
            StockImage::store($stock, $images);
        }

        return redirect()->route('admin.stock.index');

    }
}
