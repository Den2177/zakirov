<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->cartProducts;
        $cartItems = $cartItems->map(function($current) {
            $current['product'] = Product::find($current->product_id);
            return $current;
        });
        return view('cart.index', compact('cartItems'));
    }
    public function add(Product $product)
    {
        if (auth()->user()->cartProducts()->where('carts.product_id', $product->id)->exists()) {
            return redirect()->back()->withErrors([
                'message' => 'Такой товар уже есть в корзине',
            ]);
        }

        Cart::create([
            'product_id' => $product->id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('cart');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart');
    }
}
