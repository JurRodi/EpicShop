<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $data = [
            'orders' => $orders,
        ];
        return view('admin/orders', $data);
    }
}
