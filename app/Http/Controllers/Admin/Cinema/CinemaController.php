<?php

namespace App\Http\Controllers\Admin\Cinema;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cinema\StoreRequest;
use App\Http\Requests\Admin\Cinema\UpdateRequest;
use App\Models\Cinema;
use App\Models\CinemaImage;
use App\Models\Hall;
use App\Models\HallImage;
use App\Models\SeoBlock;
use App\Service\SeoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CinemaController extends Controller
{
    public $service;

    public function __construct(SeoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $cinemas = Cinema::all();
        return view('admin.cinema.index', compact('cinemas'));
    }

    public function create()
    {
        $halls = Hall::all();
        return view('admin.cinema.create', compact('halls'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data = $this->service->seoCreate($data);

        Cinema::storeOrUpdate($data, null);

        return redirect()->route('admin.cinema.index');
    }

    public function edit($cinema)
    {
        $cinema = Cinema::find($cinema);

        $cinemaImages = DB::table('cinema_images')->where('cinema_id', $cinema->id)->get()->toArray();
        $halls = DB::table('halls')->where('cinema_id', $cinema->id)->get();

        $seoBlock = SeoBlock::find($cinema->seo_block_id);

        return view('admin.cinema.edit', compact('cinema', 'cinemaImages', 'seoBlock', 'halls'));
    }

    public function update(UpdateRequest $request, $cinema)
    {
        $cinema = Cinema::find($cinema);

        $data = $request->validated();

        $data = $this->service->seoUpdate($data, $cinema);

        Cinema::storeOrUpdate($data, $cinema);

        return redirect()->route('admin.cinema.index');
    }

    public function delete($cinema)
    {
        $cinema = Cinema::find($cinema);

        $images = CinemaImage::where('cinema_id', $cinema->id)->get()->pluck('path');

        foreach ($images as $image) {
            Storage::disk('public')->delete($image);
        }

        SeoBlock::find($cinema->seo_block_id)->delete();

        $hall = Hall::where('cinema_id', $cinema->id)->delete();

        $images = HallImage::where('hall_id', $hall->id)->get()->pluck('path');

        foreach ($images as $image) {
            Storage::disk('public')->delete($image);
        }

        Storage::disk('public')->delete($cinema->logo_image);
        Storage::disk('public')->delete($cinema->top_banner);

        $cinema->delete();

        return redirect()->route('admin.cinema.index');
    }
}
