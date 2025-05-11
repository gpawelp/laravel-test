<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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

Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contact.create');

Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::post('/contacts/{id}/update', [ContactController::class, 'update'])->name('contact.update');

Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');

Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contact.show');

Route::post('/contacts/{id}/delete', [ContactController::class, 'destroy'])->name('contact.destroy');