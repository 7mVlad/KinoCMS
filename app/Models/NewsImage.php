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

    public static function storeImages($news, $images)
    {
        $newsImages = DB::table('news_images')->where('news_id', $news->id)->get()->toArray();

        foreach ($images as $key => $image) {

            $id = $newsImages[$key]->id ?? 0;

            $imagePath = Storage::disk('public')->put('images/news', $image);

            NewsImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'news_id' => $news->id
            ]);

            if(isset($newsImages[$key]->path)) {
                Storage::disk('public')->delete($newsImages[$key]->path);
            }
        }
    }
}
