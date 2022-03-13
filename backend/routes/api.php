<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('v1')->group(function () {
    Route::resource('products', ProductController::class);

    Route::get('/products/name/{name}', [ProductController::class, 'searchByName']);

    Route::get('/products/price/{min}/{max}', [ProductController::class, 'searchByPrice']);

    Route::get('/products/category/{category_id}', [ProductController::class, 'searchByCategory']);
});
