<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Basement;
use App\Models\Order;
use App\Models\Product_list;
use Exception;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $base = Basement::orderby('id', 'ASC')->paginate(20);
        return view('users.create', compact('base'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            Product_list::create($request->all());

        } catch (Exception $e) {
            dd($e);
            return redirect(route('list_index'))->with("e",$e->getMessage());
        }
        $result = 'لیست با موفقیت ساخته شد';
        return redirect(route('list_index'))->with("result",$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_list  $product_list
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        $order = Order::with('product_lists')->find($order);
        return view('users.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_list  $product_list
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_list $product_list)
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product_list  $product_list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_list $product_list)
    {
        try {
            $product_list->update($request->all());

         } catch (Exception $e) {
             return redirect(route('list_edit'))->with('e',$e->getMessage());
         }
         $result = "مطلب ویرایش شد";
         return redirect(route('list_edit'))->with('result');
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_list  $product_list
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_list $product_list)
    {
        try {
            $product_list->delete();


        } catch (Exception $e) {
            return redirect(route('list_destroy'))->with('e',$e->getMessage());
        }
    }
}
