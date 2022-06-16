<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CinemaImage extends Model
{
    use HasFactory;

    protected $table = 'cinema_images';
    protected $guarded = false;

    public static function storeImages($cinema, $images)
    {
        $cinemaImages = DB::table('cinema_images')->where('cinema_id', $cinema->id)->get()->toArray();

        foreach ($images as $key => $image) {

            $id = $cinemaImages[$key]->id ?? 0;

            $imagePath = Storage::disk('public')->put('images/cinema', $image);

            CinemaImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'cinema_id' => $cinema->id
            ]);

            if(isset($cinemaImages[$key]->path)) {
                Storage::disk('public')->delete($cinemaImages[$key]->path);
            }
        }
    }
}
