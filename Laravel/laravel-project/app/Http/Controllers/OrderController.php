<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::get();
        $data['orders'] = $orders;
        return view("orders-list", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function process_order(Request $request) {
        $cart = Session::get("cart");
        $total = 0;
        $order = new Order();
        foreach($cart as $cr) {
            $total += $cr['price'] * $cr['quantity'];
        }
        
        $order->product_id = 0;
        $order->tranaction_id = rand(10000, 99999999);
        $order->sub_total = $total;
        $order->grand_total = $total;
        $order->save();

        Session::forget("cart");
        return redirect(route("thankyou.page"));

    }

    public function thank_you() {
        return view("thankyou");
    }
}