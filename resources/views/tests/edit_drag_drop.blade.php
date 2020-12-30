@extends('layouts.front.front_child')

@section('content')
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
                <form action="{{ route('edit_test_question_apply', ['test_info_id' => $test_info_id, 'test_question_id' => $test_question_id ]) }}" id="drag_drop_form" method="POST" >
                    @csrf
                    <div class="multipleChoice-top-title">
                        <h3 class="multipleChoice-title">(Ред) Перетягування в тексті</h3>
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
                                        type="text" placeholder="Приклад: Питання 1, або 1" value="{{ $t_question_info->question_name }}">
                                </div>
                            </div>

                            <div class="multipleChoice-inner multipleChoice-inner_align">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                        Текст питання<sup>*</sup>
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                        <textarea class="tinyMCE-area" name="question_text">{{ $t_question_info->question_text }}</textarea>
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
                                        type="number" placeholder="1" value="{{ $t_question_info->default_score }}">
                                </div>
                            </div>

                            <div class="multipleChoice-inner multipleChoice-inner_align">
                                <div class="multipleChoice-inner_left">
                                    <div class="multipleChoice_left--name">
                                        Коментар до всього тексту
                                    </div>
                                </div>
                                <div class="multipleChoice-inner_right">
                                        <textarea class="tinyMCE-area" name="test_comment">{{ $t_question_info->test_comment }}</textarea>
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
                                Варіанти відповідей 
                            </div>
                            <?php $answer_arr = json_decode($t_question_info->answers_json);  ?>
                            <input type="hidden" id="answers_counter" name="answers_counter" value="{{ count($answer_arr->answers) }}">
                            <div id="app1">
                                <div v-for="(id,index) in ids" >
                                <div v-if="index === 0">

                                </div>
                                <div v-else>
                                    <div class="question-dragDrop-string">
                                        <div class="question-dragDrop-string_left">
                                            Відповідь  [[@{{ index }}]]
                                        </div>
                                        <div class="question-dragDrop-string_right">
                                            <input class="courseAdditional--input question-dragDrop--input" type="text" :id="'answer'+index" :name="'answer'+index"
                                                placeholder="Розгорнутий варіант відповіді">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                            <!-- <div class="question-dragDrop-string">
                                <div class="question-dragDrop-string_left">
                                    Вірна відповідь
                                </div>
                                <div class="question-dragDrop-string_right">
                                    <div class="newTest-quest-wrapper">
                                        <select class="newTest-quest-select" id="right_answer" name="right_answer"> 
                                            <option default>Выберите верный ответ</option>
                                        </select>
                                        <div class="newTest-quest_arrowBlock"></div>
                                    </div>

                                </div>
                            </div> -->

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
        $( document ).ready(function() {
            var q_count = $('#answers_counter').val();
            console.log(q_count);
            var i;

            const answerArr = [];
            const commentArr = [];

            @foreach($answer_arr->answers as $answ)
                answerArr.push('{!! $answ !!}');
            @endforeach

            console.log(answerArr);
            for (i = 0; i < q_count; i++) {
                app1.addNewEntryWithText(answerArr[i]);
            }

        });
    </script>

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
                    document.getElementById("answers_counter").value = currentCounter - 1;

                    var t_currentcounter = currentCounter - 1;
                    //var right_answer_id = '#right_answer' + index;
                    //$('#right_answer')
                        //.append($("<option></option>")
                                    //.attr("value",  t_currentcounter)
                                    //.text("Відповідь "+ t_currentcounter ) ); 
                },
                addNewEntryWithText(answer){
                    var answer_id = '#answer' + currentCounter;

                    setTimeout(function(){ 
                        $(answer_id).val(answer);

                    }, 100);
                    $('#right_answer')
                        .append($("<option></option>")
                                    .attr("value",  currentCounter)
                                    .text("Відповідь "+ currentCounter ) ); 

                    currentCounter = currentCounter + 1;
                    this.ids.push({id: currentCounter});
                    $('#answer_counter').val(currentCounter);
                }
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