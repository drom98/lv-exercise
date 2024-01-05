<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing')->with('contacts', Contact::all());
    }
}
