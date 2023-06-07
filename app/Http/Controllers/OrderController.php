<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function getOrders()
    {
        $order = Order::all();
        if (!$order)
            return ['code' => 0, 'message' => 'Order tidak ditemukan'];
        return ['code' => 200, 'data' => $order];
    }
}
