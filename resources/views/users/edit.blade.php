@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form action="{{ '/users/update/' . $productList->id }}" method="post">
                        @csrf
                        @method('put')
                        <input value="{{ $productList->max_price }}" type="number" class="mt-2 form-control"
                               name="max_price" placeholder="حداکثر قیمت"/>
                        <input value="{{ $productList->min_price }}" type="number" class="mt-2 form-control"
                               name="min_price" placeholder="حداقل قیمت"/>
                        <input value="{{ $productList->max_num }}" type="number" class="mt-2 form-control"
                               name="max_num" placeholder="حداکثر تعداد"/>
                        <input value="{{ $productList->min_num }}" type="number" class="mt-2 form-control"
                               name="min_num" placeholder="حداقل تعداد"/>
                        <select name="product_id" class="mt-2 form-control">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}"
                                        @if($productList->product->id == $product->id) selected @endif>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary mt-2">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
