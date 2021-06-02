@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form action="{{ url('/admin/user/update/' . $user->id ) }}" method="post">
                        @csrf
                        @method('put')
                        <input value="{{ $user->name }}" class="mt-2 form-control" name="name" placeholder="نام کاربر" />
                        <input value="{{ $user->phone }}" class="mt-2 form-control" name="phone" placeholder="تلفن" />
                        <input value="{{ $user->password }}" class="mt-2 form-control" name="password" placeholder="رمز" />
                        <select name="type" class="form-control mt-2">
                            <option @if($user->type == 'admin') selected @endif value="admin">ادمین</option>
                            <option @if($user->type == 'user') selected @endif value="user">کاربر</option>
                        </select>

                        <button class="btn btn-primary mt-2">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
