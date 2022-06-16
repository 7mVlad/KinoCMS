<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HallImage extends Model
{
    use HasFactory;

    protected $table = 'hall_images';
    protected $guarded = false;

    public static function storeImages($hall, $images)
    {
        $hallImages = DB::table('hall_images')->where('hall_id', $hall->id)->get()->toArray();

        foreach ($images as $key => $image) {

            $id = $hallImages[$key]->id ?? 0;

            $imagePath = Storage::disk('public')->put('images/hall', $image);

            HallImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'hall_id' => $hall->id
            ]);

            if(isset($hallImages[$key]->path)) {
                Storage::disk('public')->delete($hallImages[$key]->path);
            }
        }
    }
}
