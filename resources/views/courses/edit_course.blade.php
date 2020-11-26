@extends('layouts.front.front_child')

@section('content')
<div style="display:none;" class="container">
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
                <div class="card-header">{{ __('Редактирование курса') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('edit_course_apply', ['course_id' => $course_info->id ]) }}" id="test_form" method="POST" >
                        @csrf
                        <!-- <input type="hidden" name="course_id" value="{{ $course_info->id }}"> -->
                        <div class="form-group">
                            <label>Название Теста</label>
                            <input type="text" class="form-control" name="name" value="{{ $course_info->name }}">
                        </div>

                        <div id="studentsAdd" class="form-group">
                            <label>Описание Теста</label>
                            <textarea type="text" class="form-control" name="description" value="">{{ $course_info->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Про этот курс</label>
                            <a href="{{ route('edit_about', ['course_id' => $course_info->id ]) }}" class="btn btn-success">Редактировать</a>
                        </div>
                        <div class="form-group">
                            <label>Программа курса</label>
                            <a href="{{ route('add_lesson', ['course_id' => $course_info->id ]) }}" class="btn btn-success">Добавить</a>
                        </div>
                        <div class="form-group">
                            <label>Список уроков</label>
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Описание</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($course_lessons as $lesson)
                                    <tr>
                                        <td>{{ $lesson->id }}</td>
                                        <td>{{ strip_tags($lesson->course_description) }}</td>
                                        <td>
                                            <div class="btn btn-success">Редактировать</div>
                                            <div class="btn btn-danger">Удалить</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label>Частые вопросы</label>
                            <a href="{{ route('add_question', ['course_id' => $course_info->id ]) }}" class="btn btn-success">Добавить</a>
                        </div>
                        <div class="form-group">
                            <label>Список вопросов</label>
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Вопрос</th>
                                        <th>Ответ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses_question_answers as $faq)
                                    <tr>
                                        <td>{{ $faq->id }}</td>
                                        <td>{{ strip_tags($faq->course_question) }}</td>
                                        <td>{{ strip_tags($faq->course_answer) }}</td>
                                        <td>
                                            <div class="btn btn-success">Редактировать</div>
                                            <div class="btn btn-danger">Удалить</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        <!--  -->

                        <!--  -->
                        <br>
                        <div class="form-group">
                            <label>Видимость курса</label>
                            <select type="text" class="form-control" name="visibility">
                                <option value="all" @if($course_info->visibility == "all") selected @endif>Для всех</option>
                                <option value="register" @if($course_info->visibility == "register") selected @endif>Только для зарегистрированных</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Назначенный препод</label>
                            <select type="text" class="form-control" name="assigned_teacher_id">
                                <option>Выберите</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @if($teacher->id == $course_info->assigned_teacher_id ) selected @endif>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Список преподавателей</label>
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Имя</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assigned_teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->id }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>
                                            <a href="{{ route('delete_teacher', ['course_id' => $course_info->id, 'teacher_id' => $teacher->id]) }}"><div class="btn btn-danger">Удалить</div></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-success">Применить</button>
                    </form>

                        <a href="{{ route('courses_controll') }}">
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
                        <img src="/img/basket.png" alt="icon">
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

     <!-- deleteMENU modal-page (begin) -->
    <div class="bootstrap-restylingStudent modal fade" id="deleteMENU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog course-edit-deleteMenu_modal">
            <div class="modal-content">
                <ul class="course-edit-deleteMenu_wrapper">
                    <li class="deleteMenu_inner">
                        <img src="/img/del-menu-icon.png" alt="delete-menu-icon">
                    </li>
                    <li class="deleteMenu_inner">
                        Ви точно бажаєте видалити
                        урок ?
                    </li>
                    <li class="deleteMenu_inner">
                        <a class="deleteMenu_inner-btn" href="##">
                            <span>видалити</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

 <!-- deleteMENU modal-page (end) -->
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            <!-- sidebar-menu (start) -->

            {{-- <div class="sidebar">

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
                                <img src="/img/teacher-mobileMenu-2.png" alt="icon">
                            </div>
                            <div class="sidebar-top_mobile-name">
                                Управління курсами
                            </div>
                        </div>
                        <!-- changeling block mobile-btn (end) -->

                    </div> --}}
                    @if(Auth::user()->role == "admin")
                        @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])
                    @elseif(Auth::user()->role == "teacher")
                        @include('layouts.front.includes.teacher_sidebar_vrst')
                    @endif
{{--
                </div>

            </div> --}}
            <!-- sidebar-menu (end) -->

            <div class="cource-container--mobile">
                <form action="{{ route('edit_course_apply', ['course_id' => $course_info->id ]) }}" id="edit_course_form" method="POST" enctype="multipart/form-data">
                    @csrf
                <h3 class="courseEdit-title courseControl-title">Редагування курсу</h3>

                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Назва та опис курсу
                    </div>
                    <div class="courseAdd-wrapper">

                        <div class="courseAdd-inner courseAdd-inner_margbottom">
                            <div class="courseAdd-inner_left">
                                <div class="courseAdd_left--name">
                                    Назва<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdd-inner_right">
                                <input class="course-faq--input courseAdditional--input" name="name" value="{{ $course_info->name }}" type="text">
                            </div>
                        </div>

                        <div class="courseAdd-inner courseAdd-inner_margbottom">
                            <div class="courseAdd-inner_left">
                                <div class="courseAdd_left--name">
                                    Опис<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdd-inner_right">
                                    <textarea class="tinyMCE-area" name="description" value="">{{ $course_info->description }}</textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Фото курсу
                    </div>
                    <div class="courseAdd-wrapper">
                        <div class="courseAdd-grid">
                            <div class="courseAdd-grid_item">
                                Додати фото
                            </div>
                            <div class="courseAdd-grid_item">

                                <div class="courseAdditional-input-wrapper">
                                    <input class="courseAdditional-input_input" type="text" placeholder="Назва файлу">
                                    <input class="courseAdditional-input_button" type="file" name="course_image">
                                    <a class="courseAdditional-input_FakeButton" href="##">Завантажити</a>
                                </div>

                                <div class="courseAdd-info-wrapper">
                                    <a class="courseAdditional-docName docName-restyling" id="img_upload_name" href="##">
                                        Довга назва фото
                                    </a>
                                </div>

                            </div>
                            <div class="courseAdd-grid_item">
                                Короткі зауваження щодо додавання фото курсу.
                            </div>

                        </div>
                    </div>
                </div>


                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Про курс
                    </div>
                    <div class="courseEdit-about">
                    <h5 class="courseEdit-about_title">Про цей курс</h5>

                    <div class="courseEdit-textblock main-textblock"> 
                        @if(isset($course_information->course_description))
                            {{ strip_tags($course_information->course_description) }}
                        @endif
                    </div>

                    <div class="main-learn">
                        <h4 class="courseEdit-learn main-learn_title">Чого ви навчитесь</h4>
                        <div class="courseEdit-learn_wrapper main-learn_wrapper">
                        @if(isset($course_information->course_learn_arr))
                            @foreach(json_decode($course_information->course_learn_arr) as $learn)

                                <div class="main-learn_inner">
                                    <div class="main-learn_inner--icon"></div>
                                    <div class="main-learn_inner--text">{{ $learn }}</div>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div class="courseEdit-separator separator"></div>
                        <div class="courseEdit-btn_wrapper">
                            <a href="{{ route('edit_about', ['course_id' => $course_info->id ]) }}" class="courseEdit-btn">
                                <span>редагувати</span>
                            </a>
                        </div>
                </div>
                </div>


                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Викладачi
                    </div>

                    <div class="newTest-mark-string courseEdit-select_restyling">
                        <div class="newTest-mark-inner_left">
                            Викладач курсу
                        </div>
                        <div class="newTest-mark-inner_right">
                            <div class="newTest-mark-wrapper">
                                <select class="newTest-mark-select" name="assigned_teacher_id">
                                    <option>Выберите</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @if($teacher->id == $course_info->assigned_teacher_id ) selected @endif>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                <div class="newTest-mark_arrowBlock"></div>
                                </div>
                        </div>
                    </div>
                    @foreach($assigned_teachers as $teacher)
                        <div class="courseEdit-teachers teachers-grid_wrapper">
                        <div class="teachers-grid_item">
                            <div class="courseEdit-item_photo">
                            </div>
                        </div>
                        <div class="teachers-grid_item">
                            <div class="teachers-item_name">{{ $teacher->surname }}{{ $teacher->name }}{{ $teacher->patronymic }}</div>
                            <div class="courseEdit-item_position teachers-item_position">Професор наук</div>

                        </div>
                        <div class="teachers-grid_item">
                            <div class="courseEdit-item_text teachers-item_text">
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever since
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Доступ до курсу
                    </div>
                    <div class="courseAdd-wrapper">

                        <div class="newTest-mark-string courseAdd-access_restyling">
                            <div class="newTest-mark-inner_left">
                                Доступ до курсу мають
                            </div>
                            <div class="newTest-mark-inner_right">
                                <div class="newTest-mark-wrapper">
                                    <select class="newTest-mark-select" name="visibility">
                                        <option value="all" @if($course_info->visibility == "all") selected @endif>Всі користувачі</option>
                                        <option value="register" @if($course_info->visibility == "register") selected @endif>Тільки зареєстровані користувачі</option>
                                    </select>
                                    <div class="newTest-mark_arrowBlock"></div>
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>

                @foreach($course_lessons as $lesson)

                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Програма курсу
                    </div>
                        <div class="courseEdit-grid_wrapper">
                            <div class="courseEdit-grid_item">
                                <div class="programs-item_lesson--number">01</div>
                                <div class="programs-item_lesson--text">Заняття {{ $lesson->id }}</div>
                            </div>
                            <div class="courseEdit-grid_item">
                                <div class="courseEdit-item_chapter programs-item_chapter">{{ $lesson->course_name }}
                                <picture>
                                        <source srcset="/img/pencil-edit-small.png" media="(max-width:592px)">
                                    <img class="courseEdit-item_image" src="/img/pencil-edit.png" alt="pencil-image">
                                </picture>
                                </div>

                            </div>
                            <div class="courseEdit-grid_item">
                                <div class="programs-item_text">{{ $lesson->course_description }}</div>
                            </div>
                            <div class="courseEdit-grid_item">
                                <div class="programs-item_hours"><a href="##">{{ $lesson->learning_time }} години на завершення</a> </div>
                            </div>
                            <div class="courseEdit-grid_item">

                                <div class="courseEdit-item_faq courseEdit-item_button">
                                    <a href="##">Як це працює</a>
                                </div>
                                <div class="courseEdit-hidden">
                                    <div class="courseEdit-underline"></div>
                                    <table class="hidden-menu">
                                        <tbody >
                                        <tr class="hidden-menu_string">
                                            <td class="courseEdit-hidden_column hidden-menu_column">{{ $lesson->learning_time }} хв.</td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">{{ $lesson->course_description }}</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>

                                <div class="courseEdit-item_book courseEdit-item_button">
                                    <a href="##">Протокол</a>
                                </div>
                                <div class="courseEdit-hidden">
                                    <div class="courseEdit-underline"></div>
                                    <table class="hidden-menu">
                                        <tbody >
                                        <tr class="hidden-menu_string">
                                            <td class="courseEdit-hidden_column hidden-menu_column">{{ $lesson->learning_protocol_time }} хв.</td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">{{ $lesson->course_protocol_descr }}</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>

                                <div class="courseEdit-item_video courseEdit-item_button">
                                    <a href="##">Відеолекція</a>
                                </div>
                                <div class="courseEdit-hidden">
                                    <div class="courseEdit-underline"></div>
                                    <div class="courseEdit_video">{{ $lesson->video_count }} відео</div>
                                    <table class="hidden-menu">
                                        <tbody>

                                        <tr class="hidden-menu_string">
                                            <td class="courseEdit-hidden_column hidden-menu_column">3 хв.</td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                                        </tr>
                                        <tr class="hidden-menu_string">
                                            <td class="courseEdit-hidden_column hidden-menu_column">8 хв.</td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                                        </tr>
                                        <tr class="hidden-menu_string">
                                            <td class="courseEdit-hidden_column hidden-menu_column">4 хв.</td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                                        </tr>
                                        <tr class="hidden-menu_string">
                                            <td class="courseEdit-hidden_column hidden-menu_column">3 хв.</td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                                        </tr>
                                        <tr class="hidden-menu_string">
                                            <td class="courseEdit-hidden_column hidden-menu_column">3 хв.</td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>

                                <div class="courseEdit-item_test courseEdit-item_button">
                                    <a href="##">Тест
                                        <img class="courseEdit-item_image" src="/img/pencil-edit-small.png" alt="pencil-image">
                                    </a>
                                </div>
                                <div class="courseEdit-hidden">
                                    <div class="courseEdit-underline"></div>
                                    <table class="hidden-menu">
                                        <tbody >
                                        <tr class="hidden-menu_string">
                                            <td class="courseEdit-hidden_column hidden-menu_column">20 хв.</td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                            <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>

                            </div>
                        </div>
                </div>
                @endforeach


                <div class="courseEdit-btn_wrapper">
                    <a href="{{ route('add_lesson', ['course_id' => $course_info->id ]) }}" class="courseEdit-btn courseEdit-btn-add">
                        <span>Додати заняття</span>
                    </a>
                </div>

                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Поширені запитання
                    </div>

                    @foreach($courses_question_answers as $faq)
                    <div class="main-faq_panel active">{{ strip_tags($faq->course_question) }}</div>
                    <div class="main-faq_panel--inner show">{{ strip_tags($faq->course_answer) }}</div>
                    @endforeach

                    <div class="courseEdit-btn_wrapper">
                        <a href="{{ route('add_question', ['course_id' => $course_info->id ]) }}" class="courseEdit-btn courseEdit-btn-add courseEdit-btn-margin">
                            <span>Додати запитання</span>
                        </a>
                    </div>

                </div>
                <div class="courseEdit-btn-watch_wrapper">
                    <a class="courseEdit-btn-watch btn-watch--more" id="submit_button" href="##"><span>Зберегти курс</span></a>
                </div>
            </form>
        </div>
    </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        $(document).ready(function() {
            $('input[type="file"]').change(function(e) {
                var geekss = e.target.files[0].name;
                //alert(geekss);
                $("#img_upload_name").text(geekss);

            });
        });
    </script>

    <script>

    $( "#submit_button" ).click(function() {
        $( "#edit_course_form" ).submit();
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

</body>

@section('scripts')

@endsection


@endsection
