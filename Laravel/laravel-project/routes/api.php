<?php

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

Route::post( "create-token",  [App\Http\Controllers\PublicController::class, "generate_token"]);

Route::get("all-products", [App\Http\Controllers\App\ProductController::class, "index"]);
// Route::get("special-products", [App\Http\Controllers\App\ProductController::class, "special_products"]);

Route::group( ["middleware" => ["auth:sanctum"]], function() {
    Route::get("special-products", [App\Http\Controllers\App\ProductController::class, "special_products"]);
} );