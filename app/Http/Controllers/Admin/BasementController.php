<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Basement;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class BasementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::orderby('id','ASC');
        return view('admin.create', compact('product'));
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
            Basement::create($request->all());

        } catch (Exception $e) {
            dd($e);
            return redirect(route('admin_base_index'))->with("e",$e->getMessage());
        }
        $result = 'كالا با موفقیت به  انبار اضافه شد';
        return redirect(route('admin_base_index'))->with("result",$result);
    }


    public function edit(Basement $basement)
    {
        return view('admin.edit', compact('basement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basement  $basement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basement $basement)
    {
        try {

            $basement->update($request->all());

         } catch (Exception $e) {
             return redirect(route('admin_base_index'))->with('e',$e->getMessage());
         }
         $result = "مطلب ویرایش شد";
         return redirect(route('admin_base_index'))->with('result');
    }

    public function destroy(Basement $basement)
    {
        try {
            $basement->delete();


        } catch (Exception $e) {
            return redirect(route('admin_base_index'))->with('e',$e->getMessage());
        }
    }
}
