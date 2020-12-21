<?php

use App\Http\Middleware\Role;
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
    Route::get('/', 'HomePageController@welcome')->name('main')->middleware('auth');//Убрать auth

// О проекте
    Route::get('/about', 'HomePageController@welcome')->name('about')->middleware('auth');//Убрать auth

// Симулятор
    Route::get('/simulator', 'HomePageController@simulator')->name('simulator')->middleware('auth');//Убрать auth

// Окно запроса регистрации/автоизации при просмотре уроков
    Route::get('/guest', 'HomePageController@guest')->name('guest');

// Просмотр курса
    Route::get('/course/{course_id}/{tab?}', 'HomePageController@view_course')->where(['course_id' => '[0-9]+', 'tab' => 'teachers|program|faq'])->name('view_course')->middleware('auth');//Убрать auth;
    // Просмотр урока курса
    Route::get('/course/{course_id}/lesson/{lesson_id}/{tab?}', 'HomePageController@view_lesson')->where(['course_id' => '[0-9]+', 'lesson_id' => '[0-9]+', 'tab' => 'video|model|protocol|test'])->name('view_lesson')->middleware('auth');//Убрать auth;

    // Отправка курса
    Route::post('/course/{course_id}/lesson/{lesson_id}/send_test/{test_id}', 'HomePageController@send_test')->name('send_test')->middleware('auth');//Убрать auth;

    // Просмотр курса
    Route::get('/course/{course_id}/test_number/{test_id}/user/{user_id}', 'HomePageController@view_test_result')->name('view_test_result')->middleware('auth');//Убрать auth;

// Авторизация
    Auth::routes(['register' => false]);
    // Логаут
    Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth');

// Авторизация через соц сети
    //Логин или регистрация
    Route::get('/login/{provider}/{signup?}', 'Auth\SocialiteController@redirect')->where(['provider' => 'google|facebook', 'signup' => 'signup'])->name('login.social')->middleware('auth');
    //Колбэк от соц сети
    Route::get('/login/{provider}/callback', 'Auth\SocialiteController@callback')->where('provider','google|facebook')->middleware('auth');
    // Выбор роли при регистрации через соц сети
    Route::get('/login/role/{user_id}/{student_id}', 'Auth\SocialiteController@role')->name('login.role')->middleware('auth');
    // Задание роли
    Route::post('/login/role/{user_id}/{student_id}/set', 'Auth\SocialiteController@setRole')->name('login.setrole')->middleware('auth');

// Админка
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth','role:admin,teacher,student');

// Teacher profile
    Route::get('/teacher_courses', 'TeacherController@teacherCourses')->name('teacher.courses')->middleware('auth','role:admin,teacher');
    Route::get('/teacher/profile', 'TeacherController@teacherProfile')->name('teacher.profile')->middleware('auth','role:admin,teacher');
    Route::get('/teacher/setting', 'TeacherController@teacherSetting')->name('teacher.setting')->middleware('auth','role:admin,teacher');

