<?php

use App\Http\Controllers\Core\StoreController;
use App\Http\Controllers\AuthController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([ 

    'middleware' => ['jwt.verify'],
    'prefix' => 'v1'

], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::get('index', [StoreController::class, 'index']);
    Route::post('store', [StoreController::class, 'store']); 
    Route::put('store/{id}', [StoreController::class, 'update']); //put=update
    Route::delete('store/{id}', [StoreController::class, 'destroy']);

});



