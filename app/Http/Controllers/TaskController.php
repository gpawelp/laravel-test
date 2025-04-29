<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
    
    public function index() 
    {
        return User::all();
    }
    
    //
    //public function create()
    //{
    //    return view('home');
    //}
    //
    //public function store(Request $request)
    //{
    //    $title = $request->get('title');
    //    echo $title;
    //    //return view('home');
    //    //return "OK";
    //}
}
