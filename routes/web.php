<?php

use Illuminate\Support\Facades\Route;
use App\Models\NewPost;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/home_posts', [App\Http\Controllers\HomeController::class, 'posts'])->name('posts');

Route::get('/home_posts_with_tags', [App\Http\Controllers\HomeController::class, 'postsWithTags'])->name('postsWithTags');
