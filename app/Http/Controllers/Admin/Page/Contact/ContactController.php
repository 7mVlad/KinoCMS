<?php

namespace App\Http\Controllers\Admin\Page\Contact;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Contact;
use App\Models\SeoContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Page\Contact\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function edit()
    {
        $contacts = Contact::all();
        $cinemas = Cinema::all();
        $seoBlock = SeoContact::first();

        return view('admin.page.contact.edit', compact('contacts', 'seoBlock', 'cinemas'));
    }

    public function update(UpdateRequest $request)
    {
        $data = $request->validated();

        $data = SeoContact::store($data);

        Contact::storeOrUpdate($data);

        return redirect()->route('admin.contact.edit');
    }
}
