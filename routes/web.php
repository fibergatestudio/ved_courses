<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Главная
    Route::get('/', 'HomePageController@welcome')->name('main');

// О проекте
    Route::get('/about', 'HomePageController@welcome')->name('about');

// Симулятор
    Route::get('/simulator', 'HomePageController@simulator')->name('simulator');

// Тестовые роуты для просмотра вьюх
    Route::get('/test_a', 'HomePageController@test_a')->name('test_a');
    Route::get('/test_b', 'HomePageController@test_b')->name('test_b');
    Route::get('/test_c', 'HomePageController@test_c')->name('test_c');

// Окно запроса регистрации/автоизации при просмотре уроков
    Route::get('/guest', 'HomePageController@guest')->name('guest');

// Просмотр курса
    Route::get('/course/{course_id}/{tab?}', 'HomePageController@view_course')->where(['course_id' => '[0-9]+', 'tab' => 'teachers|program|faq'])->name('view_course');
    // Просмотр урока курса
    Route::get('/course/{course_id}/lesson/{lesson_id}/{tab?}', 'HomePageController@view_lesson')->where(['course_id' => '[0-9]+', 'lesson_id' => '[0-9]+', 'tab' => 'video|model|protocol|test'])->name('view_lesson');

    // Отправка курса
    Route::post('/course/{course_id}/lesson/{lesson_id}/send_test/{test_id}', 'HomePageController@send_test')->name('send_test');

// Авторизация
    Auth::routes();
    // Логаут
    Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth');

// Авторизация через соц сети
    //Логин или регистрация
    Route::get('/login/{provider}/{signup?}', 'Auth\SocialiteController@redirect')->where(['provider' => 'google|facebook', 'signup' => 'signup'])->name('login.social');
    //Колбэк от соц сети
    Route::get('/login/{provider}/callback', 'Auth\SocialiteController@callback')->where('provider','google|facebook');
    // Выбор роли при регистрации через соц сети
    Route::get('/login/role/{user_id}/{student_id}', 'Auth\SocialiteController@role')->name('login.role');
    // Задание роли
    Route::post('/login/role/{user_id}/{student_id}/set', 'Auth\SocialiteController@setRole')->name('login.setrole');

// Админка
    Route::get('/home', 'HomeController@index')->name('home');

// Teacher profile
    Route::get('/teacher_courses', 'TeacherController@teacherCourses')->name('teacher.courses')->middleware('auth');
    Route::get('/teacher/profile', 'TeacherController@teacherProfile')->name('teacher.profile')->middleware('auth');
    Route::get('/teacher/setting', 'TeacherController@teacherSetting')->name('teacher.setting')->middleware('auth');

// Админ

    // Индекс Админа
    Route::get('/admin', 'AdminController@index')->name('admin_panel')->middleware(['auth','can:admin_rights']);

    // Управление пользователями
    Route::get('/admin/users_control', 'AdminController@users_controll')->name('users_controll')->middleware(['auth','can:admin_rights']);
        // Изменить пользователя
        Route::get('/admin/users_control/edit/{user_id}', 'AdminController@user_edit')->name('user_edit')->middleware(['auth','can:admin_rights']);
            // Применить изменения пользователя
            Route::post('/admin/users_control/edit/{user_id}/apply', 'AdminController@user_edit_apply')->name('user_edit_apply')->middleware(['auth','can:admin_rights']);

        // Удалить пользователя
        Route::get('/admin/users_control/detele/{user_id}', 'AdminController@user_delete')->name('user_delete')->middleware(['auth','can:admin_rights']);

        // Подтвердить Учителя(перевод из студентов)
        Route::get('/admin/users_control/edit/{user_id}/confirm', 'AdminController@teacher_apply')->name('teacher_apply')->middleware(['auth','can:admin_rights']);

    // Управление группами
    Route::get('groups', 'GroupsController@index')->name('groups_controll')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        // Добавить группу
        Route::get('groups/add_group', 'GroupsController@add_group')->name('add_group')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
            // Автокомплит студентов
            Route::get('/autocomplete/fetch', 'GroupsController@fetch')->name('autocomplete.fetch')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
            // Аджакс проверка
            Route::get('/autocomplete/fetchСheck', 'GroupsController@fetchCheck')->name('autocomplete.fetch.check')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
            // Применить добавление группы
            Route::post('groups/add_group/apply', 'GroupsController@add_group_apply')->name('add_group_apply')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

        // Удалить группу
        Route::get('groups/delete_group/{group_id}', 'GroupsController@delete_group')->name('delete_group')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

        // Изменить группу
        Route::get('groups/edit_group/{group_id}', 'GroupsController@edit_group')->name('edit_group')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
            // Применить изменения группы
            Route::post('groups/edit_group/{group_id}/apply', 'GroupsController@apply_edit_group')->name('apply_edit_group')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);


