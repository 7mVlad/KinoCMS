<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MainPage extends Model
{
    use HasFactory;

    protected $table = 'main_page';
    protected $guarded = false;

    public static function storeBanner($data)
    {
        // Сквозной баннер
        if (isset($data['bg_image'])) {

            $mainPage = MainPage::first();

            isset($mainPage->bg_banner) ? Storage::disk('public')->delete($mainPage->bg_banner) : '';
            $imagePath = Storage::disk('public')->put('images/banner', $data['bg_image']);

            $mainPage->update([
                'bg_banner' => $imagePath
            ]);

            unset($data['bg_image']);
        }
        return $data;
    }
}

