<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Image;

class ImageController extends Controller
{

    public function index()
    {
        $images = Image::get();

        return view('album.index_list', compact('images'));
    }

    public function home()
    {
        return view('album.home');
    }
    
    public function store(Request $request)
    {
        $album = Album::create(['name' => $request->get('album')]);
        
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('uploads', 'public');
                Image::create([
                    'name' => $path,
                    'album_id' => $album->id
                ]);
            }
//            
//            // Single image
////            Image::create([
////                'name' => $request->file('image')->store('uploads', 'public'),
////                'album_id' => 1
////            ]);
        }

        return redirect()->route('album.index');
    }
}
