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

    Route::prefix('course')->group(function () {
        // Просмотр курса
        Route::get('/{course_id}/{tab?}', 'HomePageController@view_course')->where(['course_id' => '[0-9]+', 'tab' => 'teachers|program|faq'])->name('view_course')->middleware('auth');//Убрать auth;
        // Просмотр урока курса
        Route::get('/{course_id}/lesson/{lesson_id}/{tab?}', 'HomePageController@view_lesson')->where(['course_id' => '[0-9]+', 'lesson_id' => '[0-9]+', 'tab' => 'video|model|protocol|test'])->name('view_lesson')->middleware('auth');//Убрать auth;
        // Отправка курса
        Route::post('/{course_id}/lesson/{lesson_id}/send_test/{test_id}', 'HomePageController@send_test')->name('send_test')->middleware('auth');//Убрать auth;
        // Просмотр курса
        Route::get('/{course_id}/test_number/{test_id}/user/{user_id}', 'HomePageController@view_test_result')->name('view_test_result')->middleware('auth');//Убрать auth;
    });

// Авторизация
    Auth::routes(['register' => false]);
    // Логаут
    Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth');

// Авторизация через соц сети
    Route::prefix('login')->group(function () {
        //Логин или регистрация
        Route::get('/{provider}/{signup?}', 'Auth\SocialiteController@redirect')->where(['provider' => 'google|facebook', 'signup' => 'signup'])->name('login.social')->middleware('auth');
        //Колбэк от соц сети
        Route::get('/{provider}/callback', 'Auth\SocialiteController@callback')->where('provider','google|facebook')->middleware('auth');
        // Выбор роли при регистрации через соц сети
        Route::get('/role/{user_id}/{student_id}', 'Auth\SocialiteController@role')->name('login.role')->middleware('auth');
        // Задание роли
        Route::post('/role/{user_id}/{student_id}/set', 'Auth\SocialiteController@setRole')->name('login.setrole')->middleware('auth');
    });

// Админка
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth','role:admin,teacher,student');

// Teacher profile
    Route::get('/teacher_courses', 'TeacherController@teacherCourses')->name('teacher.courses')->middleware('auth','role:admin,teacher');
    Route::prefix('teacher')->group(function () {
        Route::get('/profile', 'TeacherController@teacherProfile')->name('teacher.profile')->middleware('auth','role:admin,teacher');
        Route::get('/setting', 'TeacherController@teacherSetting')->name('teacher.setting')->middleware('auth','role:admin,teacher');
    });

// Админ
    Route::prefix('admin')->group(function () {
        // Индекс Админа
        Route::get('/', 'AdminController@index')->name('admin_panel')->middleware('auth','role:admin');
        // Управление пользователями
        Route::get('/users_control', 'AdminController@users_controll')->name('users_controll')->middleware('auth','role:admin');
        // Изменить пользователя
        Route::get('/users_control/edit/{user_id}', 'AdminController@user_edit')->name('user_edit')->middleware('auth','role:admin');
            // Применить изменения пользователя
            Route::post('/users_control/edit/{user_id}/apply', 'AdminController@user_edit_apply')->name('user_edit_apply')->middleware('auth','role:admin');
        // Удалить пользователя
        Route::get('/users_control/detele/{user_id}', 'AdminController@user_delete')->name('user_delete')->middleware('auth','role:admin');
        // Подтвердить Учителя(перевод из студентов)
        Route::get('/users_control/edit/{user_id}/confirm', 'AdminController@teacher_apply')->name('teacher_apply')->middleware('auth','role:admin');
    });

    Route::prefix('groups')->group(function () {
        // Управление группами
        Route::get('/', 'GroupsController@index')->name('groups_controll')->middleware('auth','role:admin,teacher');
        // Добавить группу
        Route::get('/add_group', 'GroupsController@add_group')->name('add_group')->middleware('auth','role:admin,teacher');
            // Применить добавление группы
            Route::post('groups/add_group/apply', 'GroupsController@add_group_apply')->name('add_group_apply')->middleware('auth','role:admin,teacher');
        // Удалить группу
        Route::get('/delete_group/{group_id}', 'GroupsController@delete_group')->name('delete_group')->middleware('auth','role:admin,teacher');
        // Изменить группу
        Route::get('/edit_group/{group_id}', 'GroupsController@edit_group')->name('edit_group')->middleware('auth','role:admin,teacher');
            // Применить изменения группы
            Route::post('/edit_group/{group_id}/apply', 'GroupsController@apply_edit_group')->name('apply_edit_group')->middleware('auth','role:admin,teacher');
            //Изменение названия группы
            Route::post('/edit_group/name_change', 'GroupsController@changeGroupName')->name('edit_group.name_change')->middleware('auth','role:admin,teacher');
            //Вернуть старое(не перезаписанное пока) название группы(из БД)
            Route::post('/edit_group/name_change_discard', 'GroupsController@discardGroupNameChanges')->name('edit_group.name_change_discard')->middleware('auth','role:admin,teacher');
    });

        // Автокомплит студентов
        Route::post('/autocomplete/fetch', 'GroupsController@fetch')->name('autocomplete.fetch')->middleware('auth','role:admin,teacher');
        // проверка наличия студента в БД
        Route::post('/autocomplete/fetchСheck', 'GroupsController@fetchCheck')->name('autocomplete.fetch.check')->middleware('auth','role:admin,teacher');

