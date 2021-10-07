@extends('layouts.front.front_child')

@section('content')

<style>

.today{
    background-color: #8a4f9f4f;
    color: #8a4f9f;
}
.table-condensed{
    text-align: center;
}

</style>


 <body>
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            @if(Auth::user()->role == "admin")
                @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])
            @elseif(Auth::user()->role == "teacher")
                @include('layouts.front.includes.teacher_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])
            @endif

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
                                    <input class="course-faq--input courseAdditional--input" id="test_name" name="name" type="text">
                                </div>
                            </div>

                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">
                                        Опис<sup>*</sup>
                                    </div>
                                </div>
                                <div class="courseAdd-inner_right">
                                        <textarea class="tinyMCE-area" id="description" name="description"></textarea>
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
                                <!-- <div class="newTest-dedline-inner">
                                    <a href="##" class="newTest-saveBtn">
                                        <span>
                                            Зберегти
                                        </span>
                                    </a>
                                </div> -->
                            </div>

                            <div class="newTest-timeInstruction">
                                <div class="newTest-timeInstruction-inner">
                                    Коли час спливає
                                </div>
                                <div class="newTest-timeInstruction-inner">
                                    <div class="newTest-timeInstruction-wrapper">
                                    <select class="newTest-timeInstruction-select" name="when_time_is_up">
                                        <option value="1" selected>Відповіді повинні бути відправлені до завершення часу, інакше вони не зарахуються</option>
                                        <option value="2" >Без обмеження в часі</option>
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
                                        <option value="2">Дві спроби</option>
                                        <option value="3">Необмежено</option>
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
                                        <!-- <option value="2">Опция 2</option>
                                        <option value="3">Опция 3</option> -->
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
                                        <option value="0" selected="">Доступні групи</option>
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="newTest-quest_arrowBlock"></div>
                                    </div>
                            </div>

                        </div>


                    </div>
                </div>

                <!-- onclick="document.getElementById('create_test_form').submit();" -->
                <div class="addquestion-btn_wrapper">
                    <a class="addquestion-btn" onclick="submitForm();" ><span style="color:white;">Додати питання</span></a>
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
                                                <a href="##" data-dismiss="modal" class="questionType-btn-delete"><span>Скасувати</span></a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.uk.min.js" integrity="sha512-zj4XeRYWp+L81MSZ3vFuy6onVEgypIi1Ntv1YAA6ThjX4fRhEtW7x+ppVnbugFttWDFe/9qBVdeWRdv9betzqQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
    
    function submitForm(){

        // Получаем инфу
        var name = $.trim( $('#test_name').val() );

        // var myContent = tinymce.activeEditor.getContent();
        var description = tinymce.get('description').getContent();
        //alert(myContent);

        if (name  === '') {
            alert('Введіть назву тесту!');
            return false;
        } else if(description == ""){
            alert('Введіть опис тесту!');
            return false;
        } else {
            //document.getElementById('create_course').submit();
           // $( "#edit_course_form" ).submit();
            //$( "#create_test_form" ).submit();
            $('#questionType').modal('toggle');
           // document.getElementById('create_test_form').submit()
        }

    }
    
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
                beforeShow: function(input, inst) {
                    inst.dpDiv.css({
                        marginTop: 60 + 'px', 
                        marginLeft: 60 + 'px'
                    });
                },
                weekStart: 1,
                minDate: new Date(),
                startDate: new Date(),
                daysOfWeekHighlighted: "6,0",
                todayHighlight: true,
                language: 'uk',
                autoclose: true,
                timepicker: true,
                datepicker: true,
                format: 'dd/mm/yyyy',
                        });

        /* $.fn.datetimepicker.dates['en'] = {
            days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
            months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "Декабрь"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            today: "Today"
        }; */
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


@endsection


@endsection
