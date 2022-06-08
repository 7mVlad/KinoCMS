<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Requests\Admin\Stock\UpdateRequest;
use App\Models\Stock;
use App\Models\StockImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Stock $stock)
    {
        $data = $request->validated();

        $cinemaIds = $data['cinema_ids'];
        unset($data['cinema_ids']);

        $stock->cinemas()->sync($cinemaIds);

        if(isset($data['deleteImg'])) {

            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);

            foreach($deleteImgs as $deleteImg) {
                DB::table('stock_images')->where('path', '=', $deleteImg)->delete();
            }
        }

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        $data = $this->service->seoUpdate($data, $stock);

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/stock', $data['main_image']);
        }

        if(isset($images)) {
            StockImage::store($stock, $images);
        }

        $stock->update($data);

        return redirect()->route('admin.stock.index');
    }
}
