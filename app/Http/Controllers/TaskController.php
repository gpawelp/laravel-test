<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
    
    public function index()
    {
        $user = User::paginate();
        
        return view('users', compact('user'));
        //return $user;
    }
    
    //public function index(User $usr) 
    //{
    //    return view('user', compact('usr'));
    //    
    //    //dd($id);
    //    //$user = User::findOrFail($id);
    //    
    //    //dd($user);
    //    
    //    
    //    //return view('user', compact('user'));
    //    //return $user;
    //}
    
    public function all()
    {
        $users = User::paginate(4);
        
        return view('users', compact('users'));
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
