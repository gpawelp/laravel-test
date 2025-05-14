<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Models\Comment;
use App\Models\NewPost;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
Auth::routes();

Route::get('/', function() {
    return view('pages.home');
});

Route::get('/home', [HomeController::class, 'index'])->name('index');


Route::get('/album/index', [ImageController::class, 'index'])->name('album.index');
Route::get('/album/album', [ImageController::class, 'album'])->name('album.album');

Route::get('/album', [ImageController::class, 'home'])->name('album.home');

Route::post('/album/addimage', [ImageController::class, 'addImage'])->name('album.addimage');
Route::post('/album', [ImageController::class, 'store'])->name('album.store');

Route::get('/albums/{id}', [ImageController::class, 'show'])->name('album.show');

Route::post('/image/delete', [ImageController::class, 'destroy'])->name('image.delete');