@extends('layouts.front.front_child')

@section('content')
<div class="container" style="display:none;">
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-3">
            @if(Auth::user()->role == "admin")
                @include('layouts.admin_sidebar')
            @elseif(Auth::user()->role == "teacher")
               @include('layouts.teacher_sidebar', ['status' => Auth::user()->status] )
            @endif
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    {{ __('Создание теста') }} 
                    @if($course_id)
                        - Для курса # {{ $course_id }}
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- <form action="{{ route('create_new_test_info', ['course_id' => $course_id ]) }}" id="test_form" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label>Название Теста</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                        
                        <div id="studentsAdd" class="form-group">
                            <label>Описание Теста</label>
                            <textarea type="text" class="form-control" name="description" value=""></textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Начало Тестирования</label>
                            <input type="text" class="form-control datetimepicker" name="start_date_time"> 
                            <label>Окончание Тестирования</label>
                            <input type="text" class="form-control datetimepicker" name="end_date_time"> 
                            <label>Ограничение времени</label>
                            <input type="number" class="form-control" name="time_limit"> 
                            <label>Когда время заканчивается</label>
                            <select class="form-control" name="when_time_is_up">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Ограничение времени</label>
                            <input type="number" class="form-control" name="passing_score" value="">
                            <label>Разршено попыток</label>
                            <select class="form-control" name="available_attempts">
                                <option>Одна попытка</option>
                                <option>-</option>
                            </select>
                            <label>Метод оценивания</label>
                            <select class="form-control" name="assessment_method">
                                <option>Лучшая оценка</option>
                                <option>Средняя оценка</option>
                                <option>Первая попытка</option>
                                <option>ПОследняя попытка</option>
                            </select>
                        </div>
                        <hr> 


                        <hr>
                        <div class="form-group">
                            <label>Случайный порядок ответов</label>
                            <select class="form-control" name="random_answers_order">
                                <option>Да</option>
                                <option>-</option>
                            </select>
                            <label>Получение результата</label>
                            <select class="form-control" name="getting_result">
                                <option>После отправки всего теста</option>
                                <option>Интерактивный за несколько попыток</option>
                                <option>Адаптивный режим</option>
                                <option>Адаптивный режим(Без штрафных балов)</option>
                                <option>Сразу после ответа</option>
                                <option>Сразу после ответа с пометкой студента уверенности</option>
                                <option>После отправки всего теста</option>
                                <option>После отправки всего теста с пометкой студента уверенности</option>
                                <option>Ручная оценка</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Параметры просмотра</label>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>После попытки</label>
                                        <div> <input type="checkbox" name="1_attempt"><label>Попытка</label> </div>
                                        <div> <input type="checkbox" name="1_right"><label>Правильный ли ответ</label> </div>
                                        <div> <input type="checkbox" name="1_score"><label>Баллы</label> </div>
                                        <div> <input type="checkbox" name="1_overall_comment" checked> <label>Коментарий ко всему тесту</label> </div>
                                        <div> <input type="checkbox" name="1_right_answer" checked> <label>Правильный ответ</label> </div>
                                        <div> <input type="checkbox" name="1_overall_review"><label>Общий отзыв</label></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Позже, пока тест еще открытый</label>
                                        <div> <input type="checkbox" name="2_attempt"><label>Попытка</label> </div>
                                        <div> <input type="checkbox" name="2_right"><label>Правильный ли ответ</label> </div>
                                        <div> <input type="checkbox" name="2_score"><label>Баллы</label> </div>
                                        <div> <input type="checkbox" name="2_overall_comment" checked> <label>Коментарий ко всему тесту</label> </div>
                                        <div> <input type="checkbox" name="2_right_answer" checked> <label>Правильный ответ</label> </div>
                                        <div> <input type="checkbox" name="2_overall_review"><label>Общий отзыв</label></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>После закрытия теста</label>
                                        <div> <input type="checkbox" name="3_attempt" checked><label>Попытка</label> </div>
                                        <div> <input type="checkbox" name="3_right"><label>Правильный ли ответ</label> </div>
                                        <div> <input type="checkbox" name="3_score" checked><label>Баллы</label> </div>
                                        <div> <input type="checkbox" name="3_overall_comment" checked> <label>Коментарий ко всему тесту</label> </div>
                                        <div> <input type="checkbox" name="3_right_answer"> <label>Правильный ответ</label> </div>
                                        <div> <input type="checkbox" name="3_overall_review" checked><label>Общий отзыв</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Фото и имя студента</label>
                            <select class="form-control" name="photo_and_student_name">
                                <option>Без картинки</option>
                                <option>Маленькая картинка</option>
                                <option>Большая картинка</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Разширенный ответ</label>
                            <select class="form-control" name="extended_feedback">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Доступность</label>
                            <select class="form-control" name="availability">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                            <label>Режим работы с группами</label>
                            <select class="form-control" name="operating_mode">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Добавить вопрос</button>
                    </form> -->
                    
                        <a href="{{ route('tests_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>