// Админ

    // Индекс Админа
    Route::get('/admin', 'AdminController@index')->name('admin_panel')->middleware('auth','role:admin');

    // Управление пользователями
    Route::get('/admin/users_control', 'AdminController@users_controll')->name('users_controll')->middleware('auth','role:admin');
        // Изменить пользователя
        Route::get('/admin/users_control/edit/{user_id}', 'AdminController@user_edit')->name('user_edit')->middleware('auth','role:admin');
            // Применить изменения пользователя
            Route::post('/admin/users_control/edit/{user_id}/apply', 'AdminController@user_edit_apply')->name('user_edit_apply')->middleware('auth','role:admin');
        // Удалить пользователя
        Route::get('/admin/users_control/detele/{user_id}', 'AdminController@user_delete')->name('user_delete')->middleware('auth','role:admin');

        // Подтвердить Учителя(перевод из студентов)
        Route::get('/admin/users_control/edit/{user_id}/confirm', 'AdminController@teacher_apply')->name('teacher_apply')->middleware('auth','role:admin');

    // Управление группами
    Route::get('groups', 'GroupsController@index')->name('groups_controll')->middleware('auth','role:admin,teacher');
        // Добавить группу
        Route::get('groups/add_group', 'GroupsController@add_group')->name('add_group')->middleware('auth','role:admin,teacher');
            // Автокомплит студентов
            Route::post('/autocomplete/fetch', 'GroupsController@fetch')->name('autocomplete.fetch')->middleware('auth','role:admin,teacher');
            // проверка наличия студента в БД
            Route::post('/autocomplete/fetchСheck', 'GroupsController@fetchCheck')->name('autocomplete.fetch.check')->middleware('auth','role:admin,teacher');
            // Применить добавление группы
            Route::post('groups/add_group/apply', 'GroupsController@add_group_apply')->name('add_group_apply')->middleware('auth','role:admin,teacher');

        // Удалить группу
        Route::get('groups/delete_group/{group_id}', 'GroupsController@delete_group')->name('delete_group')->middleware('auth','role:admin,teacher');

        // Изменить группу
        Route::get('groups/edit_group/{group_id}', 'GroupsController@edit_group')->name('edit_group')->middleware('auth','role:admin,teacher');
            // Применить изменения группы
            Route::post('groups/edit_group/{group_id}/apply', 'GroupsController@apply_edit_group')->name('apply_edit_group')->middleware('auth','role:admin,teacher');
            //Изменение названия группы
            Route::post('/groups/edit_group/name_change', 'GroupsController@changeGroupName')->name('edit_group.name_change')->middleware('auth','role:admin,teacher');
            //Вернуть старое(не перезаписанное пока) название группы(из БД)
            Route::post('/groups/edit_group/name_change_discard', 'GroupsController@discardGroupNameChanges')->name('edit_group.name_change_discard')->middleware('auth','role:admin,teacher');

// Студент
    // Индекс Студента
    Route::get('/student', 'StudentController@index')->name('student_panel')->middleware('auth','role:student');
    //Профиль студента
    Route::get('/student/profile', 'HomePageController@student_profile')->name('student_profile')->middleware('auth','role:student');
    // Личная информация студента
    Route::get('/student/information', 'StudentController@student_information' )->name('student_information')->middleware('auth','role:student');
    // Применить изменения студента
    Route::post('/student/information/apply', 'StudentController@student_information_apply')->name('student_information_apply')->middleware('auth','role:student,teacher');
    // Применить изменения описания студента
    Route::post('/student/descr/apply', 'StudentController@student_descr_apply')->name('student_descr_apply')->middleware('auth','role:student,teacher');
    // Изменение пароля
    Route::post('/student/information/change_password', 'StudentController@student_information_change_password')->name('student_information_change_password')->middleware('auth','role:student');
    // Тесты студента
    Route::get('/student/tests', 'StudentController@student_tests')->name('student_tests')->middleware('auth','role:student');
    // Все курсы
    Route::get('/student/courses/all', 'HomePageController@student_courses_main')->name('student_courses_main')->middleware('auth','role:student');
    // Курсы в процессе изучения
    Route::get('/student/courses/process', 'HomePageController@student_courses')->name('student_courses')->middleware('auth','role:student');
    // Завершенные курсы
    Route::get('/student/courses/ended', 'HomePageController@student_courses_ended')->name('student_courses_ended')->middleware('auth','role:student');
//////////