//////////

// Студент
    // Индекс Студента
    Route::get('/student', 'StudentController@index')->name('student_panel')->middleware(['auth','can:student_rights']);
    //Профиль студента
    Route::get('/student/profile', 'HomePageController@student_profile')->name('student_profile')->middleware(['auth','can:student_rights']);
    // Личная информация студента
    Route::get('/student/information', 'StudentController@student_information' )->name('student_information')->middleware(['auth', 'can:student_rights']);
    // Применить изменения студента
    Route::post('/student/information/apply', 'StudentController@student_information_apply')->name('student_information_apply')->middleware(['auth','can:student_rights']);
    // Применить изменения описания студента
    Route::post('/student/descr/apply', 'StudentController@student_descr_apply')->name('student_descr_apply')->middleware(['auth','can:student_rights']);
    // Изменение пароля
    Route::post('/student/information/change_password', 'StudentController@student_information_change_password')->name('student_information_change_password')->middleware(['auth','can:student_rights']);
    // Тесты студента
    Route::get('/student/tests', 'StudentController@student_tests')->name('student_tests')->middleware(['auth','can:student_rights']);
    // Все курсы
    Route::get('/student/courses/all', 'HomePageController@student_courses_main')->name('student_courses_main')->middleware(['auth','can:student_rights']);
    // Курсы в процессе изучения
    Route::get('/student/courses/process', 'HomePageController@student_courses')->name('student_courses')->middleware(['auth','can:student_rights']);
    // Завершенные курсы
    Route::get('/student/courses/ended', 'HomePageController@student_courses_ended')->name('student_courses_ended')->middleware(['auth','can:student_rights']);
//////////

// Учитель
    // Индекс Учителя
    Route::get('/teacher', 'TeacherController@index')->name('teacher_panel')->middleware(['auth','can:teacher_rights']);
        // Личная информация учителя
        Route::get('/teacher/information', 'TeacherController@teacher_information')->name('teacher_information')->middleware(['auth','can:teacher_rights']);
        // Применить изменения учителя
        Route::post('/teacher/information/apply', 'TeacherController@teacher_information_apply')->name('teacher_information_apply')->middleware(['auth','can:teacher_rights']);
        // Применить изменения описания учителя
        Route::post('/teacher/descr/apply', 'TeacherController@teacher_descr_apply')->name('teacher_descr_apply')->middleware(['auth','can:teacher_rights']);
        // Изменение пароля
        Route::post('/teacher/information/change_password', 'TeacherController@teacher_information_change_password')->name('teacher_information_change_password')->middleware(['auth','can:teacher_rights']);

    // Управление студентами (АДМИН + УЧИТЕЛЬ)
    Route::get('/students_controll', 'StudentController@students_controll')->name('students_controll')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        // Редактирование студента
        Route::get('/students_controll/{student_id}', 'StudentController@students_controll_edit')->name('students_controll_edit')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        // Применитть редактироавние
        Route::post('/students_controll/{student_id}/apply', 'StudentController@students_controll_apply')->name('students_controll_apply')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        // Загрузить студентов - страница АДМИН
        Route::get('/import_students', 'StudentController@import_students')->name('import_students')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        // Загрузить POST Запрос
        Route::post('/import_students/apply', 'StudentController@import_students_apply')->name('import_students_apply')->middleware(['auth','can:admin_rights']);

    // Присвоеные студенты.
    Route::get('/assigned_students', 'StudentController@assigned_students')->name('assigned_students')->middleware('auth','can:teacher_rights');
        // Пройденые тесты студентом
        Route::get('/assigned_students/{student_id}/completed_tests', 'StudentController@completed_tests')->name('completed_tests')->middleware('auth','can:teacher_rights');
