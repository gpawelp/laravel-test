<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OldContactController extends Controller
{
    
    public function index()
    {
        return view('pages.contact');
    }
}
