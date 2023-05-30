<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'birthday' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'patronymic' => 'required',
            'phone' => 'required',
        ]);
        $user = User::create($request->all());
        Auth::login($user);

        return redirect()->route('home');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $data = $request->all();
        $user = User::query()->where('password', $data['password'])->firstWhere('email', $data['email']);

        if (!$user) {
            return redirect()->back()->withErrors([
                'message' => 'Пользователь не найден',
            ]);
        }

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
