<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'patronymic' => 'nullable|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string',
        ]);

        // Создание нового пользователя
        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->patronymic = $request->input('patronymic'); // исправлена ошибка здесь
        $user->email = $request->input('email'); // исправлена ошибка здесь
        $user->phone = $request->input('phone'); // исправлена ошибка здесь
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Авторизация пользователя
        auth()->login($user);

        // Установка уведомления в сессии
        Session::flash('success', 'Вы успешно зарегистрированы');

        // Редирект на главную страницу
        return redirect('/');
    }
}