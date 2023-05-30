<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function store()
    {
        $cartItems = auth()->user()->cartProducts;

        if (!$cartItems->count()) {
            return redirect()->back()->withErrors([
                'message' => 'Сначала добавьте товаров в корозину!'
            ]);
        }

        $cartItems = $cartItems->map(function($current) {
            $current['product'] = Product::find($current->product_id);
            return $current;
        });
        $fullPrice = $cartItems->map(fn($i) => $i->product)->sum('price');

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'full_price' => $fullPrice,
        ]);

        $productIds = $cartItems->map(fn($i) => $i->product_id);

        $order->products()->attach($productIds);
        auth()->user()->cartProducts()->delete();
        return redirect()->route('order.index');
    }

    public function index()
    {
        $orders = auth()->user()->orders;
        return view('order.index', compact('orders'));
    }

    public function productsIndex(Order $order)
    {
        $products = $order->products;
        return view('order.products', compact('products'));
    }
}
