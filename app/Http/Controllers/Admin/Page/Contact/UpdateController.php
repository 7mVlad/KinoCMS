<?php

namespace App\Http\Controllers\Admin\Page\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\Contact\UpdateRequest;
use App\Models\Contact;
use App\Models\SeoContact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();

        if (isset($data['deleteImg'])) {

            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);

            foreach ($deleteImgs as $deleteImg) {
                DB::table('contacts')->where('logo_image', '=', $deleteImg)->delete();
            }
        }

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

        if (isset($data['logo_image'])) {
            $logo_image = $data['logo_image'];
        }

        if (isset($data['cinema_id'])) {

            $cinemaIds = $data['cinema_id'];
            $address = $data['address'];
            $coordinates = $data['coordinates'];

            foreach ($cinemaIds as $key => $cinemaId) {

                if (isset($logo_image[$key])) {

                    $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/contact', $logo_image[$key]);
                    Storage::put('/public/images/contact', $logo_image[$key]);


                    Contact::updateOrCreate(['cinema_id' => $cinemaId ], [
                        'cinema_id' => $cinemaId,
                        'address' => $address[$key],
                        'coordinates' => $coordinates[$key],
                        'logo_image' => $imagePath
                    ]);

                    Storage::delete($imagePath);
                } else {
                    Contact::updateOrCreate(['cinema_id' => $cinemaId ], [
                        'cinema_id' => $cinemaId,
                        'address' => $address[$key],
                        'coordinates' => $coordinates[$key],
                    ]);
                }
            }
        }
        return redirect()->route('admin.contact.edit');
    }
}
