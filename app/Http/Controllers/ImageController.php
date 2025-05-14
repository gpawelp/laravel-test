<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function album()
    {
        $albums = Album::with('images')->get();
        
        return view('album.welcome', compact('albums'));
    }
    
    public function show($id)
    {
        $album_images = Album::findOrFail($id);
        
        return view('album.galery', compact('album_images'));
    }
    
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
        $this->validate($request, [
            'album' => 'required|min:3|max:50',
            'image' => 'required'
        ]);
        
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

        return [
            'message' => '<div class="alert alert-success">Album created successfully!</div>',
            'code' => 1
        ];
        
//        return redirect()->route('album.home');
    }
    
    public function destroy()
    {
        $id = request()->get('id');
        
        $image = Image::findOrFail($id);
        $fileName = $image->name;
        $image->delete();
        
        Storage::delete('public/' . $fileName);
        
        return redirect()->back()->with('message', 'Image deleted successfully');
    }
    
    public function addImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);
        
        $album = Album::findOrFail($request->get('album'));
        
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

//        return redirect()->back()->with('message', 'Image added successfully');
        
        return [
            'message' => '<div class="alert alert-success">New image added successfully!</div>',
            'code' => 2
        ];
    }
}
