<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')->get();
        foreach ($orders as $order) {
            $order->products = DB::table('products')
            ->join('product_orders', 'products.id', '=', 'product_orders.product_id')
            ->join('orders', 'product_orders.order_id', '=', 'orders.id')
            ->get();
        }
        $data = [
            'orders' => $orders,
        ];
        // dd($data);
        return view('admin/orders', $data);
    }
}
