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


    //Все курсы
    Route::get('/courses', [CourseController::class, 'index'])->name('course.index');

    /*Редактирование курса*/
    Route::get('/courses/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('course.update');


    /*Детали курса*/
    Route::get('/courses/details/{id}', [CourseController::class, 'courseDetails'])->name('course.details-course');

    /*Добавление курса от студента*/
    Route::post('/student/add-course', [CourseController::class, 'addCourseByCode'])->name('student.add-course');


    /*Создание курса*/
    Route::get('/course', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course', [CourseController::class, 'store'])->name('courses.store');


    /*Покинуть курс студенту */
    Route::post('/student/leave-course/{courseId}', [CourseController::class, 'leaveCourse'])->name('student.leave-course');

    /*Удалить полностью курс*/
    Route::delete('/teacher/delete-course/{id}', [CourseController::class, 'destroy'])->name('teacher.delete-course');

    /*Страница создание и раздела к курсу*/
    Route::get('/course/{id}/chapter', [CourseController::class, 'createChapter'])->name('course.create-chapter');
    Route::post('/course/{id}/chapter', [CourseController::class, 'storeChapter'])->name('course.store-chapter');

    Route::get('/course/edit/{id}', [CourseController::class, 'editChapter'])->name('course.edit-chapter');
    Route::put('/course/edit/{id}', [CourseController::class, 'updateChapter'])->name('course.update-chapter');

    /*Удалить раздел в курсе*/
    Route::delete('/course/edit/{id}', [CourseController::class, 'destroyChapter'])->name('course.destroy-chapter');





});
