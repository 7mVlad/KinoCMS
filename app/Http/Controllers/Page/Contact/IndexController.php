<?php

namespace App\Http\Controllers\Page\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MainPage;


class IndexController extends Controller
{
    public function __invoke()
    {
        $mainPage = MainPage::find(1);

        $contacts = Contact::all();

        return view('page.contact.index', compact('mainPage', 'contacts'));
    }
}
