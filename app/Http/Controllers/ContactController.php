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
        return view('messages', ['data' => Contact::all()]);
    }

    public function showOneMessage($id){
        $contact = new Contact();
        return view('one-message', ['data' => $contact->find($id)]);
    }

    public function updateOneMessage($id){
        $contact = new Contact();
        return view('update-message', ['data' => $contact->find($id)]);
    }

    public function updateOneMessageSubmit($id, ContactRequest $request){
        $contact = Contact::find($id);
        $contact->name = $request->input('name');
        $contact->subject = $request->input('subject');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'Message update');
    }

    public function deleteOneMessage($id){

        Contact::find($id)->delete();

        return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');

    }
}
