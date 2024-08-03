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
    // echo "<h1>First Heading in Laravel</h1>";
    return view('index');
});

Route::get("about", function() {
    echo "This is my about page";
});

Route::get("/{page}", function($page) {
    
    return view($page);
});