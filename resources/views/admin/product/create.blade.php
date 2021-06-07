@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form action="{{ '/admin/product/store' }}" method="post">
                        @csrf
                        <input class="mt-2 form-control" name="name" placeholder="نام محصول" />
                        <input class="mt-2 form-control" name="pic" placeholder="لینک تصویر محصول" />
                        <button class="btn btn-primary mt-2">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
