<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


/*==== Главная страница и О нас ====*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');




/*======================================================
 * Не авторизованный пользователь имеет доступ к этим маршрутам
 ========================================================*/
Route::middleware('guest')->group(function () {
//Регистрация и авторизация
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'store'])->name('register');
    Route::post('/login', [AuthController::class, 'loginAuth'])->name('auth.login');
});



/*======================================================
 * Авторизованный пользователь имеет доступ к этим маршрутам
 ========================================================*/
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/profile', [AuthController::class, 'userProfile'])->name('profile');
});
