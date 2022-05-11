<?php

namespace App\Http\Controllers\Admin\Page\Contact;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Contact;
use App\Models\SeoBlock;
use App\Models\SeoContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke()
    {
        $contacts = Contact::all();
        $cinemas = Cinema::all();
        $seoBlock = SeoContact::find(1);

        return view('admin.page.contact.edit', compact('contacts', 'seoBlock', 'cinemas'));
    }
}
