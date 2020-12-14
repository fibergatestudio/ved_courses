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
                <div class="card-header">{{ __('Просмотр информации и вопросов') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="" id="test_form" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label>Название Теста</label>
                            <input type="text" class="form-control" name="name" value="{{ $test_view_info->name }}">
                        </div>
                        
                        <div id="studentsAdd" class="form-group">
                            <label>Описание Теста</label>
                            <textarea type="text" class="form-control" name="description">{{ $test_view_info->description }}</textarea>
                        </div>
                        <hr> 
                        <br>

                        <div class="form-group">
                            <label>Список вопросов</label>
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Тип вопроса</th>
                                        <th>Название вопроса</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($test_question_answers as $test)
                                    <tr>
                                        <td>{{ $test->id }}</td>
                                        <td>{{ $test->question_type }}</td>
                                        <td>/td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </form>
                        <a href="{{ route('question_type',['test_info_id'=>$test_info_id]) }}">
                            <button class="btn btn-success">Добавить вопрос</button>
                        </a>
                        <a href="{{ route('tests_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>


<body >

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

    
    <section class="courseControl">
        @if(session()->has('message_success'))
            <div class="alert alert-success">
                {{ session()->get('message_success') }}
            </div>
        @endif
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
                                <img src="/img/teacher-mobileMenu-2.png" alt="icon">
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
                
                <form action="{{ route('update_test_info_questions', ['test_info_id' => $test_info_id]) }}" id="test_edit_form" method="POST" >
                    @csrf
                    <h3 class="courseEdit-title courseControl-title">Редагування тесту</h3>
                    <div class="editing-string-top">
                        <div class="editing-top_inner">
                            Питань:<span><?php echo count($test_question_answers); ?></span>
                        </div>
                        <div class="editing-top_inner">
                            Тест відкритий
                        </div>
                    </div>
                    
                    <div class="editing-string-middle">
                        <div class="editing-middle_inner">
                            Максимальна оцінка
                        </div>
                        <div class="editing-middle_inner">
                            <input class="editing-input" type="number" step='0.01' value="{{ $test_view_info->max_score }}" name="max_score">
                        </div>
                        <div class="editing-middle_inner">
                            <a class="editing-btn-save" href="##" id="update_max_score"> <span>ЗБЕРЕГТИ</span> </a>
                        </div>

                    </div>
                    
                    <!-- <div class="editing-string-bottom">
                        Всього балів :<span>69.00</span> 
                    </div> -->
                


                    <div class="editing-block">
                    <div class="editing-wrapper">

                        @foreach($test_question_answers as $test)

                            <!-- <td>{{ $test->id }}</td>
                            <td>{{ $test->question_type }}</td> -->

                            <div class="editing-textarea_wrapper">
                                <div class="editing-textarea_inner">
                                    <div class="editing-textarea_num">{{ $test->id }}</div>
                                    <div class="editing-textarea_icon">
                                        @if($test->question_type == "Множественный выбор")
                                        <img src="/img/choice-1.png" alt="icon">
                                        @elseif($test->question_type == "Верно\Не верно")
                                        <img src="/img/choice-2.png" alt="icon">
                                        @elseif($test->question_type == "Перетаскивание в тексте")
                                        <img src="/img/choice-3.png" alt="icon">
                                        @endif
                                    </div>
                                    <textarea class="editing-textarea_textarea" name="editing"  cols="30" rows="1" placeholder="{{ $test->question_name }}"></textarea>
                                    <div class="editing-textarea_btns">
                                        <a href="{{ route('delete_test_question', ['test_info_id' => $test_info_id, 'question_id' => $test->id, 'question_type' => $test->question_type] ) }}" class="editing-textarea_btns--close">
                                                <img src="/img/close-ico.png" alt="icon">
                                        </a>
                                    </div>
                                    <div class="editing-textarea_edit">
                                        <div class="editing-textarea_edit--left">
                                            23.00
                                        </div>
                                        <div class="editing-textarea_edit--right">
                                            <a href="##">
                                            <img src="/img/pencil-edit-icon.png" alt="icon">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        <!-- href="{{ route('question_type',['test_info_id'=>$test_info_id]) }}"  -->
                        <a class="editing-btn-add" data-toggle="modal" data-target="#questionType">Додати питання</a>

                    </div>
                    </div>

                    <div class="editing-btn-wrapper">
                        <button type="submit" id="submit_button" class="editing-btn-saveBottom" href="##">Зберегти</button>
                    </div>
                </form>
                        <div class="bootstrap-restylingQuestionType modal fade" id="questionType" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="questionType-top"> <span>Виберіть тип питання</span> </div>
                                    <div class="questionType-wrapper">
                                        <form action="{{ route('question_type_submit',['test_info_id' => $test_info_id]) }}" id="add_new_quest_form" method="POST" >
                                            @csrf
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
                                                        <a href="##" class="questionType-btn-add" id="question_submit_button"><span>Додати</span></a> 
                                                        <a href="##" data-dismiss="modal" class="questionType-btn-delete"><span>Скасувати</span></a>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


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
    $('#update_max_score').click(function() {
        $( "#test_edit_form" ).submit();
    });

    $( "#question_submit_button" ).click(function() {
        $( "#add_new_quest_form" ).submit();
    });

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

@endsection


@endsection