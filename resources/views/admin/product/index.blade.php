@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <table class="table table-sm-responsive table-striped">
                        <tr>
                            <td>#</td>
                            <td>نام محصول</td>
                            <td>اقدامات</td>
                        </tr>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <a class="mx-1 btn btn-primary" href="{{ url('/admin/product/edit/' . $product->id ) }}">
                                            ویرایش
                                        </a>
                                        <form method="post" action="{{ url('/admin/product/destroy/' . $product->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">حذف</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <p>چیزی نداریم</p>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
