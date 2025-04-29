<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\TaskController::class, 'index']);


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


Route::prefix('jobs')->group(function() {
    Route::get('create', [App\Http\Controllers\TaskController::class, 'create']);
    Route::post('create', [App\Http\Controllers\TaskController::class, 'store'])->name('jobs.store');
});