// Учитель
    // Индекс Учителя
    Route::get('/teacher', 'TeacherController@index')->name('teacher_panel')->middleware('auth','role:teacher');
        // Личная информация учителя
        Route::get('/teacher/information', 'TeacherController@teacher_information')->name('teacher_information')->middleware('auth','role:teacher');
        // Применить изменения учителя
        Route::post('/teacher/information/apply', 'TeacherController@teacher_information_apply')->name('teacher_information_apply')->middleware('auth','role:teacher');
        // Применить изменения описания учителя
        Route::post('/teacher/descr/apply', 'TeacherController@teacher_descr_apply')->name('teacher_descr_apply')->middleware('auth','role:teacher');
        // Изменение пароля
        Route::post('/teacher/information/change_password', 'TeacherController@teacher_information_change_password')->name('teacher_information_change_password')->middleware('auth','role:teacher');

    // Управление студентами (АДМИН + УЧИТЕЛЬ)
    Route::get('/students_controll', 'StudentController@students_controll')->name('students_controll')->middleware('auth','role:admin,teacher');
        // Редактирование студента
        Route::get('/students_controll/{student_id}', 'StudentController@students_controll_edit')->name('students_controll_edit')->middleware('auth','role:admin,teacher');
        // Применитть редактироавние
        Route::post('/students_controll/{student_id}/apply', 'StudentController@students_controll_apply')->name('students_controll_apply')->middleware('auth','role:admin,teacher');
        // Загрузить студентов - страница АДМИН
        Route::get('/import_students', 'StudentController@import_students')->name('import_students')->middleware('auth','role:admin,teacher');
        // Загрузить POST Запрос
        Route::post('/import_students/apply', 'StudentController@import_students_apply')->name('import_students_apply')->middleware('auth','role:admin');
        // Успеваемость студента
        Route::get('/students_success/{student_id}', 'StudentController@students_success')->name('students_success')->middleware('auth','role:admin,teacher');

    // Присвоеные студенты.
    Route::get('/assigned_students', 'StudentController@assigned_students')->name('assigned_students')->middleware('auth','role:teacher');
        // Пройденые тесты студентом
        Route::get('/assigned_students/{student_id}/completed_tests', 'StudentController@completed_tests')->name('completed_tests')->middleware('auth','role:teacher');
//////////


// Курсы
    // Управление Курсами (АДМИН + УЧИТЕЛЬ)
    Route::get('/courses_controll', 'CoursesController@index')->name('courses_controll')->middleware('auth','role:admin');
        // Создание Курса
        Route::get('/courses_controll/new_course', 'CoursesController@new_course')->name('new_course')->middleware('auth','role:admin');
            // Создание Курса POST
            Route::post('/courses_controll/new_course/create', 'CoursesController@create_course')->name('create_course')->middleware('auth','role:admin');
        // Редактирование курса
        Route::get('/courses_controll/edit_course/{course_id}', 'CoursesController@edit_course')->name('edit_course')->middleware('auth','role:admin');
            // Редактирование курса POST
            Route::post('/courses_controll/edit_course/{course_id}/apply', 'CoursesController@edit_course_apply')->name('edit_course_apply')->middleware('auth','role:admin');
                // Удаление фото
                Route::get('/courses_controll/edit_course/{course_id}/delete_photo', 'CoursesController@delete_photo')->name('delete_photo')->middleware('auth','role:admin');
                // Редактирование курса - Удаление учителя - AJAX
                Route::post('/courses_controll/edit_course/delete_teacher', 'CoursesController@ajax_remove_teacher')->name('ajax_remove_teacher')->middleware('auth','role:admin,teacher');

            // Редактировать "Про Этот Курс"
            Route::get('/courses_controll/edit_course/{course_id}/edit_about', 'CoursesController@edit_about')->name('edit_about')->middleware('auth','role:admin');
                // Применить редактирование
                Route::post('/courses_controll/edit_course/{course_id}/edit_about/apply', 'CoursesController@edit_about_apply')->name('edit_about_apply')->middleware('auth','role:admin');
            // Добавить Занятие
            Route::get('/courses_controll/edit_course/{course_id}/add_lesson', 'CoursesController@add_lesson')->name('add_lesson')->middleware('auth','role:admin');
                // Добавить Занятие POST
                Route::post('/courses_controll/edit_course/{course_id}/add_lesson/apply', 'CoursesController@add_lesson_apply')->name('add_lesson_apply')->middleware('auth','role:admin');
                // Добавить тест к занятию
                Route::get('/courses_controll/edit_course/{course_id}/add_lesson_test', 'CoursesController@addLessonRedirect')->name('add_lesson_redirect')->middleware('auth','role:admin');

                // Добавить тест (POST)
                Route::post('/courses_controll/edit_course/{course_id}/add_lesson_test/apply')->name('add_lesson_test_apply')->middleware('auth','role:admin');

            // Редактировать занятие
            Route::get('/courses_controll/edit_course/{course_id}/edit_lesson/{lesson_id}', 'CoursesController@edit_lesson')->name('edit_lesson')->middleware('auth','role:admin');
                // Редактировать занияте POST
                Route::post('/courses_controll/edit_course/{course_id}/edit_lesson/{lesson_id}/edit_apply', 'CoursesController@edit_lesson_apply')->name('edit_lesson_apply')->middleware('auth','role:admin');

                // Добавить тест к занятию
                Route::get('/courses_controll/edit_course/{course_id}/lesson/{lesson_id}/add_lesson_edit_redirect', 'CoursesController@add_lesson_edit_redirect')->name('add_lesson_edit_redirect')->middleware('auth','role:admin');

            // Удалить занятие
            Route::get('/courses_controll/edit_course/{course_id}/edit_lesson/{lesson_id}/delete', 'CoursesController@delete_lesson')->name('delete_lesson')->middleware('auth','role:admin');

            /// Добавить Вопрос
            Route::get('/courses_controll/edit_course/{course_id}/add_question', 'CoursesController@add_question')->name('add_question')->middleware('auth','role:admin');
                // Добавить Вопрос POST
                Route::post('/courses_controll/edit_course/{course_id}/add_question/apply', 'CoursesController@add_question_apply')->name('add_question_apply')->middleware('auth','role:admin');

                // Удалить препода с курса
                Route::get('/courses_controll/edit_course/{course_id}/delete_teacher/{teacher_id}', 'CoursesController@delete_teacher_course')->name('delete_teacher')->middleware('auth','role:admin');
        // Удаление курса
        Route::get('/courses_controll/{course_id}/delete', 'CoursesController@delete_course')->name('delete_course')->middleware('auth','role:admin');


