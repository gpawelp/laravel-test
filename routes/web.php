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
Auth::routes();

Route::get('/', function() {
    return view('pages.home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/home_posts', [App\Http\Controllers\HomeController::class, 'posts'])->name('posts');

//Route::get('/home_users_list', [App\Http\Controllers\HomeController::class, 'users_list'])->name('users_list');
