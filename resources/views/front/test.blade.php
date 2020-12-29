@extends('layouts.front.front_child')

@section('title')
    Тест
@endsection

@section('content')
<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>{{ $lesson->course_name ?? 'Без назви' }}</span></div>
    </div>
    <div class="container">
        <!--<a class="breadcrumbs" href="#">Головна сторінка / Курс / Заняття 01</a>-->
        <ul class="breadcrumbs_list">
            <li class="breadcrumbs_item">
                <a href="{{ route('main') }}" class="breadcrumbs_link">Головна</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ route('view_course', $course->id) }}" class="breadcrumbs_link">{{ $course->name }}</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ route('view_lesson', [$course->id, $lesson->id]) }}" class="breadcrumbs_link breadcrumbs_active">{{ $lesson->course_name ?? 'Без назви' }}</a>
            </li>

        </ul>

        <div class="string-menu_wrapper">
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id]) }}"><span>Як це працює</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'video']) }}"><span>Відеолекція</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'model']) }}"><span>3D модель</span></a>
            </div>
            @if (isset($lesson->show_protocol) && $lesson->show_protocol == 1)
                <div class="string-menu_inner">
                    <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'protocol']) }}"><span>Протокол</span></a>
                </div>
            @endif
            <div class="string-menu_inner">
                <a class="string-menu_btn active" href="{{ route('view_lesson', [$course->id, $lesson->id, 'test']) }}"><span>Завдання</span></a>
            </div>

            @include('layouts.front.includes.nextprevlesson')

        </div>

    </div>
    </section>
    @if(isset($testInfo->id))
        @if( $testInfo->test_access == true)
        <?php $n_answers = 1; ?>

        <section class="test_a">
            <form action="{{ route('send_test', ['course_id' => $course->id, 'lesson_id' => $lesson->id, 'test_id' => $testInfo->id ]) }}" id="course_test_form" method="POST">
            @csrf
            <div class="container">
            @if(isset($testInfo))
                @if($testInfo->expired_tries == true)
                    <div class="alert alert-danger">
                        <b>Увага!</b> Тест не буде зарахований, ви витратили <b>максимальну</b> кількість спроб!
                    </div>
                @endif
                @if($testInfo->expired_time == true)
                    <div class="alert alert-danger">
                        <b>Увага!</b> Тест не буде зарахований, ви витратили <b>весь дозволенний час</b>!
                    </div>
                @endif
            @endif
            <!-- <a href=""><button class="btn btn-success m-3 text-center">Почати тест</button></a> -->
            <div class="test_a-title test_a-title_doc">@if(isset($testInfo)) {{ $testInfo->name }} @endif</div>
                    <!-- Да\Нет -->
                    @if(isset($testInfo))
                        @if(count($testTrueFalse) >= 1)
                        <div class="test_a-title_bottom">Оберіть одну відповь.</div>
                        <div class="test_a separator"></div>
                            @foreach($testTrueFalse as $trueFalse)
                                <div class="test_a-question">{{ $n_answers }}. {{ strip_tags($trueFalse->question_text) }} </div>
                                <div class="test_a-answer">
                                    <div class="answer-wrapper">
                                        <input type="hidden" name="true_false_id[]" value="{{ $trueFalse->id }}">
                                        <div class="answer-radio">
                                                <input type="radio" class="answer-radio_input" id="answer_true" name="answer_truefalse[]" value="1">
                                                <label class="answer-radio_label" for="answer_true">Вірно</label>
                                        </div>
                                        <div class="answer-radio">
                                                <input type="radio" class="answer-radio_input" id="answer_false" name="answer_truefalse[]" value="0">
                                                <label class="answer-radio_label" for="answer_false">Не вірно</label>
                                        </div>
                                    </div>
                                </div>
                            <?php $n_answers++; ?>
                            @endforeach
                        @endif
                        <!-- Множественный выбор -->
                        @if(count($testMultiply) >= 1)
                        <div class="test_a-title_bottom">Оберіть одну, або декілька відповідей на задані питання.</div>
                        <div class="test_a separator"></div>
                            @foreach($testMultiply as $multiply)
                                <div class="test_a-question">{{ $n_answers }}. {{ strip_tags($multiply->question_text) }} </div>
                                <?php $answers_json = json_decode($multiply->answers_json); ?>
                                <div class="test_a-answer">
                                    <div class="answer-wrapper">
                                        <input type="hidden" name="multiply_id[]" value="{{ $multiply->id }}">
                                        <?php $answer_number = 0; ?>
                                        @foreach($answers_json as $answer)
                                                <div class="answer-radio">
                                                    <input class="answer-radio_input" type="checkbox" id="{{ $answer->answer }}{{ $answer_number }}"
                                                        value="{{ $answer->answer }}" name="question_{{ $multiply->id }}[]">
                                                    <label class="answer-radio_label" for="{{ $answer->answer }}{{ $answer_number }}"><?php echo str_replace("\xc2\xa0",' ',$answer->answer); ?></label>
                                                </div>
                                                <?php $answer_number++; ?>
                                        @endforeach
                                    </div>
                                </div>

                                <?php $n_answers++; ?>
                            @endforeach
                        @endif
                        <!-- Претаскивание -->
                            <!-- <div class="test_b-title_wrapper">
                                <div class="test_b-title_left">
                                    Перетягуй відповіді в блоки зліва
                                </div>
                                <div class="test_b-title_right">
                                    Ви маєте право на 3 помилки. <span class="test_b-darkText">Залишилась <span>1 </span> помилка.</span>
                                </div>
                            </div>
                            <div class="test_b separator"></div>
                            <div class="test_b-grid_wrapper"> -->
                                @if(count($testDragDrop) >= 1)
                                <div class="test_b-title_wrapper">
                                    <div class="test_b-title_left">
                                        Перетягуй відповіді в блоки зліва
                                    </div>
                                    <div class="test_b-title_right">
                                        <!-- Ви маєте право на 3 помилки. <span class="test_b-darkText">Залишилась <span>1 </span> помилка.</span> -->
                                    </div>
                                </div>
                                <div class="test_b separator"></div>
                                
                                    <?php $dd_counter = 1;
                                        $total_quest_counter = 1;
                                    ?>
                                    @foreach($testDragDrop as $dragDrop)
                                    <div class="test_b-grid_wrapper" style="display:flex;">
                                        <?php 
                                        $dd_answers_json = json_decode($dragDrop->answers_json);

                                        $text_fields = [];
                                        $fixed_test_fields = [];
                                        //dd($dd_answers_json);
                                        preg_match_all('/(.*?)(\[\[.*?\]\]|$)/', strip_tags($dd_answers_json->question), $text_fields);
                                        foreach($text_fields[0] as $text_field){
                                            $text_field = preg_replace('/\[\[([^\]]+)\]\]/', '', $text_field);
                                            array_push($fixed_test_fields, $text_field);
                                        }
                                        //dd($fixed_test_fields);

                                        $answer_fields = [];
                                        preg_match_all('/\[\[(.*?)\]\]/', $dd_answers_json->question, $answer_fields);


                                        $answ_curr_c = 0;
                                        $test = 0;
                                        ?>
                                        
                                        <div class="test_b-grid_inner" style="width: 70%;">
                                            <div class="test_b-grid_question">
                                                <input type="hidden" name="drag_drop_id[]" value="{{ $dragDrop->id }}">
                                                <input type="hidden" name="test_answers_count{{ $dragDrop->id }}" value="{{ count($answer_fields[1]) }}">
                                                <!-- <input type="hidden" id="true_answer{{ $dragDrop->id }}" name="answer_dragdrop[]" value=""> -->

                                                <!-- <div class="test_b-questionBlock questionBlock-small" style="width:auto;">
                                                    <span id="answer{{ $dragDrop->id }}">{{ $dd_counter }}</span>
                                                </div>  -->

                                                <input type="hidden" id="q_count" name="q_count{{ $dragDrop->id }}" value="<?php echo count($answer_fields[1]); ?>">
                                                    <?php
                                                    $ng_test_value = 1;
                                                    foreach($answer_fields[1] as $answ_field){ 
                                                        echo $fixed_test_fields[$answ_curr_c]; ?>
                                                        <input type="hidden" id="true_answer{{ $dragDrop->id }}<?php echo $ng_test_value; ?>" name="answer_dragdrop{{ $dragDrop->id }}[]" value="">
                                                        <div class="test_b-questionBlock questionBlock-small" style="width:auto; min-width:90px; min-height:40px;">
                                                            <span id="answer{{ $dragDrop->id }}<?php echo $ng_test_value; //echo $answ_field; ?>"><?php echo $total_quest_counter; ?></span>
                                                        </div> 
                                                        <?php 
                                                        $ng_test_value++;
                                                        $answ_curr_c++; 
                                                        $total_quest_counter++;
                                                    } ?>
                                                <?php //var_dump(count($answer_fields[1]), $answ_curr_c, count($fixed_test_fields)); 
                                                    if(count($answer_fields[1]) == $answ_curr_c){
                                                        echo $fixed_test_fields[$answ_curr_c++];// . ".";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="test_b-grid_inner" style="width: 30%;">
                                            <div id="answers{{ $dragDrop->id }}" class="test_b-grid_answer" style="display: grid;">
                                                <div class="answer-circle"><span>{{ $dd_counter }}</span></div>
                                                @foreach($dd_answers_json->answers as $answer)
                                                        
                                                        <span class="answer-block" style="line-height: 1.6;">
                                                            <input type="hidden" class="answer_id" name="answer_id[]" value="<?php echo $answer; ?>">
                                                            {{ $answer }}
                                                        </span>
                                                    
                                                @endforeach
                                            </div>
                                        </div>
                                        <script>

                                            var id = {{ json_encode($dragDrop->id) }};
                                            var answer = 'answer' + id;
                                            var answers = 'answers' + id;

                                            var answers_el = document.getElementById(answers);
                                            var sortable = Sortable.create(answers_el, {
                                            group: {
                                                name: answers,
                                                put: answer,
                                                pull: function (to, from) {
                                                    if(to.el.children.length = 1){
                                                        return;
                                                    }
                                                }
                                            },
                                            animation: 100
                                            });
                                            //$(document).ready(function(){
                                                var ans_count = document.getElementById('q_count').value;
                                                var ans_current_count = 0;
                                                for (i = 0; i < ans_count; i++) {
                                                    ans_current_count++;
                                                    var answer_i = 'answer'+id+ans_current_count;
                                                    console.log(answer_i, id );
                                                    var answer_el = document.getElementById(answer_i);
                                                    Sortable.create(answer_el, {
                                                    group: {
                                                        name: answer,
                                                        put: function(to, from){
                                                            var from_id = from.el.id.replace(/\D+/g, '');
                                                            var to_id = to.el.id.replace(/\D+/g, '');
                                                            // Спилитим число
                                                            var to_id_split = to_id.split('');
                                                            
                                                            console.log(from_id, to_id_split[0]);
                                                            //console.log(answer_el);
                                                            if(from_id == to_id_split[0]){
                                                                var true_answer = '#true_answer' + to_id;
                                                                console.log(true_answer);
                                                                setTimeout(function(){
                                                                    var new_passed_el = to.el.getElementsByClassName('answer_id').item(0).value;

                                                                    $(true_answer).val(new_passed_el);

                                                                }, 100);


                                                                return to.el.children.length < 1;
                                                            } 
                                                        }
                                                    },
                                                    animation: 100
                                                    });
                                                }
                                            //});

                                            // var answer_el = document.getElementById("answer1");
                                            // Sortable.create(answer_el, {
                                            // group: {
                                            //     name: answer,
                                            //     put: function(to, from){
                                            //         var from_id = from.el.id.replace(/\D+/g, '');
                                            //         var to_id = to.el.id.replace(/\D+/g, '');
                                            //         console.log(from_id, to_id);
                                            //         console.log(answer_el);
                                            //         console.log(ans_count);
                                            //         if(from_id == to_id){

                                            //             var true_answer = '#true_answer' + to_id;
                                            //            /* console.log(true_answer);
                                            //             console.log(to.el); */
                                                        

                                            //             /* var answer_id = '#answer' + id;
                                            //             var test = $(answer_id).find("input").val(); */

                                            //             setTimeout(function(){
                                            //                 var new_passed_el = to.el.getElementsByClassName('answer_id').item(0).value;
                                            //                 //console.log(new_passed_el);
                                            //                 //var passed_answer = answer_el.getElementsByClassName('answer_id').item(0).value;
                                            //                 //console.log(passed_answer);

                                            //                 $(true_answer).val(new_passed_el);

                                            //             }, 300);


                                            //             return to.el.children.length < 1;
                                            //         }
                                            //     }
                                            // },
                                            // animation: 100
                                            // });


                                        </script>

                                        <script>

                                        var id = {{ json_encode($dragDrop->id) }};
                                        var answer = 'answer' + id;
                                        /* testresponse.push(answer);*/

                                        </script>
                                        <?php $dd_counter++; ?>
                                        <?php $n_answers++; ?>
                                    </div>
                                    @endforeach
                                @endif

                            <!-- </div> -->
                        @endif

                <a class="answer-btn btn-watch--more" href="##" id="test_send"><span>Надіслати тест </span></a>
        @else
                <div class="container">
                    <div class="string-text">
                        Завдання недоступні
                    </div>
                </div>
        @endif
    @else
        <div class="container">
            <div class="string-text">
                Завдання відсутні
            </div>
        </div>
    @endif

        </div>
        </form>
    </section>



<script>

    $('#test_send').click(function(){
        $('#course_test_form').submit();
    });

</script>
@endsection
