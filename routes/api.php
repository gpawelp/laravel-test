<?php

use App\Http\Controllers\ApiContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/contacts', [ApiContactController::class, 'store']);
//Route::get('/contacts', [ApiContactController::class, 'index']);
//Route::get('/contacts/{id}', [ApiContactController::class, 'show']);
//Route::patch('/contacts/{id}', [ApiContactController::class, 'update']);
//Route::delete('/contacts/{id}', [ApiContactController::class, 'destroy']);

Route::resource('contacts', ApiContactController::class);