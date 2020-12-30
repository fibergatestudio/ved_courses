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

    <section class="courseControl">
        @if(session()->has('message_success'))
            <div class="alert alert-success">
                {{ session()->get('message_success') }}
            </div>
        @endif
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])

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
                    <div class="newTest-block active">
                        <div class="newTest-top active">
                            Загальне
                        </div>
                        <div class="newTest-wrapper show" style="background-color:unset;">

                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">
                                        Назва<sup>*</sup>
                                    </div>
                                </div>
                                <div class="courseAdd-inner_right">
                                    <input class="course-faq--input courseAdditional--input" name="name" type="text" value="{{ $test_view_info->name }}">
                                </div>
                            </div>

                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">
                                        Опис<sup>*</sup>
                                    </div>
                                </div>
                                <div class="courseAdd-inner_right">
                                        <textarea class="tinyMCE-area" name="description">{{ $test_view_info->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="newTest-block active" style="background-color:unset;">
                        <div class="newTest-top active">
                            Вибір часу
                        </div>
                        <div class="newTest-wrapper show">

                            <div class="newTest-date-inner">
                                <div class="newTest-date-item">Початок
                                </div>
                                <div class="newTest-date-item">
                                    <input type="text" name="start_date_time" class="datepicker form-control date-input-restyling" value="{{ $test_view_info->start_date_time }}">
                                </div>
                            </div>

                            <div class="newTest-date-inner">
                                <div class="newTest-date-item">Завершити
                                </div>
                                <div class="newTest-date-item">
                                    <input type="text" name="end_date_time" class="datepicker form-control date-input-restyling" value="{{ $test_view_info->end_date_time }}">
                                </div>
                            </div>

                            <div class="newTest-dedline">
                                <div class="newTest-dedline-inner">
                                    Обмеження в часі
                                </div>
                                <div class="newTest-dedline-inner">
                                    <input class="newTest-dedline-input_left" type="number" name="time_limit" placeholder="0" value="{{ $test_view_info->time_limit }}">
                                    <input class="newTest-dedline-input_right" type="text" placeholder="хвилин(а)">
                                </div>
                            </div>

                            <div class="newTest-timeInstruction">
                                <div class="newTest-timeInstruction-inner">
                                    Коли час спливає
                                </div>
                                <div class="newTest-timeInstruction-inner">
                                    <div class="newTest-timeInstruction-wrapper">
                                    <select class="newTest-timeInstruction-select" name="when_time_is_up">
                                        <option value="1" @if($test_view_info->when_time_is_up == 1) selected @endif>Відповіді повинні бути відправлені до завершення часу, інакше вони не зарахуються</option>
                                        <option value="2" @if($test_view_info->when_time_is_up == 2) selected @endif>Без обмеження в часі</option>
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
                                    <input class="newTest-mark-input" type="number" name="passing_score" placeholder="0" value="{{ $test_view_info->passing_score }}">
                                </div>
                        </div>
                        <div class="newTest-mark-string">
                            <div class="newTest-mark-inner_left">
                                Дозволено спроб
                            </div>
                            <div class="newTest-mark-inner_right">
                                <div class="newTest-mark-wrapper">
                                    <select class="newTest-mark-select" name="available_attempts" >
                                        <option value="1" @if($test_view_info->available_attempts == 1) selected @endif>Одна спроба</option>
                                        <option value="2" @if($test_view_info->available_attempts == 2) selected @endif>Перша спроба</option>
                                        <option value="3" @if($test_view_info->available_attempts == 3) selected @endif>Остання спроба</option>
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
                                        <option value="1" @if($test_view_info->assessment_method == 1) selected @endif>Краща оцінка</option>
                                        <option value="2" @if($test_view_info->assessment_method == 2) selected @endif>Середня оцінка</option>
                                        <option value="3" @if($test_view_info->assessment_method == 3) selected @endif>Незадовiльнa оцінка</option>
                                    </select>
                                    <div class="newTest-mark_arrowBlock"></div>
                                    </div>
                            </div>

                        </div>


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
                                        <option value="1" @if($test_view_info->availability == 1) selected @endif>Показати на сторінці курсу</option>
                                        <!-- <option value="2" @if($test_view_info->availability == 2) selected @endif>Опция 2</option>
                                        <option value="3" @if($test_view_info->availability == 3) selected @endif>Опция 3</option> -->
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
                                            <option value="{{ $group->id }}" @if($test_view_info->operating_mode == $group->id ) selected @endif>{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="newTest-quest_arrowBlock"></div>
                                    </div>
                            </div>

                        </div>


                    </div>
                </div>

                    <!-- <div class="editing-string-bottom">
                        Всього балів :<span>69.00</span>
                    </div> -->

                    <div class="editing-block">
                        <div class="editing-wrapper">
                            <?php $q_count = 1; ?>
                            @foreach($test_question_answers as $test)

                                {{-- <td>{{ $test->id }}</td>
                                <td>{{ $test->question_type }}</td> --}}

                                <div class="editing-textarea_wrapper">
                                    <div class="editing-textarea_inner">
                                        <div class="editing-textarea_num">{{ $q_count }}</div>
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
                                                <a href="{{ route('edit_test_question', ['test_info_id' => $test_info_id, 'test_question_id' => $test->id ]) }}">
                                                    <img src="/img/pencil-edit-icon.png" alt="icon">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $q_count++; ?>
                            @endforeach

                            {{-- href="{{ route('question_type',['test_info_id'=>$test_info_id]) }}"  --}}
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
                                                <div class="questionType-menu_dot"></div>
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
                                                <div class="questionType-menu_dot"></div>
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
            </div>
        </div>
    </section>
@endsection

@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
        // $('.datepicker').datepicker({
        //         weekStart: 1,
        //         daysOfWeekHighlighted: "6,0",
        //         autoclose: true,
        //         timepicker: true,
        //         datepicker: true,
        //         format: 'dd/mm/yyyy',
        //                 });
        $('.datepicker').datepicker({
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
@endsection



