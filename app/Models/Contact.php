<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $guarded = false;

    public function getCinema()
    {
        return $this->hasOne(Cinema::class, 'id', 'cinema_id');
    }

    public static function deleteImage($data)
    {
        if (isset($data['contactsDeleteImage'])) {

            foreach ($data['contactsDeleteImage'] as $deleteImage) {
                $contact = Contact::find($deleteImage);

                Storage::disk('public')->delete($contact->logo_image);
                $contact->update([
                    'logo_image' => null
                ]);
            }

            unset($data['contactsDeleteImage']);
        }

        return $data;
    }

    public static function storeOrUpdate($data)
    {
        $data = Contact::deleteImage($data);

        if (isset($data['contactsDelete'])) {

            foreach ($data['contactsDelete'] as $deleteContact) {
                $contact = Contact::find($deleteContact);

                Storage::disk('public')->delete($contact->logo_image);
                $contact->delete();
            }

            unset($data['contactsDelete']);
        }

        if (isset($data['logo_image'])) {
            $logo_image = $data['logo_image'];
        }

        $cinemaIds = $data['cinema_id'];
        $address = $data['address'];
        $coordinates = $data['coordinates'];

        foreach ($cinemaIds as $key => $cinemaId) {

            $contact = Contact::find($cinemaId);

            if (isset($logo_image[$key])) {

                $imagePath = Storage::disk('public')->put('images/contact', $logo_image[$key]);
                isset($contact->logo_image) ? Storage::disk('public')->delete($contact->logo_image) : '';

                Contact::updateOrCreate(['cinema_id' => $cinemaId], [
                    'cinema_id' => $cinemaId,
                    'address' => $address[$key],
                    'coordinates' => $coordinates[$key],
                    'logo_image' => $imagePath
                ]);
            } else {
                Contact::updateOrCreate(['cinema_id' => $cinemaId], [
                    'cinema_id' => $cinemaId,
                    'address' => $address[$key],
                    'coordinates' => $coordinates[$key],
                ]);
            }
        }
    }
}