//////////


// Курсы
    // Управление Курсами (АДМИН + УЧИТЕЛЬ)
    Route::get('/courses_controll', 'CoursesController@index')->name('courses_controll')->middleware('auth','can:admin_rights');
        // Создание Курса
        Route::get('/courses_controll/new_course', 'CoursesController@new_course')->name('new_course')->middleware('auth','can:admin_rights');
            // Создание Курса POST
            Route::post('/courses_controll/new_course/create', 'CoursesController@create_course')->name('create_course')->middleware('auth','can:admin_rights');
        // Редактирование курса
        Route::get('/courses_controll/edit_course/{course_id}', 'CoursesController@edit_course')->name('edit_course')->middleware('auth','can:admin_rights');
            // Редактирование курса POST
            Route::post('/courses_controll/edit_course/{course_id}/apply', 'CoursesController@edit_course_apply')->name('edit_course_apply')->middleware('auth','can:admin_rights');

            // Редактировать "Про Этот Курс"
            Route::get('/courses_controll/edit_course/{course_id}/edit_about', 'CoursesController@edit_about')->name('edit_about')->middleware('auth','can:admin_rights');
                // Применить редактирование
                Route::post('/courses_controll/edit_course/{course_id}/edit_about/apply', 'CoursesController@edit_about_apply')->name('edit_about_apply')->middleware('auth','can:admin_rights');
            // Добавить Занятие
            Route::get('/courses_controll/edit_course/{course_id}/add_lesson', 'CoursesController@add_lesson')->name('add_lesson')->middleware('auth','can:admin_rights');
                // Добавить Занятие POST
                Route::post('/courses_controll/edit_course/{course_id}/add_lesson/apply', 'CoursesController@add_lesson_apply')->name('add_lesson_apply')->middleware('auth','can:admin_rights');
                // Добавить тест к занятию
                Route::get('/courses_controll/edit_course/{course_id}/add_lesson_test', 'CoursesController@addLessonRedirect')->name('add_lesson_redirect')->middleware('auth','can:admin_rights');
                // Добавить тест (POST)
                Route::post('/courses_controll/edit_course/{course_id}/add_lesson_test/apply')->name('add_lesson_test_apply')->middleware('auth','can:admin_rights');

            /// Добавить Вопрос
            Route::get('/courses_controll/edit_course/{course_id}/add_question', 'CoursesController@add_question')->name('add_question')->middleware('auth','can:admin_rights');
                // Добавить Вопрос POST
                Route::post('/courses_controll/edit_course/{course_id}/add_question/apply', 'CoursesController@add_question_apply')->name('add_question_apply')->middleware('auth','can:admin_rights');

                // Удалить препода с курса
                Route::get('/courses_controll/edit_course/{course_id}/delete_teacher/{teacher_id}', 'CoursesController@delete_teacher_course')->name('delete_teacher')->middleware('auth','can:admin_rights');
        // Удаление курса
        Route::get('/courses_controll/{course_id}/delete', 'CoursesController@delete_course')->name('delete_course')->middleware('auth','can:admin_rights');


//////////

