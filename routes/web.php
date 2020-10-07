<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomePageController@welcome');
Route::get('/simulator', 'HomePageController@simulator');
Route::get('/welcome', 'HomePageController@welcome_page');
Route::get('/welcome2', 'HomePageController@welcome2_page');
Route::get('/student_profile', 'HomePageController@student_profile');

    Route::get('/view_course/{course_id}', 'HomePageController@view_course' )->name('view_course');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Для авторизации через соц сети -
// https://laravel.com/docs/7.x/socialite
    Route::get('/login/{provider}/{signup?}', 'Auth\SocialiteController@redirect')->where(['provider' => 'google|facebook', 'signup' => 'signup'])->name('login.social');
    Route::get('/login/{provider}/callback', 'Auth\SocialiteController@callback')->where('provider','google|facebook');
    Route::get('/login/role/{user_id}/{student_id}', 'Auth\SocialiteController@role')->name('login.role');
    Route::post('/login/role/{user_id}/{student_id}/set', 'Auth\SocialiteController@setRole')->name('login.setrole');

// Админ

    // Индекс Админа
    Route::get('/admin', 'AdminController@index')->name('admin_panel')->middleware('can:admin_rights');

    // Управление пользователями
    Route::get('/admin/users_control', 'AdminController@users_controll')->name('users_controll')->middleware('can:admin_rights');
        // Изменить пользователя
        Route::get('/admin/users_control/edit/{user_id}', 'AdminController@user_edit')->name('user_edit')->middleware('can:admin_rights');
            // Применить изменения пользователя
            Route::post('/admin/users_control/edit/{user_id}/apply', 'AdminController@user_edit_apply')->name('user_edit_apply')->middleware('can:admin_rights');

        // Удалить пользователя
        Route::get('/admin/users_control/detele/{user_id}', 'AdminController@user_delete')->name('user_delete')->middleware('can:admin_rights');

        // Подтвердить Учителя(перевод из студентов)
        Route::get('/admin/users_control/edit/{user_id}/confirm', 'AdminController@teacher_apply')->name('teacher_apply')->middleware('can:admin_rights');

    // Управление группами
    Route::get('groups', 'GroupsController@index')->name('groups_controll')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        // Добавить группу
        Route::get('groups/add_group', 'GroupsController@add_group')->name('add_group')->middleware(['can:admin_rights' || 'can:teacher_rights']);
            // Автокомплит студентов
            Route::post('/autocomplete/fetch', 'GroupsController@fetch')->name('autocomplete.fetch')->middleware(['can:admin_rights' || 'can:teacher_rights']);
            // Применить добавление группы
            Route::post('groups/add_group/apply', 'GroupsController@add_group_apply')->name('add_group_apply')->middleware(['can:admin_rights' || 'can:teacher_rights']);

        // Удалить группу
        Route::get('groups/delete_group/{group_id}', 'GroupsController@delete_group')->name('delete_group')->middleware(['can:admin_rights' || 'can:teacher_rights']);

        // Изменить группу
        Route::get('groups/edit_group/{group_id}', 'GroupsController@edit_group')->name('edit_group')->middleware(['can:admin_rights' || 'can:teacher_rights']);
            // Применить изменения группы
            Route::post('groups/edit_group/{group_id}/apply', 'GroupsController@apply_edit_group')->name('apply_edit_group')->middleware(['can:admin_rights' || 'can:teacher_rights']);


//////////

// Студент
    // Индекс Студента
    Route::get('/student', 'StudentController@index')->name('student_panel')->middleware('can:student_rights');
    // Личная информация студента
    Route::get('/student/information', 'StudentController@student_information')->name('student_information')->middleware('can:student_rights');
    // Применить изменения студента
    Route::post('/student/information/apply', 'StudentController@student_information_apply')->name('student_information_apply')->middleware('can:student_rights');
    // Изменение пароля
    Route::post('/student/information/change_password', 'StudentController@student_information_change_password')->name('student_information_change_password')->middleware('can:student_rights');
    // Тесты студента
    Route::get('/student/tests', 'StudentController@student_tests')->name('student_tests')->middleware('can:student_rights');
