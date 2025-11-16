<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::where('is_replied', 0)->get();
        return view ('admin.pages.contact', compact('contacts'));
    }
}
 