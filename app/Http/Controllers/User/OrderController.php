<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where(['user_id' => auth()->id() ?? 0])->paginate(15);

        return view('users.orders', compact('orders'));
    }

    public function show(Request $request,Order $order)
    {
        return view('users.show', compact('order'));
    }
}
