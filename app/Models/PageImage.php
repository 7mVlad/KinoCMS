<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PageImage extends Model
{
    use HasFactory;

    protected $table = 'page_images';
    protected $guarded = false;

    public static function store($page, $images)
    {
        $pageImages = DB::table('page_images')->where('page_id', '=', $page->id)->get()->pluck('id')->toArray();

        foreach ($images as $key => $image) {

            $id = $pageImages[$key] ?? 0;

            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/page', $image);

            Storage::put('/public/images/page', $image);

            PageImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'page_id' => $page->id
            ]);

            Storage::delete($imagePath);
        }
    }
}
