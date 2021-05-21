<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product_list;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Product_list::orderby('id','ASC');
        return view('users.order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $order = Order::create($request[

            ]);
            foreach ($request->ids as $id) {
                $order->product_lists()->attach($id['product_list_id'],['count' => $id['count']]);
            }

        } catch (Exception $e) {

            return redirect(route('list_index'))->with("e",$e->getMessage());
        }
        $result = 'لیست با موفقیت ثبت شد';
        return redirect(route('list_index'))->with("result",$result);
    }

}

