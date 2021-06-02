<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Basement;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductList;
use Exception;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        $productLists = ProductList::where(['user_id' => auth()->id() ?? 0])->get();

        return view('users.index',compact('productLists'));
    }

    public function create()
    {
        $products = Product::all();

        return view('users.create', compact('products'));
    }

    public function store(Request $request)
    {
        ProductList::create(
            $request->all() + ['user_id' => auth()->id() ?? 0]
        );

        return back();
    }

    public function show($order)
    {
        $order = Order::with('productLists')->find($order);

        return view('users.show', compact('order'));
    }

    public function edit(ProductList $productList)
    {
        $products = Product::all();

        return view('users.edit', compact('productList','products'));
    }

    public function update(Request $request, ProductList $productList)
    {
        $productList->update($request->all());

        return back();
    }

    public function destroy(ProductList $productList)
    {
        $productList->delete();

        return back();
    }
}
