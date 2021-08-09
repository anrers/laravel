<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $request){
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->subject = $request->input('subject');

        $contact->save();

        return redirect()->route('contact')->with('success', 'Form add');
    }

    public function allData(){
        $contact = Contact::all();

        return view('messages', ['data' => $contact]);
    }
}
