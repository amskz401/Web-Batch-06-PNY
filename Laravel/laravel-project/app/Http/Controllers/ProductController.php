<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::orderBy("id", "desc")->paginate(20);
        $data['products'] = $products;
        return view("products", $data);
    }

    public function add_product(Request $request) {
        // $conn->query("insert into produ")

        $request->validate([
            "title" => ["required", "string"],
            "stock" => ["required", "numeric"],
            "price" => ["required", "numeric"],
            "image" => ["required", "mimes:png,jpeg,pdf,txt"]
        ]);

        $file_path = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $new_name = time().'.'.$ext;
            $file->move(public_path("assets"), $new_name);
            $file_path = "/assets/$new_name";
        }
        

        $product = new Product();
        $product->title = $request->title;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->image = $file_path;
        $product->save();
        return redirect()->back();
    }

    public function delete_product($pid) {
        Product::where("id", $pid)->delete();
        return redirect()->back();
    }

    public function edit_product($pid) {
        $prodct = Product::find($pid);
        $data["product"] = $prodct;
        return view("edit-product", $data);
    }


    public function update_product(Request $request) {
        // $conn->query("insert into produ")

        $request->validate([
            "title" => ["required"],
            "stock" => ["required", "numeric"],
            "price" => ["required", "numeric"],
            "image" => ["required", "mimes:png,jpeg,jpg,pdf|size:512"]
        ]);
        
        $image_name = "";
        if($request->hasFile("image")){
            $file = $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $new_file_name = time().".".$ext; //"5435345345.png";
            $file->move(public_path("assets"), $new_file_name);
            $image_name = "/assets/$new_file_name";

        }
        $product = Product::find($request->id);
        $product->title = $request->title;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->image = $image_name;
        $product->save();
        return redirect(route("products.route"));
    }

    public function to_cart($pid = 0) {
        $product = Product::find($pid);
        if(Session::get("cart")) {
            $cart = Session::get("cart");

            $new_item = [
                "id" => $product->id,
                "title" => $product->title,
                "image" => $product->image,
                "quantity" => 1,
                "price" => $product->price
            ];
            array_push($cart, $new_item);
            Session::put("cart", $cart);
        }
        else {
            $cart[] = [
                "id" => $product->id,
                "title" => $product->title,
                "image" => $product->image,
                "quantity" => 1,
                "price" => $product->price
            ];

            Session::put("cart", $cart);
        }
        return redirect()->back()->with("message", "Product Added in cart");
    }

    public function show_cart() {
        $cart = Session::get("cart");
        $data['cart'] = $cart;
        return view("cart", $data);
    }
    public function checkout_page() {
        $cart = Session::get("cart");
        $data['cart'] = $cart;
        return view("checkout", $data);
    }
}