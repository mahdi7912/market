@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form action="{{ '/admin/product/update/' . $product->id  }}" method="post">
                        @csrf
                        @method('put')
                        <input value="{{ $product->name }}" class="mt-2 form-control"
                               name="name" placeholder="نام"/>
                        <input value="{{ $product->pic }}" class="mt-2 form-control"
                               name="pic" placeholder="لینک تصویر"/>
                        <button class="btn btn-primary mt-2">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