// Тесты

    // Новое создание тестов
        // Создание Теста
        Route::get('/tests_controll/new_test_info', 'TestsController@new_test_info')->name('new_test_info')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

            // Создание Теста POST
            Route::post('/tests_controll/new_test_info/create', 'TestsController@create_new_test_info')->name('create_new_test_info')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

            // Удаление Теста
            Route::get('/tests_controll/new_test_info/{test_info_id}/delete', 'TestsController@delete_test')->name('delete_test')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

        // Выбор типа вопроса
        Route::get('/tests_controll/new_test_info/{test_info_id}/question_type', 'TestsController@question_type')->name('question_type')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
            // Выбор типа вопроса POST
            Route::post('/tests_controll/new_test_info/{test_info_id}/question_type_submit', 'TestsController@question_type_submit')->name('question_type_submit')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

            //----- Типы вопросов -----//
            // Добавление вопроса "Множественный выбор" (Страница)
            Route::get('/tests_controll/new_test_info/{test_info_id}/multiple_choice', 'TestsController@multiple_choice')->name('multiple_choice')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
                // Сохранить вопрос "Множественный выбор" (POST)
                Route::post('/tests_controll/new_test_info/{test_info_id}/multiple_choice/create', 'TestsController@create_multiple_choice')->name('create_multiple_choice')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

            // Добавление вопроса "Верно\Не верно" (Страница)
            Route::get('/tests_controll/new_test_info/{test_info_id}/true_false', 'TestsController@true_false')->name('true_false')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
                // Сохранить вопрос "Верно\Не верно" (POST)
                Route::post('/tests_controll/new_test_info/{test_info_id}/true_false/create', 'TestsController@create_true_false')->name('create_true_false')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

            // Добавление вопроса "Краткий ответ" (Страница)
            Route::get('/tests_controll/new_test_info/{test_info_id}/short_answer', 'TestsController@short_answer')->name('short_answer')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
                // Сохранить вопрос "Краткий ответ" (POST)
                Route::post('/tests_controll/new_test_info/{test_info_id}/short_answer/create', 'TestsController@create_short_answer')->name('create_short_answer')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

            // Добавление вопроса "Перетаскивание в тексте" (Страница)
            Route::get('/tests_controll/new_test_info/{test_info_id}/drag_drop', 'TestsController@drag_drop')->name('drag_drop')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
                // Сохранить вопрос "Перетаскивание в тексте" (POST)
                Route::post('/tests_controll/new_test_info/{test_info_id}/drag_drop/create', 'TestsController@create_drag_drop')->name('create_drag_drop')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

                // Редактировать вопрос.
                

            //----- Типы вопросов -----//




        // Просмотра теста и вопросов\ответов
        Route::get('/tests_controll/new_test_info/{test_info_id}/view', 'TestsController@view_test_info_questions')->name('view_test_info_questions')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
            // Обновить
            Route::post('/tests_controll/new_test_info/{test_info_id}/update_info', 'TestsController@update_test_info_questions')->name('update_test_info_questions')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

            // Удалить
            Route::get('/tests_controll/new_test_info/{test_info_id}/delete_question/{question_id}', 'TestsController@delete_test_question')->name('delete_test_question')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
    //
//



    // Управление Тестами (АДМИН + УЧИТЕЛЬ)
    Route::get('/tests_controll', 'TestsController@index')->name('tests_controll')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        // Создание Теста
        Route::get('/tests_controll/new_test', 'TestsController@new_test')->name('new_test')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        // Создание Теста POST
        Route::post('/tests_controll/new_test/create', 'TestsController@create_test')->name('create_test')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
            // Редактирование теста
            Route::get('/tests_controll/{test_id}/edit', 'TestsController@edit_test')->name('edit_test')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
            // Применение редатирование теста POST
            Route::post('/tests_controll/{test_id}/edit_apply', 'TestsController@edit_test_apply')->name('edit_test_apply')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        // Создание Обычного Теста POST
        Route::get('/tests_controll/new_simple_test', 'TestsController@new_simple_test')->name('new_simple_test')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        // Создание Обычного Теста POST
        Route::post('/tests_controll/new_simple_test/create', 'TestsController@create_simple_test')->name('create_simple_test')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        //Просмотр обычного теста
        Route::get('/tests_controll/view_test/{test_id}', 'TestsController@view_simple_test')->name('view_simple_test')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        //Просмотр теста
        Route::get('/tests_controll/view_sort/{test_id}', 'TestsController@view_test')->name('view_test')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        //Отрпавить тест
        Route::post('/tests_controll/view_test/{test_id}/submit', 'TestsController@test_submit')->name('test_submit')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);
        // Drag and drop test
        Route::get('/tests_controll/view_sort/{test_id}', 'TestsController@view_sort')->name('view_sort')->middleware(['auth','can:admin_rights' || 'can:teacher_rights']);

