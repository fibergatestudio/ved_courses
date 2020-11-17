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
                <div class="card-header">{{ __('Добавление вопроса "Перетаскивае в тексте" к тесту') }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('create_drag_drop',['test_info_id' => $test_info_id]) }}" id="test_form" method="POST" >
                        @csrf
                    <!-- Множественный выбор -->
                        <div class="form-group">
                            <label>Название вопроса</label>
                            <input type="text" class="form-control" name="question_name" required>
                        </div>
                        <div class="form-group">
                            <label>Текст вопроса</label>
                            <textarea id="question_text" class="question_text" name="question_text">Введите текст вопроса</textarea>
                        </div>
                        <div class="form-group">
                            <label>Бал по умолчанию</label>
                            <input type="text" class="form-control" name="default_score">
                        </div>
                        <div class="form-group">
                            <label>Коментарий ко всему тесту</label>
                            <textarea id="question_text" class="question_text" name="test_comment">Введите текст коментария</textarea>
                        </div>
                        <div class="form-group">
                            <label>Один или несколько верных ответов</label>
                            <select class="form-control" name="answers_type">
                                <option value="Допускается несколько верных ответов">Допускается несколько верных ответов</option>
                                <option value="Только один верный ответ">Только один верный ответ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Нумеровать ответы?</label>
                            <select class="form-control" name="number_answers"> 
                                <option value="Без нумерации">Без нумерации</option>
                                <option value="a, b, c">a, b, c, ...</option>
                                <option value="A, B, C">A, B, C, ...</option>
                                <option value="1, 2, 3">1, 2, 3, ...</option>
                            </select>
                        </div>
                        <hr>
                        <h1>Варианты ответов </h1>
                        <div id="app12">
                            <div class="form-group">
                                <label>Вариант ответа 1</label>
                                <textarea id="question_text" class="question_text" name="answer">Введите ответ</textarea>
                            </div>
                            <div class="form-group">
                                <label>Оценка</label>
                                <select class="form-control" name="answer_grade">
                                    <option value="Не выбрано">Не выбрано</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Комментарий</label>
                                <textarea id="question_text" class="question_text" name="answer_comment">Введите комментарий</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">Сохранить вопрос</button>
                    </form>
                    <!-- Верно\Не верно -->

                    <!-- Краткий ответ -->
                    <!-- Перетаскивание в тексте -->

                        <a href="">
                            <button type="submit" class="btn btn-success">Добавить ответ</button>
                        </a>

                        <a href="{{ route('tests_controll') }}">
                            <button type="submit" class="btn btn-danger">Удалить вопрос</button>
                        </a>

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

    <!-- questionType modal-page (begin) -->
    @include('layouts.front.includes.admin_course_type_select')
    <!-- questionType modal-page (end) -->

    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container container-height">

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

            <div class="cource-container--mobile">
                <form action="{{ route('create_drag_drop',['test_info_id' => $test_info_id]) }}" id="drag_drop_form" method="POST" >
                    @csrf
                    <div class="multipleChoice-top-title">
                        <h3 class="multipleChoice-title">Перетягування в тексті</h3>
                        <a class="multipleChoice-top-btn" href="##" data-toggle="modal" data-target="#questionType">Змінити
                            Тип питання</a>
                    </div>

                    <div class="multipleChoice-block newTest-block active">
                        <div class="newTest-top active">
                            Додати питання
                        </div>
                        <div class="newTest-wrapper show">

                            <div class="multipleChoice-inner">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                        Назва питання<sup>*</sup>
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                    <input class="multipleChoice-input course-faq--input courseAdditional--input" name="question_name"
                                        type="text" placeholder="Приклад: Питання 1, або 1">
                                </div>
                            </div>

                            <div class="multipleChoice-inner multipleChoice-inner_align">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                        Текст питання<sup>*</sup>
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                        <textarea class="tinyMCE-area" name="question_text"></textarea>
                                </div>
                            </div>

                            <div class="multipleChoice-inner">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                        Бал за замовчуванням
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                    <input class="multipleChoice-input course-faq--input courseAdditional--input" name="default_score" 
                                        type="number" placeholder="1">
                                </div>
                            </div>

                            <div class="multipleChoice-inner multipleChoice-inner_align">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                        Коментар до всього тексту
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                        <textarea class="tinyMCE-area" name="test_comment"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="multipleChoice-block newTest-block active">
                        <div class="newTest-top active">
                            Доступні варіанти
                        </div>
                        <div class="newTest-wrapper show">
                            <div class="question-dragDrop-string_top">
                                Варіант відповіді [[1]]
                            </div>
                            <input type="hidden" id="counter" name="answers_counter" value="0">
                            <div id="app1">
                                <div v-for="(id,index) in ids" >

                                    <div class="question-dragDrop-string">
                                        <div class="question-dragDrop-string_left">
                                            Відповідь  @{{ index + 1}}
                                        </div>
                                        <div class="question-dragDrop-string_right">
                                            <input class="courseAdditional--input question-dragDrop--input" type="text" :name="'answer'+index"
                                                placeholder="Розгорнутий варіант відповіді">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <!-- <div class="question-dragDrop-string">
                                <div class="question-dragDrop-string_left">
                                    Відповідь 2
                                </div>
                                <div class="question-dragDrop-string_right">
                                    <input class="courseAdditional--input question-dragDrop--input" type="text"
                                        placeholder="Розгорнутий варіант відповіді">
                                </div>
                            </div>

                            <div class="question-dragDrop-string">
                                <div class="question-dragDrop-string_left">
                                    Відповідь 3
                                </div>
                                <div class="question-dragDrop-string_right">
                                    <input class="courseAdditional--input question-dragDrop--input" type="text"
                                        placeholder="Розгорнутий варіант відповіді">
                                </div>
                            </div> -->

                            
                            <div class="question-dragDrop-string">
                                <div class="question-dragDrop-string_left">
                                    Вірна відповідь
                                </div>
                                <div class="question-dragDrop-string_right">
                                    <div class="newTest-quest-wrapper">
                                        <select class="newTest-quest-select" id="right_answer" name="right_answer"> 
                                            <option default>Выберите верный ответ</option>
                                            <option value="1">Відповідь 1</option>                               
                                        </select>
                                        <div class="newTest-quest_arrowBlock"></div>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>


                </div>
                <div class="multipleChoice-btn-wrapper">
                    <a class="multipleChoice-btn-left" href="##" onclick="app1.addNewEntry()">
                        <span>Додати відповідь</span>
                    </a>
                    <a class="multipleChoice-btn-center" href="##" onclick="document.getElementById('drag_drop_form').submit();">
                        <span>Зберегти питання</span>
                    </a>
                    <a class="multipleChoice-btn-right" href="##">
                        <span>Видалити питання</span>
                    </a>

                </div>
            </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>

        //var global_index = 0;
        var currentCounter = 1;
        //var answersCounter = 0;

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
                    this.ids.push({id: currentCounter});
                    document.getElementById("counter").value = currentCounter;

                    //var right_answer_id = '#right_answer' + index;
                    $('#right_answer')
                        .append($("<option></option>")
                                    .attr("value",  currentCounter)
                                    .text("Відповідь "+ currentCounter ) ); 
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
                'insertfile link image media pageembed template ',
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

</body>


@section('scripts')

@endsection


@endsection