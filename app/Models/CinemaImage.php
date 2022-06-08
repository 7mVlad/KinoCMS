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

    public static function store($cinema, $images)
    {
        $cinemaImages = DB::table('cinema_images')->where('cinema_id', '=', $cinema->id)->get()->pluck('id')->toArray();

        foreach ($images as $key => $image) {

            $id = $cinemaImages[$key] ?? 0;

            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/cinema', $image);

            Storage::put('/public/images/cinema', $image);

            CinemaImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'cinema_id' => $cinema->id
            ]);

            Storage::delete($imagePath);
        }
    }
}