//////////

// Тесты

    // Новое создание тестов
        // Создание Теста
        Route::get('/tests_controll/new_test_info', 'TestsController@new_test_info')->name('new_test_info')->middleware('auth','role:admin,teacher');

            // Создание Теста POST
            Route::post('/tests_controll/new_test_info/create', 'TestsController@create_new_test_info')->name('create_new_test_info')->middleware('auth','role:admin,teacher');

            // Удаление Теста
            Route::get('/tests_controll/new_test_info/{test_info_id}/delete', 'TestsController@delete_test')->name('delete_test')->middleware('auth','role:admin,teacher');

        // Выбор типа вопроса
        Route::get('/tests_controll/new_test_info/{test_info_id}/question_type', 'TestsController@question_type')->name('question_type')->middleware('auth','role:admin,teacher');
            // Выбор типа вопроса POST
            Route::post('/tests_controll/new_test_info/{test_info_id}/question_type_submit', 'TestsController@question_type_submit')->name('question_type_submit')->middleware('auth','role:admin,teacher');

            //----- Типы вопросов -----//
            // Добавление вопроса "Множественный выбор" (Страница)
            Route::get('/tests_controll/new_test_info/{test_info_id}/multiple_choice', 'TestsController@multiple_choice')->name('multiple_choice')->middleware('auth','role:admin,teacher');
                // Сохранить вопрос "Множественный выбор" (POST)
                Route::post('/tests_controll/new_test_info/{test_info_id}/multiple_choice/create', 'TestsController@create_multiple_choice')->name('create_multiple_choice')->middleware('auth','role:admin,teacher');

            // Добавление вопроса "Верно\Не верно" (Страница)
            Route::get('/tests_controll/new_test_info/{test_info_id}/true_false', 'TestsController@true_false')->name('true_false')->middleware('auth','role:admin,teacher');
                // Сохранить вопрос "Верно\Не верно" (POST)
                Route::post('/tests_controll/new_test_info/{test_info_id}/true_false/create', 'TestsController@create_true_false')->name('create_true_false')->middleware('auth','role:admin,teacher');

            // Добавление вопроса "Краткий ответ" (Страница)
            Route::get('/tests_controll/new_test_info/{test_info_id}/short_answer', 'TestsController@short_answer')->name('short_answer')->middleware('auth','role:admin,teacher');
                // Сохранить вопрос "Краткий ответ" (POST)
                Route::post('/tests_controll/new_test_info/{test_info_id}/short_answer/create', 'TestsController@create_short_answer')->name('create_short_answer')->middleware('auth','role:admin,teacher');

            // Добавление вопроса "Перетаскивание в тексте" (Страница)
            Route::get('/tests_controll/new_test_info/{test_info_id}/drag_drop', 'TestsController@drag_drop')->name('drag_drop')->middleware('auth','role:admin,teacher');
                // Сохранить вопрос "Перетаскивание в тексте" (POST)
                Route::post('/tests_controll/new_test_info/{test_info_id}/drag_drop/create', 'TestsController@create_drag_drop')->name('create_drag_drop')->middleware('auth','role:admin,teacher');

                // Редактировать вопрос.


            //----- Типы вопросов -----//




        // Просмотра теста и вопросов\ответов
        Route::get('/tests_controll/new_test_info/{test_info_id}/view', 'TestsController@view_test_info_questions')->name('view_test_info_questions')->middleware('auth','role:admin,teacher');

            // Редактировать Вопрос
                Route::get('/tests_controll/new_test_info/{test_info_id}/view/{test_question_id}/edit', 'TestsController@edit_test_question')->name('edit_test_question')->middleware('auth','role:admin,teacher');

            // Редактировать Вопрос POST
                Route::post('/tests_controll/new_test_info/{test_info_id}/view/{test_question_id}/edit_apply', 'TestsController@edit_test_question_apply')->name('edit_test_question_apply')->middleware('auth','role:admin,teacher');

            // Удалить Вопрос
                Route::get('/tests_controll/new_test_info/{test_info_id}/view/{test_question_id}/edit_delete', 'TestsController@edit_test_question_delete')->name('edit_test_question_delete')->middleware('auth','role:admin,teacher');

            // Обновить
            Route::post('/tests_controll/new_test_info/{test_info_id}/update_info', 'TestsController@update_test_info_questions')->name('update_test_info_questions')->middleware('auth','role:admin,teacher');

            // Удалить
            Route::get('/tests_controll/new_test_info/{test_info_id}/delete_question/{question_id}', 'TestsController@delete_test_question')->name('delete_test_question')->middleware('auth','role:admin,teacher');
    //
