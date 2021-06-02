@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="d-block">نام:</div>
                    <div class="d-block alert alert-info">{{ $order->name }}</div>
                    <div class="d-block">تلفن:</div>
                    <div class="d-block alert alert-info">{{ $order->phone }}</div>
                    <div class="d-block">مجموع خرید:</div>
                    <div class="d-block alert alert-info">{{ $order->total }}</div>
                    @foreach($order->productLists as $productList)
                        <div class="d-block">نام محصول:</div>
                        <div class="d-block alert alert-info">{{ $productList->product->name }}</div>
                        <div class="d-block">تعداد محصول:</div>
                        <div class="d-block alert alert-info">{{ $productList->pivot->count }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
