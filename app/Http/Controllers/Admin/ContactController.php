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
        $contacts = Contact::orderByDesc('created_at')->get();
        return view ('admin.pages.contact', compact('contacts'));
    }
}
 