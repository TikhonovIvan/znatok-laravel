<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VideoController;
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

Route::get('/courses/details/{id}', [CourseController::class, 'courseDetails'])->name('course.details-course');


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
//    Route::get('/courses/details/{id}', [CourseController::class, 'courseDetails'])->name('course.details-course');

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


    /*Создание лекции*/
    Route::get('/course/{course}/lesson/create', [LessonController::class, 'create'])->name('course.lesson.create');
    Route::post('/course/{course}/lesson/create', [LessonController::class, 'store'])->name('course.lesson.store');

    /*Редактирование лекции*/
    Route::get('/course/lesson/edit/{id}', [LessonController::class, 'edit'])->name('course.lesson.edit');
    Route::put('/course/lesson/edit/{id}', [LessonController::class, 'update'])->name('course.lesson.update');
    Route::get('/course/lesson/show/{id}', [LessonController::class, 'show'])->name('course.lesson.show');

    /*Удаление лекции*/
    Route::delete('/course/lesson/delete/{id}', [LessonController::class, 'destroy'])->name('course.lesson.delete');

    /*Создание видео материала*/
    Route::get('/course/{course}/lesson/video/create', [VideoController::class, 'create'])->name('course.video.create-lesson');
    Route::post('/course/{course}/lesson/video/create', [VideoController::class, 'store'])->name('course.video.store-lesson');

    /*Редактирование видео материала*/
    Route::get('/course/lesson/video/edit/{id}', [VideoController::class, 'edit'])->name('course.video.edit-lesson');
    Route::put('/course/lesson/video/edit/{id}', [VideoController::class, 'update'])->name('course.video.update-lesson');
    Route::get('/course/lesson/video/show/{id}', [VideoController::class, 'show'])->name('course.video.show-lesson');

    Route::delete('/course/lesson/video/delete/{id}', [VideoController::class, 'destroy'])->name('course.video.delete-lesson');

    /*Создание теста*/
    Route::get('/course/{course}/lesson/test/create', [TestController::class, 'create'])->name('course.test.create');
    Route::post('/course/{course}/lesson/test/create', [TestController::class, 'store'])->name('course.test.store');

    /*Редактирование теста*/
    Route::get('/course/lesson/test/edit/{id}', [TestController::class, 'edit'])->name('course.test.edit');
    Route::put('/course/lesson/test/edit/{id}', [TestController::class, 'update'])->name('course.test.update');



    /*Удалить курс*/
    Route::delete('/course/lesson/test/delete/{id}', [TestController::class, 'destroy'])->name('course.test.delete');

    /*Создание вопросов и ответов к тесту*/
    Route::get('/course/{course}/lesson/questions/create', [QuestionController::class, 'create'])->name('course.test.questions.create');
    Route::post('/course/{course}/lesson/questions/create', [QuestionController::class, 'store'])->name('course.test.questions.store');


    /*Редактирование вопросов и ответов*/
    Route::get('/course/lesson/questions/edit/{id}', [QuestionController::class, 'edit'])->name('course.test.questions.edit');
    Route::put('/course/lesson/questions/edit/{id}', [QuestionController::class, 'update'])->name('course.test.questions.update');

    /*Просмотр теста */
    Route::get('/course/lesson/test/show/{id}', [TestController::class, 'show'])->name('course.test.show');
    /*Результат теста*/
    Route::post('/test/{test}/submit', [TestController::class, 'submit'])->name('test.submit');




});
