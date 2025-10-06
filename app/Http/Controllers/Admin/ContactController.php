<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
        $items = \App\Models\Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('items')); // 👈 OJO a la ruta
    }
}
