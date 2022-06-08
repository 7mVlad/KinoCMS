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

    public static function store($hall, $images)
    {
        $hallImages = DB::table('hall_images')->where('hall_id', '=', $hall->id)->get()->pluck('id')->toArray();

        foreach ($images as $key => $image) {

            $id = $hallImages[$key] ?? 0;

            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/hall', $image);
            Storage::put('/public/images/hall', $image);

            HallImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'hall_id' => $hall->id
            ]);

            Storage::delete($imagePath);
        }
    }
}
