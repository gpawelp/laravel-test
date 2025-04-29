<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
    
    public function index(User $usr) 
    {
        return view('user', compact('usr'));
        
        //dd($id);
        //$user = User::findOrFail($id);
        
        //dd($user);
        
        
        //return view('user', compact('user'));
        //return $user;
    }
    
    public function all()
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