<body>

    <!-- Burger-menu (begin)-->
    <ul class="menu_title-wrapper">

        <li class="menu_title-inner">
            <div class="menu_burger-clone">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Про ресурс</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Тематичні напрями</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Студент</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link menu_title-linkStudent" href="##">Ім'я викладача</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Панель курсів</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Профіль</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Налаштування</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Вийти</a>
        </li>

    </ul>
    <!-- Burger-menu (end)-->

    <!-- student modal-page (begin) -->
    <div class="bootstrap-restylingStudent modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <ul class="student-menu-wrapper">
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Панель курсів</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Профіль</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Налаштування</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Вийти</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- student modal-page (end) -->

    <!-- deleteBtn modal-page (begin) -->
    <div class="bootstrap-restylingStudent modal fade" id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="deleteMenu-wrapper">

                    <div class="deleteMenu-topImg">
                        <img src="assets/img/basket.png" alt="icon">
                    </div>
                    <div class="deleteMenu-text">
                        Ви точно бажаєте видалити <br> Курс ?
                    </div>
                    <div class="deleteMenu-btn">
                        <a class="flexTable-btn_delete" href="##"><span>Видалити</span></a>
                    </div>
                </div>
                </ul>
            </div>
        </div>
    </div>
    <!-- deleteBtn modal-page (end) -->
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            <!-- sidebar-menu (start) -->

            <div class="sidebar">

                <div class="sidebar-sticky">

                    <div class="sidebar-top_wrapper">
                        <div class="sidebar-top_burger-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <!-- changeling block mobile-btn (start) -->
                        <div class="sidebar-top_mobile-btn">
                            <div class="sidebar-top_mobile-img">
                                <img src="assets/img/teacher-mobileMenu-2.png" alt="icon">
                            </div>
                            <div class="sidebar-top_mobile-name">
                                Управління курсами
                            </div>
                        </div>
                        <!-- changeling block mobile-btn (end) -->

                    </div>
                    @include('layouts.front.includes.admin_sidebar_vrst')

                </div>

            </div>
            <!-- sidebar-menu (end) -->
            <form action="{{ route('create_new_test_info', ['course_id' => $course_id, 'courses_program_id'=>$courses_program_id ]) }}" id="create_test_form" method="POST" >
                @csrf
            <div class="cource-container--mobile">
                <h3 class="courseEdit-title courseControl-title">Створити новий тест</h3>
                    <div class="newTest-block active">
                        <div class="newTest-top active">
                            Загальне
                        </div>
                        <div class="newTest-wrapper show">
                        
                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">
                                        Назва<sup>*</sup>
                                    </div>
                                </div>
                                <div class="courseAdd-inner_right">
                                    <input class="course-faq--input courseAdditional--input" name="name" type="text">
                                </div>
                            </div>
                            
                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">
                                        Опис<sup>*</sup>
                                    </div>
                                </div>
                                <div class="courseAdd-inner_right">
                                        <textarea class="tinyMCE-area" name="description"></textarea>
                                </div>
                            </div>            
                        </div>
                    </div>

                    <div class="newTest-block active">
                        <div class="newTest-top active">
                            Вибір часу
                        </div>
                        <div class="newTest-wrapper show">
                        
                            <div class="newTest-date-inner">
                                <div class="newTest-date-item">Початок
                                </div>
                                <div class="newTest-date-item">
                                    <input type="text" name="start_date_time" class="datepicker form-control date-input-restyling">
                                </div>
                            </div>

                            <div class="newTest-date-inner">
                                <div class="newTest-date-item">Завершити
                                </div>
                                <div class="newTest-date-item">
                                    <input type="text" name="end_date_time" class="datepicker form-control date-input-restyling">                               
                                </div>
                            </div>
                            
                            <!-- <a href="##" class="newTest-saveBtn">
                                <span>
                                    Зберегти
                                </span>
                            </a> -->

                            <div class="newTest-dedline">
                                <div class="newTest-dedline-inner">
                                    Обмеження в часі
                                </div>
                                <div class="newTest-dedline-inner">
                                    <input class="newTest-dedline-input_left" type="number" name="time_limit" placeholder="0">
                                    <input class="newTest-dedline-input_right" type="text" placeholder="хвилин(а)">
                                </div>
                                <div class="newTest-dedline-inner">
                                    <a href="##" class="newTest-saveBtn">
                                        <span>
                                            Зберегти
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="newTest-timeInstruction">
                                <div class="newTest-timeInstruction-inner">
                                    Коли час спливає
                                </div>
                                <div class="newTest-timeInstruction-inner">
                                    <div class="newTest-timeInstruction-wrapper">
                                    <select class="newTest-timeInstruction-select" name="when_time_is_up"> 
                                        <option value="1" selected>Відповіді повинні бути відправлені до завершення часу, інакше вони не зарахуються</option> 
                                        <option value="2" >Опция 2</option>
                                        <option value="3">Опция 3</option>
                                    </select>
                                    <div class="newTest-timeInstruction_arrowBlock"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                
                    <div class="newTest-block active">
                        <div class="newTest-top active">
                            Оцінка
                        </div>
                        <div class="newTest-wrapper show">
                        <div class="newTest-mark-string">
                                <div class="newTest-mark-inner_left">
                                    Прохідний бал
                                </div>
                                <div class="newTest-mark-inner_right">
                                    <input class="newTest-mark-input" type="number" name="passing_score" placeholder="0">
                                </div>
                        </div>
                        <div class="newTest-mark-string">
                            <div class="newTest-mark-inner_left">
                                Дозволено спроб
                            </div>
                            <div class="newTest-mark-inner_right">
                                <div class="newTest-mark-wrapper">
                                    <select class="newTest-mark-select" name="available_attempts" > 
                                        <option value="1" selected>Одна спроба</option> 
                                        <option value="2">Перша спроба</option>
                                        <option value="3">Остання спроба</option>
                                    </select>
                                    <div class="newTest-mark_arrowBlock"></div>
                                    </div>
                            </div>
                        </div>
                        <div class="newTest-mark-string">
                            <div class="newTest-mark-inner_left">
                                Метод оцінювання
                            </div>
                            <div class="newTest-mark-inner_right">
                                <div class="newTest-mark-wrapper">
                                    <select class="newTest-mark-select" name="assessment_method"> 
                                        <option value="1" selected>Краща оцінка</option> 
                                        <option value="2">Середня оцінка</option>
                                        <option value="3">Незадовiльнa оцінка</option>                                   
                                    </select>
                                    <div class="newTest-mark_arrowBlock"></div>
                                    </div>
                            </div>

                        </div>


                        </div>
                    </div>

                    <div class="newTest-block active">
                        <div class="newTest-top active">
                            Поведінка питань
                        </div>
                        <div class="newTest-wrapper show">
                        <div class="newTest-quest-string">
                            <div class="newTest-quest-inner_left">
                                Випадковий порядок відповідей
                            </div>
                            <div class="newTest-quest-inner_right">
                                <div class="newTest-quest-wrapper">
                                    <select class="newTest-quest-select" name="random_answers_order"> 
                                        <option value="1" selected>Так</option> 
                                        <option value="2">Нi</option>                                   
                                    </select>
                                    <div class="newTest-quest_arrowBlock"></div>
                                    </div>
                            </div>
                        </div>
                        <div class="newTest-quest-string">
                            <div class="newTest-quest-inner_left">
                                Отримання результату
                            </div>
                            <div class="newTest-quest-inner_right">
                                <div class="newTest-quest-wrapper">
                                    <select class="newTest-quest-select" name="getting_result"> 
                                        <option value="1" selected>Після відправлення всього тексту</option> 
                                        <option value="2">Інтерактивно за кількома спробами</option>
                                        <option value="3">Адаптивний режим</option>
                                        <option value="4">Адаптивний режим (без штрафних балів)</option>
                                        <option value="5">Негайно після відповіді</option>
                                        <option value="6">Негайно після відповіді з відміткою ступеня впевненості</option>
                                        <option value="7">Після відправлення всього тесту</option>   
                                        <option value="8">Після відправлення всього тесту з відміткою ступеня впевненості</option> 
                                        <option value="9">Ручна оцінка</option>                             
                                    </select>
                                    <div class="newTest-quest_arrowBlock"></div>
                                    </div>
                            </div>

                        </div>


                        </div>
                    </div>

                    <div class="newTest-block active">
                        <div class="newTest-top active">
                            Розширений відгук
                        </div>
                        <div class="newTest-wrapper show">
                        
                            <div class="review-inner">
                                <div class="review-inner_left">
                                    <div class="review_left--name">
                                        Гранична оцінка 
                                    </div>
                                </div>
                                <div class="review-inner_right">
                                100%
                                </div>
                            </div>
                            
                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">
                                        Відгук
                                    </div>
                                </div>
                                <div class="courseAdd-inner_right">
                                        <textarea class="tinyMCE-area" name="extended_feedback_100"></textarea>
                                </div>
                            </div>

                            <input type="hidden" id="counter" name="grade_counter" value="0">
                            <div id="app1">
                                <div v-for="(id,index) in ids" >
                                    <div class="reviewMiddle-inner">
                                        <div class="reviewMiddle-inner_left">
                                            <div class="reviewMiddle_left--name">
                                                Гранична оцінка @{{ index+1 }}
                                            </div>
                                        </div>
                                        <div class="reviewMiddle-inner_right">
                                            <input class="newTest-dedline-input_left" :name="'extended_feedback_grade'+index" type="number">
                                        </div>
                                    </div>
                                    
                                    <div class="courseAdd-inner courseAdd-inner_margbottom">
                                        <div class="courseAdd-inner_left">
                                            <div class="courseAdd_left--name">
                                                Відгук
                                            </div>
                                        </div>
                                        <div class="courseAdd-inner_right">
                                                <textarea class="tinyMCE-area" :id="'extended_feedback_review'+index" :name="'extended_feedback_review'+index"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="review-inner">
                                <div class="review-inner_left">
                                    <div class="review_left--name">
                                        Гранична оцінка 
                                    </div>
                                </div>
                                <div class="review-inner_right">
                                0%
                                </div>
                            </div>
                            
                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">
                                        Відгук
                                    </div>
                                </div>
                                <div class="courseAdd-inner_right">
                                        <textarea class="tinyMCE-area" name="extended_feedback_0"></textarea>
                                </div>
                            </div>

                            <a href="##" class="newTest-addBtn" onclick="app1.addNewEntry()">
                                <span>
                                    Додати 3 полів коментаря
                                </span>
                            </a>

                        </div>
                    </div>

                    <div class="newTest-block active">
                        <div class="newTest-top active">
                            Загальне налаштування модуля
                        </div>
                        <div class="newTest-wrapper show">
                        <div class="newTest-quest-string">
                            <div class="newTest-quest-inner_left main-settings_inner_left">
                                Доступність
                            </div>
                            <div class="newTest-quest-inner_right">
                                <div class="newTest-quest-wrapper">
                                    <select class="newTest-quest-select" name="availability"> 
                                        <option value="1" selected="">Показати на сторінці курсу</option> 
                                        <option value="2">Опция 2</option>
                                        <option value="3">Опция 3</option>                                     
                                    </select>
                                    <div class="newTest-quest_arrowBlock"></div>
                                    </div>
                            </div>
                        </div>
                        <div class="newTest-quest-string">
                            <div class="newTest-quest-inner_left main-settings_inner_left">
                                Режим роботи з групами
                            </div>
                            <div class="newTest-quest-inner_right">
                                <div class="newTest-quest-wrapper">
                                    <select class="newTest-quest-select" name="operating_mode" > 
                                        <option value="1" selected="">Доступні групи</option> 
                                        <option value="2">Опция 2</option>
                                        <option value="3">Опция 3</option>                                          
                                    </select>
                                    <div class="newTest-quest_arrowBlock"></div>
                                    </div>
                            </div>

                        </div>


                    </div>
                </div>

                <!-- onclick="document.getElementById('create_test_form').submit();" -->
                <div class="addquestion-btn_wrapper"> 
                    <a class="addquestion-btn" data-toggle="modal" data-target="#questionType"><span style="color:white;">Додати питання</span></a> 
                    <div class="addquestion-btn_text">
                        Текст для супроводу створення тесту
                    </div>
                </div>


                <div class="bootstrap-restylingQuestionType modal fade" id="questionType" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="questionType-top"> <span>Виберіть тип питання</span> </div>
                            <div class="questionType-wrapper">
                                        <input type="hidden" id="question_type" name="question_type" value="">
                                        <div class="questionType-inner">
                                            <div id="multiply_choice" class="questionType-inner_left questionType-js">
                                                <div class="questionType-inner_left--dot">
                                                    <div class="questionType-menu_dot">
                                                    </div>
                                                </div>
                                                <div class="questionType-inner_left--icon">
                                                    <img src="/img/choice-1.png" alt="icon">
                                                </div>
                                                <div class="questionType-inner_left--title">Множинний вибір</div>
                                            </div>
                                            <div class="questionType-inner_right show">Дозволяє вибирати одну або декілька відповідей з заданого списку.</div>
                                        </div>

                                        <div class="questionType-inner">
                                            <div id="true_false" class="questionType-inner_left questionType-js active">
                                                <div class="questionType-inner_left--dot">
                                                    <div class="questionType-menu_dot">
                                                    </div>
                                                </div>
                                                <div class="questionType-inner_left--icon">
                                                    <img src="/img/choice-2.png" alt="icon">
                                                </div>
                                                <div class="questionType-inner_left--title">Правильно/неправильно</div>
                                            </div>
                                            <div class="questionType-inner_right show">Проста форма з множинним вибором тільки з двома варіантами вибору "Правильно" і "Неправильно".</div>
                                        </div>

                                        <div class="questionType-inner">
                                            <div id="drag_drop" class="questionType-inner_left questionType-js">
                                                <div class="questionType-inner_left--dot">
                                                    <div class="questionType-menu_dot">
                                                    </div>
                                                </div>
                                                <div class="questionType-inner_left--icon">
                                                    <img src="/img/choice-3.png" alt="icon">
                                                </div>
                                                <div class="questionType-inner_left--title">Перетягування в тексті</div>
                                            </div>
                                            <div class="questionType-inner_right">Пропущені слова в тексті заповнюються перетягуванням правильних значень з доступних варіантів.</div>
                                        </div>

                                        <div class="questionType-innerFalse">
                                            <div class="questionType-innerFalse_left"></div>
                                            <div class="questionType-innerFalse_right">
                                                <a href="##" class="questionType-btn-add" onclick="document.getElementById('create_test_form').submit();"><span>Додати</span></a> 
                                                <a href="##" class="questionType-btn-delete"><span>Скасувати</span></a>
                                            </div>
                                        </div>
                            </div>
                        
                        </div>
                    </div>
            </div>

                
        </form>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        var currentCounter = 0;
        var app1 = new Vue({
            el: '#app1',
            data: {
                ids: [
                    { id: currentCounter},
                ],
                answers: [
                ],
            },
            methods: {
                addNewEntry: function(){
                    currentCounter = currentCounter + 1;
                    var id_t = '#extended_feedback_review' + (currentCounter);

                    setTimeout(function(){  tinymce.init({  selector: id_t,
                    menubar: false,
                    placeholder: "memes",
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist | ' + 
                        'insertfile link image media pageembed template ' ,
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                    });  }, 100);

                    this.ids.push({id: currentCounter});
                    document.getElementById("counter").value = currentCounter;

                    
                },
            }
        });
    </script>
    <script>
        tinymce.init({
            selector: '.tinyMCE-area',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist | ' + 
                'insertfile link image media pageembed template ' ,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>

    <script>
        $('.datepicker').datepicker({
                weekStart: 1,
                daysOfWeekHighlighted: "6,0",
                autoclose: true,                
                timepicker: true,
                datepicker: true,
                format: 'dd/mm/yyyy',            
                        });
            // $('.datepicker').datepicker("setDate", new Date());
    </script>

    <script>

    $( document ).ready(function() {

        $('#question_type').val("Правильно/неправильно");
    });

    $( "#multiply_choice" ).click(function() {
        
        $('#question_type').val("Множинний вибір");
    });
    $( "#true_false" ).click(function() {
        
        $('#question_type').val("Правильно/неправильно");
    });
    $( "#drag_drop" ).click(function() {
        
        $('#question_type').val("Перетягування в тексті");
    });


    </script>
</body>

@section('scripts')


<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->

<script>

$(function () {
    $('.datetimepicker').datetimepicker();
});

</script>

@endsection


@endsection