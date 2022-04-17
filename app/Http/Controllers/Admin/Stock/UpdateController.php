<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stock\UpdateRequest;
use App\Models\SeoBlock;
use App\Models\Stock;
use App\Models\StockImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Stock $stock)
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

        $seoBlock = SeoBlock::find($stock->seo_block_id);
        $seoBlock->update([
            'url' => $seoURL,
            'title' => $seoTitle,
            'keywords' => $seoKeywords,
            'description' => $seoDescription,
        ]);

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/stock', $data['main_image']);
        }

        $stockImages = DB::table('stock_images')->where('stock_id', '=', $stock->id)->get();

        foreach($stockImages as $key => $stockImage) {
            $stockArr[] = $stockImage;
        }

        if(isset($images)) {
            foreach($images as $key => $image) {
                if(array_key_exists($key, $stockArr)) {
                    $id = $stockArr[$key]->id;
                    $stockImage = StockImage::find($id);
                    $imagePath = Storage::put('/public/images/stock', $image);
                    $stockImage->update([
                        'path' => $imagePath,
                    ]);
                } else {
                    $imagePath = Storage::put('/public/images/stock', $image);

                    StockImage::create([
                        'path' => $imagePath,
                        'news_id' => $stock->id
                    ]);
                }
            }
        }

        $stock->update($data);

        return redirect()->route('admin.stock.index');
    }
}
