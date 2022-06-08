<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmImage extends Model
{
    use HasFactory;

    protected $table = 'film_images';
    protected $guarded = false;

    public static function store($film, $images)
    {
        $filmImages = DB::table('film_images')->where('film_id', '=', $film->id)->get()->pluck('id')->toArray();

        foreach ($images as $key => $image) {

            $id = $filmImages[$key] ?? 0;

            $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/films', $image);

            Storage::put('/public/images/films', $image);

            FilmImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'film_id' => $film->id
            ]);

            Storage::delete($imagePath);
        }
    }
}
