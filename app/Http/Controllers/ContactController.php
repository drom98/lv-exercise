<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contacts.index')->with('contacts', Contact::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        Contact::create([
           'name' => $request->name,
           'email' => $request->email,
           'contact' => $request->contact,
        ]);

        return self::index();
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        return view('contacts.edit')->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contact $contact)
    {
        $this->validateRequest($request);

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact = $request->contact;
        $contact->save();

        return redirect(route('contacts.index'))->with('success', 'Contacto atualizado corretamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact)
    {
        //
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'min:5'],
            'contact' => ['required', 'digits:9', Rule::unique('contacts')->ignore($request->route('contact.id'))],
            'email' => ['required', 'email', Rule::unique('contacts')->ignore($request->route('contact.id'))],
        ]);
    }
}
