<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function signupForm()
    {
        return view('auth.signup');
    }

    //Registro
    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->username = $request->get('username');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->birthday = $request->get('birthday');
        $user->password = Hash::make($request->get('password'));
        $user->rol = 'user';
        $user->save();

        Auth::login($user);

        return redirect()->route('users.profile');
    }

    //Login
    public function loginForm()
    {
        if (Auth::viaRemember()) {
            return 'Bienvenido de nuevo';
        }else if (Auth::check()) {
            return redirect()->route('users.profile');
        }else {
            return view('auth.login');
        }
    }

    //Función para loguearse
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $rememberLogin = ($request->get('remember')) ? true : false;
        if (Auth::guard('web')->attempt($credentials, $rememberLogin)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }else {
            $error = 'Error al acceder a la aplicación';
            return view('auth.login', compact('error'));
        }
    }

    //Función para cerrar sesión
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
