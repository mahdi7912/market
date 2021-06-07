@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <td>#</td>
                            <td>نام محصول</td>
                            <td>حداقل قیمت</td>
                            <td>حداکثر قیمت</td>
                            <td>حداقل تعداد</td>
                            <td>حداکثر تعداد</td>
                            <td>اقدامات</td>
                        </tr>
                        @forelse($productLists as $productList)
                            <tr>
                                <td>{{ $productList->id }}</td>
                                <td>{{ $productList->product->name ?? '' }}</td>
                                <td>{{ $productList->min_price }}</td>
                                <td>{{ $productList->max_price }}</td>
                                <td>{{ $productList->min_num }}</td>
                                <td>{{ $productList->max_num }}</td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <a class="mx-1 btn btn-primary" href="{{ '/users/edit/' . $productList->id }}">
                                            ویرایش
                                        </a>
                                        <form method="post" action="{{ '/users/destroy/' . $productList->id }}">
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
                </div>
            </div>
        </div>
    </div>
@endsection
