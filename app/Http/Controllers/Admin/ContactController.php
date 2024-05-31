<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::get();
        return view('admin.pages.contacts.index', ['contacts' => $contacts]);
    }

    public function destroy(Contact $contact)
    {
        if ($contact->deleted_at) $contact->deleted_at = null;
        else $contact->deleted_at = now();

        $contact -> update();
        return redirect('/admin/contacts');
    }

}
