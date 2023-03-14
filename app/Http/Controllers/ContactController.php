<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Contact_View()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index',compact('contacts'));
    }
    public function  Add_Contact(){
        return view('admin.contact.create');
    }
    public function Contact_Store(Request $request)
    {
        Contact::insert([
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('admin.contact');
    }

    public function Fon_Contact_View()
    {
        $contact = Contact::latest()->first();
        return view('fontend.Fon_Contact_View',compact('contact'));
    }

}
