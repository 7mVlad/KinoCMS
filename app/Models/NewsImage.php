<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsImage extends Model
{
    use HasFactory;

    protected $table = 'news_images';
    protected $guarded = false;

    public static function store($news, $images)
    {
        $newsImages = DB::table('news_images')->where('news_id', '=', $news->id)->get()->pluck('id')->toArray();

        foreach ($images as $key => $image) {

            $id = $newsImages[$key] ?? 0;

            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/news', $image);

            Storage::put('/public/images/news', $image);

            NewsImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'news_id' => $news->id
            ]);

            Storage::delete($imagePath);
        }
    }
}
