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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home_posts', [App\Http\Controllers\HomeController::class, 'posts'])->name('home_posts');

Route::get('/users_list', [App\Http\Controllers\TaskController::class, 'index']);


Route::get('/filter', function() {
    $collection = collect([
        [
            'user_id' => '1',
            'name' => 'john doe',
            'email' => 'johndoe@gmail.com',
            'address' => 'USA',
        ],
        [
            'user_id' => '2',
            'name' => 'David',
            'email' => 'david123@gmail.com',
            'address' => 'UK',
        ],
        [
            'user_id' => '3',
            'name' => 'Richard',
            'email' => 'richard@gmail.com',
            'address' => 'Australia',
        ],
    ]);
    
    $filtered = $collection->filter(function($value, $key) {
        if ($value['user_id'] == 2) {
            return true;
        }
        
    });
    
    dd($filtered->all());
    
    
//    $data = collect([1,2,3,4,5]);
//    
//    $filtered = $data->filter(function($value, $key) {
//        return $value > 2;
//    });
//    
//    dd($filtered->all());
});

Route::get('/collect', function() {
    
    $data = collect([1,2,3,4,5,6]);
    dump($data->take(-2));
});

Route::get('/contains', function() {
    $data = collect([
        ['role' => 'admin'],
        ['role' => 'supervisior'],
        ['role' => 'editor'],
    ]);
    
    dd($data->pluck('role')->contains('manager'));
    
});


Route::get('/pluck', function() {
    $collection = collect([
        ['brand' => 'tesla', 'color' => 'red'],
        ['brand' => 'toyota', 'color' => 'pink'],
        ['brand' => 'tesla', 'color' => 'black'],
        ['brand' => 'teyota', 'color' => 'orange'],
    ]);
    
    $data = $collection->pluck('color', 'brand');
    
    dd($data);
//    $roles = collect([
//        ['name' => 'admin'],
//        ['name' => 'supervisor'],
//        ['name' => 'editor'],
//    ]);
//    
//    dd($roles->pluck('name'));
    
});

Route::get('/other_operations', function() {
//    $data = collect([1,2,3,4,5,6,7]);
//    
//    dd($data->chunk(3));
    
    $data = collect([
        [1,2,3,4,6,7],
        [2,3],
        [7,1,5]
    ]);
    
    dd($data->collapse());
    
});

Route::get('/math', function() {
//    $data = collect([1,2,5,6,7,9]);
//    
//    dd($data->median());
    
    $data = collect([
        ['price' => 100, 'sold' => 1],
        ['price' => 200, 'sold' => 1],
        ['price' => 300, 'sold' => 0],
    ]);
    
    return ($data->sum(function($value) {
        if (!$value['sold']) {
            return null;
        }
        return $value['price'];
    }));
});

Route::get('/array', function() {
   
    $array = [
        'name' => 'John Doe',
        'age' => 22
    ];
    
    $array = array_divide($array);
    
    
    $array = [
        ['1', '2', '3'],
        ['4', '5', '6'],
    ];
    
    $array = array_collapse($array);
    
    
    $array = [
        'name' => 'shampoo',
        'price' => 50
    ];
    
    $array = array_except($array, ['price']);
    
    
    
//    $array = array_add($array, 'country', 'USA');
//    $array = array_add($array, 'number', 123123123);
    
    dd($array);
    
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