// Студент
    Route::prefix('student')->group(function () {
        // Индекс Студента
        Route::get('/', 'StudentController@index')->name('student_panel')->middleware('auth','role:student');
        //Профиль студента
        Route::get('/profile', 'HomePageController@student_profile')->name('student_profile')->middleware('auth','role:student');
        // Личная информация студента
        Route::get('/information', 'StudentController@student_information' )->name('student_information')->middleware('auth','role:student');
        // Применить изменения студента
        Route::post('/information/apply', 'StudentController@student_information_apply')->name('student_information_apply')->middleware('auth','role:student,teacher');
        // Применить изменения описания студента
        Route::post('/descr/apply', 'StudentController@student_descr_apply')->name('student_descr_apply')->middleware('auth','role:student,teacher');
        // Изменение пароля
        Route::post('/information/change_password', 'StudentController@student_information_change_password')->name('student_information_change_password')->middleware('auth','role:student');
        // Тесты студента
        Route::get('/tests', 'StudentController@student_tests')->name('student_tests')->middleware('auth','role:student');
        // Все курсы
        Route::get('/courses/all', 'HomePageController@student_courses_main')->name('student_courses_main')->middleware('auth','role:student');
        // Курсы в процессе изучения
        Route::get('/courses/process', 'HomePageController@student_courses')->name('student_courses')->middleware('auth','role:student');
        // Успешность в процессе изучения курса
        Route::get('/courses/{course_id}/success_for_student/{student_id}', 'HomePageController@success_for_student')->name('success_for_student')->middleware('auth','role:student');
        // Завершенные курсы
        Route::get('/courses/ended', 'HomePageController@student_courses_ended')->name('student_courses_ended')->middleware('auth','role:student');
    });
//////////

// Учитель
    Route::prefix('teacher')->group(function () {
        // Индекс Учителя
        Route::get('/', 'TeacherController@index')->name('teacher_panel')->middleware('auth','role:teacher');
        // Личная информация учителя
        Route::get('/information', 'TeacherController@teacher_information')->name('teacher_information')->middleware('auth','role:teacher');
        // Применить изменения учителя
        Route::post('/information/apply', 'TeacherController@teacher_information_apply')->name('teacher_information_apply')->middleware('auth','role:teacher');
        // Применить изменения описания учителя
        Route::post('/descr/apply', 'TeacherController@teacher_descr_apply')->name('teacher_descr_apply')->middleware('auth','role:teacher');
        // Изменение пароля
        Route::post('/information/change_password', 'TeacherController@teacher_information_change_password')->name('teacher_information_change_password')->middleware('auth','role:teacher');
    });

    // Управление студентами (АДМИН + УЧИТЕЛЬ)
    Route::prefix('students_controll')->group(function () {

        Route::get('/', 'StudentController@students_controll')->name('students_controll')->middleware('auth','role:admin,teacher');
        // Редактирование студента
        Route::get('/{student_id}', 'StudentController@students_controll_edit')->name('students_controll_edit')->middleware('auth','role:admin,teacher');
        // Удаление студента
        Route::get('/{student_id}/delete', 'StudentController@students_controll_delete')->name('students_controll_delete')->middleware('auth','role:admin,teacher');
        // Применитть редактироавние
        Route::post('/{student_id}/apply', 'StudentController@students_controll_apply')->name('students_controll_apply')->middleware('auth','role:admin,teacher');
    });

        // Загрузить студентов - страница АДМИН
        Route::get('/import_students', 'StudentController@import_students')->name('import_students')->middleware('auth','role:admin,teacher');
        // Загрузить POST Запрос
        Route::post('/import_students/apply', 'StudentController@import_students_apply')->name('import_students_apply')->middleware('auth','role:admin');
        // Успеваемость студента
        Route::get('/students_success/{student_id}', 'StudentController@students_success')->name('students_success')->middleware('auth','role:admin,teacher');

    Route::prefix('assigned_students')->group(function () {
        // Присвоеные студенты.
        Route::get('/', 'StudentController@assigned_students')->name('assigned_students')->middleware('auth','role:teacher');
        // Пройденые тесты студентом
        Route::get('/{student_id}/completed_tests', 'StudentController@completed_tests')->name('completed_tests')->middleware('auth','role:teacher');
    });
