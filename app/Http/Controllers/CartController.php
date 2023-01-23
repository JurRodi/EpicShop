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

    public function addToCart(Request $request, $id)
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
            $request->session()->flash('message', 'Product added to cart successfully');
            return redirect('/');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            $request->session()->flash('message', 'Product added to cart successfully');
            return redirect('/');
        }
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        $request->session()->flash('message', 'Product added to cart successfully');
        return redirect('/');
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
            $productOrder->quantity = $cart[$product->id]['quantity'];
            $productOrder->order_id = $order->id;
            $productOrder->product_id = $product->id;
            $productOrder->save();
        }

        session()->forget('cart');
        $request->session()->flash('message', 'Order placed successfully');
        return redirect('/cart');
    }
}
