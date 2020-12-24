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
                <div class="card-header">{{ __('Добавление вопроса "Множественный выбор" к тесту') }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- <form action="{{ route('create_multiple_choice',['test_info_id' => $test_info_id]) }}" id="test_form" method="POST" >
                        @csrf
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
                        <input type="hidden" id="counter" name="questions_counter" value="">
                        <div id="app2">
                            <div v-for="(id,index) in ids" >
                                <div class="form-group">
                                    <label>Вариант ответа @{{ index + 1}}</label>
                                    <textarea id="question_text" class="question_text" :name="'answer[]'">Введите ответ</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Оценка</label>
                                    <select class="form-control" :name="'answer_grade[]'">
                                        <option value="Не выбрано">Не выбрано</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Комментарий</label>
                                    <textarea id="question_text" class="question_text" name="answer_comment">Введите комментарий</textarea>
                                </div>

                                <input type="hidden" :id="'answer_counter'+index" :name="'answer_counter'+index" value="0">

                            </div>
                            <div onclick="app1.addNewEntry()" class="btn btn-success">Добавить Вопрос</div>

                        </div>
                        <button type="submit" class="btn btn-warning">Сохранить вопрос</button>
                    </form> -->
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
                    @if(Auth::user()->role == "admin")
                        @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])
                    @elseif(Auth::user()->role == "teacher")
                        @include('layouts.front.includes.teacher_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])
                    @endif

                </div>

            </div>
            <!-- sidebar-menu (end) -->

            <div class="cource-container--mobile">
                <form action="{{ route('create_multiple_choice',['test_info_id' => $test_info_id]) }}" id="test_form" method="POST" >
                    @csrf
                    <div class="multipleChoice-top-title">
                    <h3 class="multipleChoice-title">Множинний вибір</h3>
                        <a class="multipleChoice-top-btn" href="{{ route('question_type',['test_info_id'=>$test_info_id]) }}" data-toggle="modal"
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
                                    <input class="multipleChoice-input course-faq--input courseAdditional--input" type="text" name="question_name"  placeholder="Приклад: Питання 1, або 1">
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
                                        <textarea class="tinyMCE-area" name="test_comment"></textarea>
                                </div>
                            </div> 

                            <div class="multipleChoice-string"> 
                                <div class="multipleChoice-string_left"> 
                                    Одна або кілька правильних відповідей?
                                </div>
                                <div class="multipleChoice-string_right"> 
                                    <div class="newTest-quest-wrapper">
                                        <select class="newTest-quest-select" name="answers_type"> 
                                            <option value="1" selected>Допускаються кілька правильних відповідей</option> 
                                            <option value="2">Тільки одна правильна відповідь</option>                                   
                                        </select>
                                        <div class="newTest-quest_arrowBlock"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="multipleChoice-string"> 
                                <div class="multipleChoice-string_left"> 
                                    Нумерувати відповіді?
                                </div>
                                <div class="multipleChoice-string_right"> 
                                    <div class="newTest-quest-wrapper">
                                        <select class="newTest-quest-select" name="number_answers"> 
                                            <option value="1" selected>Без нумерації</option> 
                                            <option value="2">a., b., c., ...</option>
                                            <option value="3">A., B., C., ...</option>
                                            <option value="4">1., 2., 3., ...</option>                                                                   
                                        </select>
                                    <div class="newTest-quest_arrowBlock"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="multipleChoice-block newTest-block active">
                        <div class="multipleChoice-top active">
                            Варіанти відповідей
                        </div>

                        <input type="hidden" id="answer_counter" name="answer_counter" value="">
                        <div id="app1">
                            <div v-for="(id,index) in ids" >
                                <div class="newTest-wrapper show">
                                                                                
                                    <div class="multipleChoice-inner multipleChoice-inner_align">
                                        <div class="multipleChoice-inner_left">
                                            <div class="multipleChoice_left--name">
                                                Варіант відповіді @{{ index + 1}}
                                            </div>
                                        </div>
                                        <div class="multipleChoice-inner_right">
                                                <textarea class="tinyMCE-area" :id="'answer'+index" :name="'answer'+index"></textarea>
                                        </div>
                                    </div> 
                                    
                                    <div class="multipleChoice-string"> 
                                        <div class="multipleChoice-string_left--bottom"> 
                                            Оцінка
                                        </div>
                                        <div class="multipleChoice-string_right"> 
                                            <div class="newTest-quest-wrapper">
                                                <select class="newTest-quest-select" :id="'answer_grade'+index" :name="'answer_grade'+index"> 
                                                    <option value="1" selected>Не вибрано</option> 
                                                    <option value="0">0%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="50">50%</option>
                                                    <option value="100">100%</option>                                  
                                                </select>
                                                <div class="newTest-quest_arrowBlock"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="multipleChoice-inner multipleChoice-inner_align">
                                        <div class="multipleChoice-inner_left">
                                            <div class="multipleChoice_left--name">
                                                Коментар
                                            </div>
                                        </div>
                                        <div class="multipleChoice-inner_right">
                                                <textarea class="tinyMCE-area" :id="'answer_comment'+index" :name="'answer_comment'+index"></textarea>
                                        </div>
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
                        <button type="submit" class="multipleChoice-btn-center" >
                            <span>Зберегти питання</span>
                        </button>
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
                        var id_p = '#answer_comment' + (currentCounter);
                        var id_t = '#answer' + (currentCounter);

                        setTimeout(function(){  tinymce.init({  selector: id_p,
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
                        document.getElementById("answer_counter").value = currentCounter;
                    
                },
            }
        });
    </script>

    
    <script>
    
    // function submitForm(){

    //     // Получаем кол-во видео
    //     var answer_counter = $('#answer_counter').val();
    //     console.log(answer_counter);
    //         // Перебираем поля каждого видео
    //         if(answer_counter > 0){
    //             for(i = 0; i <= answer_counter; i++){
    //                 // Имена инпутов для проверки
    //                 var number = i+1;
    //                 var v_lenght = '#answer_grade' + i;

    //                 // Получаем инфу
    //                 var length = $.trim( $(v_lenght).val() );

    //                 var select_option = $('#answer_grade0 option:selected').text();
    //                 // Check if empty of not
    //                 iif (select_option  === 'Не вибрано') {
    //                     alert('Оцінка '+ number +' пустий.');
    //                     return false;
    //                 } else if(i == answer_counter){
    //                     document.getElementById('test_form').submit();
    //                 }
    //             }
    //         } else {
    //             document.getElementById('test_form').submit();
    //         }

    // }
    
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

<!-- <script>

    //var global_index = 0;
    var currentCounter = 0;
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
            },
            removeNewEntry: function(index){
                currentCounter = currentCounter - 1;
                this.ids.splice(index, 1);
                document.getElementById("counter").value = currentCounter;
            },
            addNewAnswer2: function(index){

                var answer_counter = 'answer_counter' + index;
                //Vue.set(app1.answers, 'answer', 2)
                //console.log(JSON.stringify(this.data))
                console.log(answer_counter);

                this.answers.push({answer_counter: answer_counter});
                console.log(JSON.stringify(this.test));

                tinymce.init({
                    selector: '.question_text'
                });

                document.getElementById(answer_counter).value = answersCounter;
            },
            addNewAnswer: function(index){
                
                var answer_id = '#answers' + index;
                var right_answer_id = '#right_answer' + index;
                var answer_counter = '#answer_counter' + index;

                $(answer_counter).val(parseInt($(answer_counter).val()) + 1);

                console.log(answer_counter);

                $(right_answer_id)
                    .append($("<option></option>")
                                .attr("value",  $(answer_counter).val())
                                .text("Ответ "+ $(answer_counter).val())); 
                //$(right_answer_id).append( "<option value=''>Ответ А</option>" );
                $(answer_id).append( "<div class='col-md-12'><input type='text' class='form-control' name='answer"+index+"[]' placeholder='Введите ответ " + $(answer_counter).val() +"'></div>" );
                
            },
        }
    });


    </script> -->

@endsection


@endsection