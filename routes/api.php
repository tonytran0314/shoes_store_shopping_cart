<?php

use App\Http\Controllers\API\V1\ShowShoesController;
use App\Http\Controllers\API\V1\CartItemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\V1'], function(){
    Route::resource('show_shoes', ShowShoesController::class)->only('index');
    Route::resource('cart_items', CartItemsController::class)->only('index');
});