//////////


// Курсы

    // Управление Курсами (АДМИН + УЧИТЕЛЬ)

    Route::prefix('courses_controll')->group(function () {

            Route::get('/', 'CoursesController@index')->name('courses_controll')->middleware('auth','role:admin');
                // Создание Курса
                Route::get('/new_course', 'CoursesController@new_course')->name('new_course')->middleware('auth','role:admin');
                // Создание Курса POST
                Route::post('/new_course/create', 'CoursesController@create_course')->name('create_course')->middleware('auth','role:admin');
            // Редактирование курса
            Route::get('/edit_course/{course_id}', 'CoursesController@edit_course')->name('edit_course')->middleware('auth','role:admin');
                // Редактирование курса POST
                Route::post('/edit_course/{course_id}/apply', 'CoursesController@edit_course_apply')->name('edit_course_apply')->middleware('auth','role:admin');
                    // Удаление фото
                    Route::get('/edit_course/{course_id}/delete_photo', 'CoursesController@delete_photo')->name('delete_photo')->middleware('auth','role:admin');
                    // Редактирование курса - Удаление учителя - AJAX
                    Route::post('/edit_course/delete_teacher', 'CoursesController@ajax_remove_teacher')->name('ajax_remove_teacher')->middleware('auth','role:admin,teacher');
    
                // Редактировать "Про Этот Курс"
                Route::get('/edit_course/{course_id}/edit_about', 'CoursesController@edit_about')->name('edit_about')->middleware('auth','role:admin');
                    // Применить редактирование
                    Route::post('/edit_course/{course_id}/edit_about/apply', 'CoursesController@edit_about_apply')->name('edit_about_apply')->middleware('auth','role:admin');
                // Добавить Занятие
                Route::get('/edit_course/{course_id}/add_lesson', 'CoursesController@add_lesson')->name('add_lesson')->middleware('auth','role:admin');
                    // Добавить Занятие POST
                    Route::post('/edit_course/{course_id}/add_lesson/apply', 'CoursesController@add_lesson_apply')->name('add_lesson_apply')->middleware('auth','role:admin');
                    // Добавить тест к занятию
                    Route::get('/edit_course/{course_id}/add_lesson_test', 'CoursesController@addLessonRedirect')->name('add_lesson_redirect')->middleware('auth','role:admin');
    
                    // Добавить тест (POST)
                    Route::post('/edit_course/{course_id}/add_lesson_test/apply')->name('add_lesson_test_apply')->middleware('auth','role:admin');
    
                // Редактировать занятие
                Route::get('/edit_course/{course_id}/edit_lesson/{lesson_id}', 'CoursesController@edit_lesson')->name('edit_lesson')->middleware('auth','role:admin');
                    // Редактировать занияте POST
                    Route::post('/edit_course/{course_id}/edit_lesson/{lesson_id}/edit_apply', 'CoursesController@edit_lesson_apply')->name('edit_lesson_apply')->middleware('auth','role:admin');
    
                    // Добавить тест к занятию
                    Route::get('/edit_course/{course_id}/lesson/{lesson_id}/add_lesson_edit_redirect', 'CoursesController@add_lesson_edit_redirect')->name('add_lesson_edit_redirect')->middleware('auth','role:admin');
    
                // Удалить занятие
                Route::get('/edit_course/{course_id}/edit_lesson/{lesson_id}/delete', 'CoursesController@delete_lesson')->name('delete_lesson')->middleware('auth','role:admin');
    
                /// Добавить Вопрос
                Route::get('/edit_course/{course_id}/add_question', 'CoursesController@add_question')->name('add_question')->middleware('auth','role:admin');
                    // Добавить Вопрос POST
                    Route::post('/edit_course/{course_id}/add_question/apply', 'CoursesController@add_question_apply')->name('add_question_apply')->middleware('auth','role:admin');
                // Редактировать вопрос
                Route::get('/edit_course/{course_id}/edit_question', 'CoursesController@edit_question')->name('edit_question')->middleware('auth','role:admin');
                    // Редактировать вопрос POST
                    Route::post('/edit_course/{course_id}/edit_question/apply', 'CoursesController@edit_question_apply')->name('edit_question_apply')->middleware('auth','role:admin');
    
                    // Удалить вопрос
                    Route::get('/test/delete_question/', 'CoursesController@delete_question')->name('delete_question')->middleware('auth','role:admin');
    
                // Удалить препода с курса
                Route::get('/edit_course/{course_id}/delete_teacher/{teacher_id}', 'CoursesController@delete_teacher_course')->name('delete_teacher')->middleware('auth','role:admin');
            // Удаление курса
            Route::get('/{course_id}/delete', 'CoursesController@delete_course')->name('delete_course')->middleware('auth','role:admin');
    });

    //Route::get('', 'CoursesController@index')->name(')->middleware('auth','role:admin');


        // Все курсы
        Route::get('/all_courses', 'CoursesController@all_courses')->name('all_courses')->middleware('auth');
        // Добавление в популярные
        Route::post('/popular_course', 'CoursesController@popular_course')->name('popular_course')->middleware('auth','role:admin');
