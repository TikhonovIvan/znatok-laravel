<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
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

    //выйти из кабинета
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //Редактирование профиля
    Route::get('/profile', [AuthController::class, 'userProfile'])->name('profile');
    Route::get('/settings/{id}', [AuthController::class, 'edit'])->name('settings');
    Route::put('/settings/{id}', [AuthController::class, 'update'])->name('settings.update');
    Route::put('/profile/password', [AuthController::class, 'updatePassword'])->name('password.update');


    //Создание курса
    Route::get('/courses', [CourseController::class, 'index'])->name('course.index');

    Route::get('/course', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course', [CourseController::class, 'store'])->name('courses.store');



});
