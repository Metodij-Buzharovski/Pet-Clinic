<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        return view('contacts.contact');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^07\d{7}$/',
            'subject'=>'required',
            'message' => 'required'
        ]);
        Contact::create($formFields);

        Mail::to('metobuzar@gmail.com')->send(new MyEmail($request->get('name'),$request->get('email'),$request->get('phone'),
        $request->get('subject'),$request->get('message')));
        return back()->with('success', 'We have received your message and will reply to you shortly.');
    }
}