//////////

// Тесты

    Route::prefix('tests_controll')->group(function () {
    // Новое создание тестов
        // Создание Теста
        Route::get('/new_test_info', 'TestsController@new_test_info')->name('new_test_info')->middleware('auth','role:admin,teacher');

            // Создание Теста POST
            Route::post('/new_test_info/create', 'TestsController@create_new_test_info')->name('create_new_test_info')->middleware('auth','role:admin,teacher');

            // Удаление Теста
            Route::get('/new_test_info/{test_info_id}/delete', 'TestsController@delete_test')->name('delete_test')->middleware('auth','role:admin,teacher');

        // Выбор типа вопроса
        Route::get('/new_test_info/{test_info_id}/question_type', 'TestsController@question_type')->name('question_type')->middleware('auth','role:admin,teacher');
            // Выбор типа вопроса POST
            Route::post('/new_test_info/{test_info_id}/question_type_submit', 'TestsController@question_type_submit')->name('question_type_submit')->middleware('auth','role:admin,teacher');

            //----- Типы вопросов -----//
            // Добавление вопроса "Множественный выбор" (Страница)
            Route::get('/new_test_info/{test_info_id}/multiple_choice', 'TestsController@multiple_choice')->name('multiple_choice')->middleware('auth','role:admin,teacher');
                // Сохранить вопрос "Множественный выбор" (POST)
                Route::post('/new_test_info/{test_info_id}/multiple_choice/create', 'TestsController@create_multiple_choice')->name('create_multiple_choice')->middleware('auth','role:admin,teacher');
                // Сохранить и редирект на редактирование
                //Route::post('/new_test_info/{test_info_id}/multiple_choice/create_redirect', 'TestsController@create_redirect_multiple_choice')->name('create_redirect_multiple_choice')->middleware('auth','role:admin,teacher');

            // Добавление вопроса "Верно\Не верно" (Страница)
            Route::get('/new_test_info/{test_info_id}/true_false', 'TestsController@true_false')->name('true_false')->middleware('auth','role:admin,teacher');
                // Сохранить вопрос "Верно\Не верно" (POST)
                Route::post('/new_test_info/{test_info_id}/true_false/create', 'TestsController@create_true_false')->name('create_true_false')->middleware('auth','role:admin,teacher');

            // Добавление вопроса "Краткий ответ" (Страница)
            Route::get('/new_test_info/{test_info_id}/short_answer', 'TestsController@short_answer')->name('short_answer')->middleware('auth','role:admin,teacher');
                // Сохранить вопрос "Краткий ответ" (POST)
                Route::post('/new_test_info/{test_info_id}/short_answer/create', 'TestsController@create_short_answer')->name('create_short_answer')->middleware('auth','role:admin,teacher');

            // Добавление вопроса "Перетаскивание в тексте" (Страница)
            Route::get('/new_test_info/{test_info_id}/drag_drop', 'TestsController@drag_drop')->name('drag_drop')->middleware('auth','role:admin,teacher');
                // Сохранить вопрос "Перетаскивание в тексте" (POST)
                Route::post('/new_test_info/{test_info_id}/drag_drop/create', 'TestsController@create_drag_drop')->name('create_drag_drop')->middleware('auth','role:admin,teacher');

                // Редактировать вопрос.
            //----- Типы вопросов -----//
        // Просмотра теста и вопросов\ответов
        Route::get('/new_test_info/{test_info_id}/view', 'TestsController@view_test_info_questions')->name('view_test_info_questions')->middleware('auth','role:admin,teacher');

            // Редактировать Вопрос
                Route::get('/new_test_info/{test_info_id}/view/{test_question_id}/edit', 'TestsController@edit_test_question')->name('edit_test_question')->middleware('auth','role:admin,teacher');

            // Редактировать Вопрос POST
                Route::post('/new_test_info/{test_info_id}/view/{test_question_id}/edit_apply', 'TestsController@edit_test_question_apply')->name('edit_test_question_apply')->middleware('auth','role:admin,teacher');

            // Удалить Вопрос
                Route::get('/new_test_info/{test_info_id}/view/{test_question_id}/edit_delete', 'TestsController@edit_test_question_delete')->name('edit_test_question_delete')->middleware('auth','role:admin,teacher');

            // Обновить
            Route::post('/new_test_info/{test_info_id}/update_info', 'TestsController@update_test_info_questions')->name('update_test_info_questions')->middleware('auth','role:admin,teacher');

            // Удалить
            Route::get('/new_test_info/{test_info_id}/delete_question/{question_id}', 'TestsController@delete_test_question')->name('delete_test_question')->middleware('auth','role:admin,teacher');

    // Управление Тестами (АДМИН + УЧИТЕЛЬ)
    Route::get('/', 'TestsController@index')->name('tests_controll')->middleware('auth','role:admin,teacher');
        // Создание Теста
        Route::get('/new_test', 'TestsController@new_test')->name('new_test')->middleware('auth','role:admin,teacher');
        // Создание Теста POST
        Route::post('/new_test/create', 'TestsController@create_test')->name('create_test')->middleware('auth','role:admin,teacher');
            // Редактирование теста
            Route::get('/{test_id}/edit', 'TestsController@edit_test')->name('edit_test')->middleware('auth','role:admin,teacher');
            // Применение редатирование теста POST
            Route::post('/{test_id}/edit_apply', 'TestsController@edit_test_apply')->name('edit_test_apply')->middleware('auth','role:admin,teacher');
        // Создание Обычного Теста POST
        Route::get('/new_simple_test', 'TestsController@new_simple_test')->name('new_simple_test')->middleware('auth','role:admin,teacher');
        // Создание Обычного Теста POST
        Route::post('/new_simple_test/create', 'TestsController@create_simple_test')->name('create_simple_test')->middleware('auth','role:admin,teacher');
        //Просмотр обычного теста
        Route::get('/view_test/{test_id}', 'TestsController@view_simple_test')->name('view_simple_test')->middleware('auth','role:admin,teacher');
        //Просмотр теста
        Route::get('/view_sort/{test_id}', 'TestsController@view_test')->name('view_test')->middleware('auth','role:admin,teacher');
        //Отрпавить тест
        Route::post('/view_test/{test_id}/submit', 'TestsController@test_submit')->name('test_submit')->middleware('auth','role:admin,teacher');
        // Drag and drop test
        Route::get('/view_sort/{test_id}', 'TestsController@view_sort')->name('view_sort')->middleware('auth','role:admin,teacher');
    });

//Протоколы
    // Управление протоколами
    Route::post('protocol', 'ProtocolController@store')->name('protocol.store')->middleware('auth');
    Route::get('protocol/course/{course_id}/lesson/{lesson_id}/user/{user_id}', 'ProtocolController@show')->name('protocol.show')->middleware('auth');
