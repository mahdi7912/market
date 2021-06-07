@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form action="{{ '/admin/user/store' }}" method="post">
                        @csrf
                        <input class="mt-2 form-control" name="name" placeholder="نام کاربر" />
                        <input class="mt-2 form-control" name="phone" placeholder="تلفن" />
                        <input class="mt-2 form-control" name="password" placeholder="رمز" />
                        <select name="type" class="form-control mt-2">
                            <option value="admin">ادمین</option>
                            <option value="user">کاربر</option>
                        </select>
                        <button class="btn btn-primary mt-2">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
