<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function login()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }


    public function loginAuth(Request $request)
    {
        $validated = $request->validate([

            'email' => ['required', 'email',],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->route('profile')->with('success', 'Добро пожаловать');
        }
        return back()->withErrors([
            'email' => 'Ошибка логин и пароль'
        ]);

    }

    public function userProfile()
    {
        $user = Auth::user();
        return view('users.user-profile', [
            'user' => $user
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::query()->create($validated);

        // авторизовать сразу
        Auth::login($user);

        return redirect()->route('profile')->with('success', 'Регистрация успешна, добро пожаловать!');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::query()->findOrFail($id);
        return view('users.user-profile-settings', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::query()->findOrFail($id);

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'bio' => ['nullable', 'string', 'max:255'],
        ]);

        $user->update($validated);
        return redirect()->route('settings', $user->id)->with('success', 'Профиль успешно обновлён');

    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'], // сверка старого
            'password' => ['required', 'string', 'min:8', 'confirmed'], // новый + подтверждение
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Пароль успешно обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
