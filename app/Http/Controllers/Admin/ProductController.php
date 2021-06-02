<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);

        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());

        return back();
    }

    public function show(Product $product)
    {
        return view('admin.product.show' , compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit' , compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return back();
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back();
    }
}
