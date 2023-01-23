<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductOrder;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        $data = [
            'cart' => $cart,
        ];
        return view('users/shoppingCart', $data);
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function order(Request $request)
    {
        $cart = session()->get('cart');
        $products = Product::find(array_keys($cart));
        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cart[$product->id]['quantity'];
        }
        $order = new Order();
        $order->total = $total;
        $order->save();
        
        foreach ($products as $product) {
            $productOrder = new ProductOrder();
            $productOrder->order_id = $order->id;
            $productOrder->product_id = $product->id;
            $productOrder->save();
        }

        session()->forget('cart');
        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}
