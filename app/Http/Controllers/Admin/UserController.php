<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);

        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());

        return back();
    }

    public function show(User $user)
    {
        return view('admin.user.show' , compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit' , compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
