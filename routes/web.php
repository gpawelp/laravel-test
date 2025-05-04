<?php

use Illuminate\Support\Facades\Route;
use App\Models\NewPost;
use Illuminate\Support\Str;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function() {
    return view('pages.home');
});

Route::get('/about', function() {
    return view('pages.about');
});

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.view');

Route::get('/helper', function() {
//    $sentence = "THe quick brown fox jumps over the lazy dog.";
    //    echo str_limit($sentence, 20, '...');
    
//    $sentence = "car";
//    echo str_plural($sentence);
    
//    $sentence = 'pens';
//    echo str_singular($sentence);
    
    $sentence = 'Laravel is the most popular framework';
    
    echo Str::slug($sentence) . "<br>";
    
    echo Str::title($sentence) . "<br>";
    
    echo Str::random(30) . "<br>";
});



//Route::get('/', function () {
//    return view('welcome');
//});

/*


Route::get('/users_test', function() {
   $users = [
//       'Pierwszy',
//       'Drugi',
//       'Trzeci'
   ];
   
   return view('users_test', compact('users'));
});

Auth::routes();

Route::get('/simple', [App\Http\Controllers\SimpleController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\TaskController::class, 'all']);
//Route::get('/user/{usr}', [App\Http\Controllers\TaskController::class, 'index']);
//Route::get('/test/{id}', [App\Http\Controllers\HomeController::class, 'test']);
//Route::view('/test', 'hello');
//Route::get('/users', function() {
//    $users = [
//        'John',
//        'Simon',
//        'Nic'
//    ];
//
//    
//    return view('home', compact('users')); 
//});


Route::prefix('jobs')->group(function () {
    Route::get('create', [App\Http\Controllers\TaskController::class, 'create']);
    Route::post('create', [App\Http\Controllers\TaskController::class, 'store'])->name('jobs.store');
});

Route::get('/posts', function () {
//    $posts = NewPost::paginate(2);
    $posts = NewPost::limit(2)->get();
//    $posts = NewPost::where('id', 3)->get();
    return $posts;
    
    
//    $posts = NewPost::all();
//    return $posts;
    
//    $posts = NewPost::get();
////    return $posts;
//    
//    foreach ($posts as $post) {
//        echo $post->title;
//    }
    
    
//    $post = NewPost::create([
//        'title' => 'New title 4',
//        'description' => 'New description 4'
//    ]);
    
//    $post = NewPost::find(2);
//    $post->delete();
    
    
//    $post = NewPost::where('id', 1)->update([
//        'title' => 'new way of update title',
//        'description' => 'new way to update description'
//    ]);
     
    
    
//    $post = NewPost::find(2);
//    $post->title = "updated title2";
//    $post->description = "updated description2";
//    $post->save();
    
//    $posts = NewPost::findOrFail(3);
//    return $posts;
    
    
//    NewPost::create([
//        'title' => 'A title again',
//        'description' => 'A new description'
//    ]);
    
//    $post = new NewPost();
//    $post->title = "a title";
//    $post->description = "a desc";
//    $post->save();
});

*/