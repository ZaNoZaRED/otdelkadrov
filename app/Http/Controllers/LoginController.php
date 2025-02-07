<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Неправильный логин или пароль'], 401);
        }

        $user = Auth::user();
        return redirect('/');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
