<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrudController extends Controller
{
    public function index()
    {
        $users  = User::orderBy('created_at', 'desc')->get();

        return view('admin.user.index', [
            'users' => $users
        ]);
    }


    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->withSuccess('Информация о пользователе добавлена!');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->withSuccess('Информация о пользователе обнавлена!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->withSuccess('Информация о пользователе удалена!');
    }
}
