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

    public static function storeImages($page, $images)
    {
        $pageImages = DB::table('page_images')->where('page_id', $page->id)->get()->toArray();

        foreach ($images as $key => $image) {

            $id = $pageImages[$key]->id ?? 0;

            $imagePath = Storage::disk('public')->put('images/page', $image);

            PageImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'page_id' => $page->id
            ]);

            if(isset($pageImages[$key]->path)) {
                Storage::disk('public')->delete($pageImages[$key]->path);
            }
        }
    }
}
