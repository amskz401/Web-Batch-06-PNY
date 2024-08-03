<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/contact", function() {
    return view("contact");
});

Route::get("/product", [App\Http\Controllers\ProductController::class, "index"])->name("products.route");

Route::post("/product", [App\Http\Controllers\ProductController::class, "add_product"])->name("add.product");

Route::get( "/delete-product/{pid}", [App\Http\Controllers\ProductController::class, "delete_product"])->name("delete.product");

Route::get( "/edit-product/{pid}", [App\Http\Controllers\ProductController::class, "edit_product"])->name("edit.product");
Route::post( "/update-product", [App\Http\Controllers\ProductController::class, "update_product"])->name("update.product");
Route::get("add-to-cart/{id}", [App\Http\Controllers\ProductController::class, "to_cart"])->name("add.to-cart");
Route::get("cart", [App\Http\Controllers\ProductController::class, "show_cart"])->name("show.cart");
Route::get("checkout", [App\Http\Controllers\ProductController::class, "checkout_page"])->name("checkout.page");
Route::post("complete-order", [App\Http\Controllers\OrderController::class, 'process_order'])->name("complete.order");
Route::get("thankyou", [App\Http\Controllers\OrderController::class, 'thank_you'])->name("thankyou.page");

Route::get("/create-users", [App\Http\Controllers\PublicController::class, 'create_dummy_records']);


Route::get("orders-list", [App\Http\Controllers\OrderController::class, 'index'])->name("order-list");