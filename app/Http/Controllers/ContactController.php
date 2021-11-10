<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contact.add');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],
            [
                'address.required' => 'address is required',
                'email.required' => 'email is required',
                'phone.required' => 'phone is required',
            ]
        );

        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.contact')->with('success', 'Contact Added Successfuly!');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],
            [
                'address.required' => 'address is required',
                'email.required' => 'email is required',
                'phone.required' => 'phone is required',
            ]
        );

        Contact::find($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.contact')->with('success', 'Contact Updated Successfuly!');
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('admin.contact')->with('success', 'Contact Deleted Successfuly!');
    }

    public function contact()
    {
        $contacts = Contact::first();
        return view('pages.contact', compact('contacts'));
    }

    public function ContactForm(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ],
            [
                'name.required' => 'name is required',
                'email.required' => 'email is required',
                'subject.required' => 'subject is required',
                'message.required' => 'message is required',
            ]
        );

        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Your Message Sent Successfuly!');
    }

    //rough work
    // public function index(){
    //     return view('midd.set');
    // }

    // public function cal()
    // {
    //     return view('midd.cal');
    // }

    // public function role()
    // {
    //     return view('midd.crm');
    // }

}
