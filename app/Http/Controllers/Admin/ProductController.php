<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function create()
    {
        return view('admin.product.create');
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
            Product::create($request->all());

        } catch (Exception $e) {
            dd($e);
            return redirect(route('admin_base_index'))->with("e",$e->getMessage());
        }
        $result = 'لیست با موفقیت ساخته شد';
        return redirect(route('admin_base_index'))->with("result",$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $product->update($request->all());
        } catch (Exception $e) {
            return redirect(route('admin_base_index'))->with('e' , $e->getMessage());
        }
        $result = "مطلب ویرایش شد";
        return redirect(route('admin_base_index'))->with('result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (Exception $e) {
            return redirect(route('admin_base_index'))->with('e' , $e->getMessage());
        }
        $result = "مطلب حذف شد";
        return redirect(route('admin_base_index'))->with('result');
    }
}
