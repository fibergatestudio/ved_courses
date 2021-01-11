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
                <div class="card-header">{{ __('Добавление вопроса "Верно не верно" к тесту') }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('create_true_false',['test_info_id' => $test_info_id]) }}" id="test_form" method="POST" >
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
                            <label>Правельный ответ</label>
                            <select class="form-control" name="right_answer">
                                <option value="Допускается несколько верных ответов">Допускается несколько верных ответов</option>
                                <option value="Только один верный ответ">Только один верный ответ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Коментарий к ответу "Правильно"</label>
                            <textarea id="question_text" class="question_text" name="right_answer_comment">Введите текст коментария</textarea>
                        </div>
                        <div class="form-group">
                            <label>Коментарий к ответу "Неправильно"</label>
                            <textarea id="question_text" class="question_text" name="wrong_answer_comment">Введите текст коментария</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Сохранить вопрос</button>
                    </form>
                    <!-- Верно\Не верно -->

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
                                <img src="/img/teacher-mobileMenu-2.png" alt="icon">
                            </div>
                            <div class="sidebar-top_mobile-name">
                                Управління курсами
                            </div>
                        </div>
                        <!-- changeling block mobile-btn (end) -->

                    </div>
                    @if(Auth::user()->role == "admin")
                        @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])
                    @elseif(Auth::user()->role == "teacher")
                        @include('layouts.front.includes.teacher_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])
                    @endif

                </div>

            </div>
            <!-- sidebar-menu (end) -->

            <div class="cource-container--mobile">
                <form action="{{ route('create_true_false',['test_info_id' => $test_info_id]) }}" id="true_false_form" method="POST" >
                @csrf
                    <div class="multipleChoice-top-title">
                    <h3 class="multipleChoice-title">Правильно/неправильно</h3>
                        <a class="multipleChoice-top-btn" href="##" data-toggle="modal"
                        data-target="#questionType">Змінити  Тип  питання</a>
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
                                    <input class="multipleChoice-input course-faq--input courseAdditional--input" type="text" id="question_name" name="question_name"  placeholder="Приклад: Питання 1, або 1">
                                </div>
                            </div>
                            
                            <div class="multipleChoice-inner multipleChoice-inner_align">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                        Текст питання<sup>*</sup>
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                        <textarea class="tinyMCE-area" id="question_text" name="question_text" ></textarea>
                                </div>
                            </div> 
                            
                            <div class="multipleChoice-inner">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                        Бал за замовчуванням
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                    <input class="multipleChoice-input course-faq--input courseAdditional--input" name="default_score" type="number" placeholder="1">
                                </div>
                            </div> 

                            <div class="multipleChoice-inner multipleChoice-inner_align">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                        Коментар до всього тексту
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                        <textarea class="tinyMCE-area" name="test_comment" ></textarea>
                                </div>
                            </div> 

                            <div class="multipleChoice-string"> 
                                <div class="question-add_left multipleChoice-string_left"> 
                                    Правильна відповідь
                                </div>
                                <div class="question-add_right multipleChoice-string_right"> 
                                    <div class="newTest-quest-wrapper">
                                        <select class="newTest-quest-select" name="right_answer"> 
                                            <option value="0" selected>Неправильно</option> 
                                            <option value="1">Правильно</option>                                   
                                        </select>
                                        <div class="newTest-quest_arrowBlock"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="multipleChoice-inner multipleChoice-inner_align">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                    Коментар до відповіді "Правильно"
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                        <textarea class="tinyMCE-area" name="right_answer_comment"></textarea>
                                </div>
                            </div> 
                        
                            <div class="multipleChoice-inner multipleChoice-inner_align">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                    Коментар до відповіді "Неправильно"
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                        <textarea class="tinyMCE-area" name="wrong_answer_comment"></textarea>
                                </div>
                            </div> 

                        </div>
                    </div>


                    </div>
                    <div class="multipleChoice-btn-wrapper btn-wrapper-restyling">                   
                        <a class="multipleChoice-btn-center btn-center_restyling" href="##" onclick="submitForm(event);">
                            <span>Зберегти питання</span>
                        </a>
                        <a class="multipleChoice-btn-right" href="{{ URL::previous() }}">
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
    
        
    function submitForm(event){
        event.preventDefault();
        // Получаем инфу
        var name = $.trim( $('#question_name').val() );

        // var myContent = tinymce.activeEditor.getContent();
        var description = tinymce.get('question_text').getContent();
        //alert(myContent);

        if (name  === '') {
            alert('Введіть назву питання!');
            return false;
        } else if(description == ""){
            alert('Введіть текст питання!');
            return false;
        } else {
            //document.getElementById('create_course').submit();
        // $( "#edit_course_form" ).submit();
            $( "#test_form" ).submit();
        // document.getElementById('create_test_form').submit()
        }

    }

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

</body>


@section('scripts')

@endsection


@endsection