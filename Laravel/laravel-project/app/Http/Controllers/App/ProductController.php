<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index() {
        $all_products = Product::get();
        return response()->json($all_products);
    }

    public function special_products() {
        $all_products = Product::limit(10)->get();
        return response()->json($all_products);
    }

}