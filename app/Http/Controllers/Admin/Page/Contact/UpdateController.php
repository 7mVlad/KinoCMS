<?php

namespace App\Http\Controllers\Admin\Page\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\Contact\UpdateRequest;
use App\Models\Contact;
use App\Models\SeoBlock;
use App\Models\SeoContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();

        $seoURL = $data['seo_url'];
        $seoTitle = $data['seo_title'];
        $seoKeywords = $data['seo_keywords'];
        $seoDescription = $data['seo_description'];

        unset($data['seo_url']);
        unset($data['seo_title']);
        unset($data['seo_keywords']);
        unset($data['seo_description']);

        $seoBlock = SeoContact::find(1);
        $seoBlock->update([
            'url' => $seoURL,
            'title' => $seoTitle,
            'keywords' => $seoKeywords,
            'description' => $seoDescription,
        ]);


        $titles = $data['title'];
        $address = $data['address'];
        $coordinates = $data['coordinates'];
        if(isset($data['logo_image'])) {
            $logo_image = $data['logo_image'];
        }


        if(isset($data['deleteImg'])) {
            $deleteImgs = $data['deleteImg'];
            unset($data['deleteImg']);
        }

        if(isset($deleteImgs)) {

            foreach($deleteImgs as $deleteImg) {

                DB::table('contacts')->where('logo_image', '=', $deleteImg)->delete();

            }
        }

        foreach($titles as $key => $title) {

            if($key != 0) {

            $contact = Contact::find($key);

            if($contact != null) {

                if(isset($logo_image[$key])) {

                $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/contact', $logo_image[$key]);
                Storage::put('/public/images/contact', $logo_image[$key]);

                $contact->update([
                        'id' => $key,
                        'title' => $title,
                        'address' => $address[$key],
                        'coordinates' => $coordinates[$key],
                        'logo_image' => $imagePath,
                    ]);

                Storage::delete($imagePath);
                } else {

                $contact->update([
                    'id' => $key,
                    'title' => $title,
                    'address' => $address[$key],
                    'coordinates' => $coordinates[$key],
                    ]);

                }
            } else {

                if(isset($logo_image[$key])) {

                $imagePath = Storage::put('/http://127.0.0.1:8000/storage/images/contact', $logo_image[$key]);
                Storage::put('/public/images/contact', $logo_image[$key]);

                Contact::create(
                    [
                        'id' => $key,
                        'title' => $title,
                        'address' => $address[$key],
                        'coordinates' => $coordinates[$key],
                        'logo_image' => $imagePath,
                    ]
                );
                Storage::delete($imagePath);

                } else {

                    Contact::create(
                        [
                            'id' => $key,
                            'title' => $title,
                            'address' => $address[$key],
                            'coordinates' => $coordinates[$key],
                        ]
                    );

                }

            }
        }
    }

        return redirect()->route('admin.page.index');
    }
}
