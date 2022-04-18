<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\UpdateRequest;
use App\Models\Film;
use App\Models\FilmImage;
use App\Models\SeoBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Film $film)
    {
        $data = $request->validated();

        if(isset($data['deleteImg'])) {
            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);
        }

        if(isset($deleteImgs)) {

            foreach($deleteImgs as $deleteImg) {

                $deleteImgPath = $deleteImg;
                $deleteTableImgs = DB::table('film_images')->where('url', '=', $deleteImgPath)->get();

                foreach($deleteTableImgs as $deleteTableImg) {
                    $deleteImgId = $deleteTableImg;

                    foreach($deleteImgId as $deleteIds) {

                        $deleteid = $deleteIds;
                        $deleteImage = FilmImage::find($deleteid);

                        if(isset($deleteImage)) {
                            $deleteImage->delete();
                        }

                    }
                }
            }
        }

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

        $seoBlock = SeoBlock::find($film->seo_block_id);
        $seoBlock->update([
            'url' => $seoURL,
            'title' => $seoTitle,
            'keywords' => $seoKeywords,
            'description' => $seoDescription,
        ]);

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::put('/public/images/films', $data['main_image']);
        }

        $filmImages = DB::table('film_images')->where('film_id', '=', $film->id)->get();

        foreach($filmImages as $key => $filmImage) {
            $filmArr[] = $filmImage;
        }

        if(isset($images)) {
            foreach($images as $key => $image) {

                if(isset($filmArr)) {
                    if(array_key_exists($key, $filmArr)) {
                        $id = $filmArr[$key]->id;
                        $filmImage = FilmImage::find($id);
                        $imageURL = Storage::put('/http://127.0.0.1:8000/storage/images/films', $image);
                        $imagePath = Storage::put('/public/images/films', $image);
                        $filmImage->update([
                            'path' => $imagePath,
                            'url' => $imageURL,
                        ]);
                        Storage::delete($imageURL);
                    }
                    else {
                        $imageURL = Storage::put('/http://127.0.0.1:8000/storage/images/films', $image);
                        $imagePath = Storage::put('/public/images/films', $image);

                        FilmImage::create([
                            'path' => $imagePath,
                            'url' =>  $imageURL,
                            'film_id' => $film->id
                        ]);
                        Storage::delete($imageURL);
                    }
                }
                else {
                    $imageURL = Storage::put('/http://127.0.0.1:8000/storage/images/films', $image);
                    $imagePath = Storage::put('/public/images/films', $image);

                    FilmImage::create([
                        'path' => $imagePath,
                        'url' =>  $imageURL,
                        'film_id' => $film->id
                    ]);
                    Storage::delete($imageURL);
                }
            }
        }

        $film->update($data);

        return redirect()->route('admin.film.index');
    }
}
