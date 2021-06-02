<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function login(Request $request)
    {
        if(auth()->check())
        {
            return redirect('/users');
        }

        $user = User::where(['code' => $request->code])->first();

        if(!$user) return back();

        if($user->password != $request->password) return back();

        auth()->login($user);

        return redirect('/users');
    }

    public function create(User $user)
    {
        $lists = $user->productLists;

        return view('users.order', compact('lists', 'user'));
    }

    public function store(Request $request, User $user)
    {
        $order = Order::create($request->only([
            'phone', 'name','total','user_id'
        ]));

        foreach ($request->ids as $key => $count) {
            $order->productLists()->attach($key, ['count' => $count]);
        }

        return ['message' => 'سفارش شما با موفقیت ثبت شد و در اسرع وقت با شما تماس گرفته خواهد شد.'];
    }

}

