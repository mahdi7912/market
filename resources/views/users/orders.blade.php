@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <table class="table table-sm-responsive table-striped">
                        <tr>
                            <td>#</td>
                            <td>نام</td>
                            <td>تلفن</td>
                            <td>مجموع</td>
                            <td>اقدامات</td>
                        </tr>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->total }}</td>
                                <td><a href="{{ '/user/order/' . $order->id }}">مشاهده</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <p>چیزی نداریم</p>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