//



    // Управление Тестами (АДМИН + УЧИТЕЛЬ)
    Route::get('/tests_controll', 'TestsController@index')->name('tests_controll')->middleware('auth','role:admin,teacher');
        // Создание Теста
        Route::get('/tests_controll/new_test', 'TestsController@new_test')->name('new_test')->middleware('auth','role:admin,teacher');
        // Создание Теста POST
        Route::post('/tests_controll/new_test/create', 'TestsController@create_test')->name('create_test')->middleware('auth','role:admin,teacher');
            // Редактирование теста
            Route::get('/tests_controll/{test_id}/edit', 'TestsController@edit_test')->name('edit_test')->middleware('auth','role:admin,teacher');
            // Применение редатирование теста POST
            Route::post('/tests_controll/{test_id}/edit_apply', 'TestsController@edit_test_apply')->name('edit_test_apply')->middleware('auth','role:admin,teacher');
        // Создание Обычного Теста POST
        Route::get('/tests_controll/new_simple_test', 'TestsController@new_simple_test')->name('new_simple_test')->middleware('auth','role:admin,teacher');
        // Создание Обычного Теста POST
        Route::post('/tests_controll/new_simple_test/create', 'TestsController@create_simple_test')->name('create_simple_test')->middleware('auth','role:admin,teacher');
        //Просмотр обычного теста
        Route::get('/tests_controll/view_test/{test_id}', 'TestsController@view_simple_test')->name('view_simple_test')->middleware('auth','role:admin,teacher');
        //Просмотр теста
        Route::get('/tests_controll/view_sort/{test_id}', 'TestsController@view_test')->name('view_test')->middleware('auth','role:admin,teacher');
        //Отрпавить тест
        Route::post('/tests_controll/view_test/{test_id}/submit', 'TestsController@test_submit')->name('test_submit')->middleware('auth','role:admin,teacher');
        // Drag and drop test
        Route::get('/tests_controll/view_sort/{test_id}', 'TestsController@view_sort')->name('view_sort')->middleware('auth','role:admin,teacher');


//Протоколы
    // Управление протоколами
    Route::resource('protocol', 'ProtocolController')->middleware('auth');
