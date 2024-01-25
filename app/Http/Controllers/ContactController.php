<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class Contactcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::get();
        return view('admin.contact.list', compact('contact'));
    }

    //display list of unreadmessage

    public function unread()
    {
        $contacts = Contact::where('unread', 0)->get();
        return view('admin.contact.unreadmessage', compact('contacts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'mail' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string|max:400'
        ]);
        Contact::create($data);
        Mail::to('as3957401@gmail.com')->send(new ContactMail($data));
        return redirect()->back()->with('success', 'Email sent successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Contact::where('id', $id)->update(['unread' => 1]);
        $contact = Contact::findOrFail($id);
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->back();
    }
}
