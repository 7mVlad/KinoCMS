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

    public static function storeImages($film, $images)
    {
        $filmImages = DB::table('film_images')->where('film_id', $film->id)->get()->toArray();

        foreach ($images as $key => $image) {

            $id = $filmImages[$key]->id ?? 0;

            $imagePath = Storage::disk('public')->put('images/film', $image);

            FilmImage::updateOrCreate(['id' => $id], [
                'path' => $imagePath,
                'film_id' => $film->id
            ]);

            if(isset($filmImages[$key]->path)) {
                Storage::disk('public')->delete($filmImages[$key]->path);
            }
        }
    }
}
