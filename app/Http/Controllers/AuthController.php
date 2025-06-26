<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        User::query()->create($validated);
        return redirect()->route('login')->with('success', 'Регистрация успешна пройдена');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
