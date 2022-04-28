<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stock\StoreRequest;
use App\Models\SeoBlock;
use App\Models\Stock;
use App\Models\StockImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if(isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);
        }

        $seoURL = $data['seo_url'];
        $seoTitle = $data['seo_title'];
        $seoKeywords = $data['seo_keywords'];
        $seoDescription = $data['seo_description'];

        unset($data['seo_url']);
        unset($data['seo_title']);
        unset($data['seo_keywords']);
        unset($data['seo_description']);

        $seoBlock = SeoBlock::create([
            'url' => $seoURL,
            'title' => $seoTitle,
            'keywords' => $seoKeywords,
            'description' => $seoDescription,
        ]);

        $data['seo_block_id'] = $seoBlock->id;

        $data['main_image'] = Storage::put('/public/images/stock', $data['main_image']);

        $stock = Stock::firstOrCreate($data);

        if(isset($images)) {
            foreach ($images as $image) {
                $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/stock', $image);
                Storage::put('/public/images/stock', $image);

                StockImage::create([
                    'path' => $imagePath,
                    'stock_id' => $stock->id
                ]);
                Storage::delete($imagePath);
            }
        }

        return redirect()->route('admin.stock.index');

    }
}
