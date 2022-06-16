<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\StoreRequest;
use App\Http\Requests\Admin\Film\UpdateRequest;
use App\Models\Film;
use App\Models\FilmImage;
use App\Models\SeoBlock;
use App\Service\SeoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public $service;

    public function __construct(SeoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $films = Film::all();
        return view('admin.film.index', compact('films'));
    }

    public function create()
    {
        return view('admin.film.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data = $this->service->seoCreate($data);

        Film::storeOrUpdate($data, null);

        return redirect()->route('admin.film.index');
    }

    public function edit($film)
    {
        $film = Film::find($film);

        $filmImages = DB::table('film_images')->where('film_id', $film->id)->get()->toArray();

        $seoBlock = SeoBlock::find($film->seo_block_id);

        return view('admin.film.edit', compact('film', 'filmImages', 'seoBlock'));
    }

    public function update(UpdateRequest $request, $film)
    {
        $film = Film::find($film);

        $data = $request->validated();

        $data = $this->service->seoUpdate($data, $film);

        Film::storeOrUpdate($data, $film);

        return redirect()->route('admin.film.index');
    }

    public function delete($film)
    {
        $film = Film::find($film);

        $images = FilmImage::where('film_id', $film->id)->get()->pluck('path');

        foreach ($images as $image) {
            Storage::disk('public')->delete($image);
        }

        SeoBlock::find($film->seo_block_id)->delete();

        Storage::disk('public')->delete($film->main_image);

        $film->delete();

        return redirect()->route('admin.film.index');
    }
}
