<?php

namespace App\Http\Controllers\Admin\Cinema\Hall;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cinema\Hall\StoreRequest;
use App\Http\Requests\Admin\Cinema\Hall\UpdateRequest;
use App\Models\Cinema;
use App\Models\Hall;
use App\Models\HallImage;
use App\Models\SeoBlock;
use App\Service\SeoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HallController extends Controller
{
    public $service;

    public function __construct(SeoService $service)
    {
        $this->service = $service;
    }

    public function create(Cinema $cinema)
    {
        return view('admin.cinema.hall.create', compact('cinema'));
    }

    public function store(StoreRequest $request, Cinema $cinema)
    {
        $data = $request->validated();

        $data['cinema_id'] = $cinema->id;

        $data = $this->service->seoCreate($data);

        Hall::storeOrUpdate($data, null);

        return redirect()->route('admin.cinema.edit', $cinema->id);
    }

    public function edit(Hall $hall)
    {
        $hallImages = DB::table('hall_images')->where('hall_id', '=', $hall->id)->get()->toArray();

        $seoBlock = SeoBlock::find($hall->seo_block_id);

        return view('admin.cinema.hall.edit', compact('hall', 'hallImages', 'seoBlock'));
    }

    public function update(UpdateRequest $request, Hall $hall)
    {
        $data = $request->validated();

        $data = $this->service->seoUpdate($data, $hall);

        Hall::storeOrUpdate($data, $hall);

        return redirect()->route('admin.cinema.edit', $hall->cinema_id);
    }

    public function delete(Hall $hall)
    {
        $images = HallImage::where('hall_id', $hall->id)->get()->pluck('path');

        foreach ($images as $image) {
            Storage::disk('public')->delete($image);
        }

        SeoBlock::find($hall->seo_block_id)->delete();
        Hall::where('hall_id', $hall->id)->delete();

        Storage::disk('public')->delete($hall->hall_scheme);
        Storage::disk('public')->delete($hall->top_banner);

        $cinemaId = $hall->id;

        $hall->delete();

        return redirect()->route('admin.cinema.edit', $cinemaId);


    }
}
