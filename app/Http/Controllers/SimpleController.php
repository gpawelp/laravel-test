<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleController extends Controller
{
    
    public function index()
    {
        return view('simple_form');
    }
}
