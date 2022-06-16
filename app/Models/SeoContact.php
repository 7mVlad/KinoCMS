<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoContact extends Model
{
    use HasFactory;

    protected $table = 'seo_contacts';
    protected $guarded = false;

    public static function store($data)
    {
        SeoContact::updateOrCreate(['id' => 1], [
            'url' => $data['seo_url'],
            'title' => $data['seo_title'],
            'keywords' => $data['seo_keywords'],
            'description' => $data['seo_description'],
        ]);

        unset($data['seo_url']);
        unset($data['seo_title']);
        unset($data['seo_keywords']);
        unset($data['seo_description']);

        return $data;
    }
}