//////////

// Учитель
    // Индекс Учителя
    Route::get('/teacher', 'TeacherController@index')->name('teacher_panel')->middleware('can:teacher_rights');
        // Личная информация учителя
        Route::get('/teacher/information', 'TeacherController@teacher_information')->name('teacher_information')->middleware('can:teacher_rights');

    // Управление студентами (АДМИН + УЧИТЕЛЬ)
    Route::get('/students_controll', 'StudentController@students_controll')->name('students_controll')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        // Редактирование студента
        Route::get('/students_controll/{student_id}', 'StudentController@students_controll_edit')->name('students_controll_edit')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        // Применитть редактироавние
        Route::post('/students_controll/{student_id}/apply', 'StudentController@students_controll_apply')->name('students_controll_apply')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        // Загрузить студентов - страница АДМИН
        Route::get('/import_students', 'StudentController@import_students')->name('import_students')->middleware('can:admin_rights');
        // Загрузить POST Запрос
        Route::post('/import_students/apply', 'StudentController@import_students_apply')->name('import_students_apply')->middleware('can:admin_rights');

    // Присвоеные студенты.
    Route::get('/assigned_students', 'StudentController@assigned_students')->name('assigned_students')->middleware('can:teacher_rights');
        // Пройденые тесты студентом
        Route::get('/assigned_students/{student_id}/completed_tests', 'StudentController@completed_tests')->name('completed_tests')->middleware('can:teacher_rights');
//////////


// Курсы
    // Управление Курсами (АДМИН + УЧИТЕЛЬ)
    Route::get('/courses_controll', 'CoursesController@index')->name('courses_controll')->middleware('can:admin_rights');
        // Создание Курса
        Route::get('/courses_controll/new_course', 'CoursesController@new_course')->name('new_course')->middleware('can:admin_rights');
        // Создание Курса POST
        Route::post('/courses_controll/new_course/create', 'CoursesController@create_course')->name('create_course')->middleware('can:admin_rights');

//////////

// Тесты
    // Управление Тестами (АДМИН + УЧИТЕЛЬ)
    Route::get('/tests_controll', 'TestsController@index')->name('tests_controll')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        // Создание Теста
        Route::get('/tests_controll/new_test', 'TestsController@new_test')->name('new_test')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        // Создание Теста POST
        Route::post('/tests_controll/new_test/create', 'TestsController@create_test')->name('create_test')->middleware(['can:admin_rights' || 'can:teacher_rights']);
            // Редактирование теста
            Route::get('/tests_controll/{test_id}/edit', 'TestsController@edit_test')->name('edit_test')->middleware(['can:admin_rights' || 'can:teacher_rights']);
            // Применение редатирование теста POST
            Route::post('/tests_controll/{test_id}/edit_apply', 'TestsController@edit_test_apply')->name('edit_test_apply')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        // Создание Обычного Теста POST
        Route::get('/tests_controll/new_simple_test', 'TestsController@new_simple_test')->name('new_simple_test')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        // Создание Обычного Теста POST
        Route::post('/tests_controll/new_simple_test/create', 'TestsController@create_simple_test')->name('create_simple_test')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        //Просмотр обычного теста
        Route::get('/tests_controll/view_test/{test_id}', 'TestsController@view_simple_test')->name('view_simple_test')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        //Просмотр теста
        Route::get('/tests_controll/view_sort/{test_id}', 'TestsController@view_test')->name('view_test')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        //Отрпавить тест
        Route::post('/tests_controll/view_test/{test_id}/submit', 'TestsController@test_submit')->name('test_submit')->middleware(['can:admin_rights' || 'can:teacher_rights']);
        // Drag and drop test
        Route::get('/tests_controll/view_sort/{test_id}', 'TestsController@view_sort')->name('view_sort')->middleware(['can:admin_rights' || 'can:teacher_rights']);

//////////



