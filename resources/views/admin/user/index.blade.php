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
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <a class="mx-1 btn btn-primary" href="{{ '/admin/user/edit/' . $user->id }}">
                                            ویرایش
                                        </a>
                                        <form method="post" action="{{ '/admin/user/destroy/' . $user->id }}">
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
