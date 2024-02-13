<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    public function edit(User $user)
    {
        $user = auth()->user();
        return view('users.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->save();

        return redirect()->route('users.profile');
    }
}
