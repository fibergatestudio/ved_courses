@extends('layouts.front.front_child')

@section('title')
    Тест
@endsection

@section('content')
<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
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
            @if (isset($lesson->show_protocol))
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
    <section class="test_a">
        <div class="container">
    <div class="test_a-title test_a-title_doc">{{ $testInfo->name }}</div>
    <div class="test_a-title_bottom">Оберіть одну, або декілька відповідей на задані питання.</div>
       <div class="test_a separator"></div>
       
        <!-- Да\Нет -->
        @if($testTrueFalse != "")
            @foreach($testTrueFalse as $trueFalse)
                <div class="test_a-question">{{ $trueFalse->id }}. {{ $trueFalse->question_name }} {{ strip_tags($trueFalse->question_text) }} </div>            
                <div class="test_a-answer">
                    <div class="answer-wrapper">
                        <div class="answer-radio">
                                <input type="radio" class="answer-radio_input" id="answer_true" name="answer_truefalse" value="1">
                                <label class="answer-radio_label" for="answer_true">Верно</label>
                        </div>
                        <div class="answer-radio">
                                <input type="radio" class="answer-radio_input" id="answer_false" name="answer_truefalse" value="0">
                                <label class="answer-radio_label" for="answer_false">Не верно</label>
                        </div>
                    </div>
                </div>

            @endforeach
        @endif
        <!-- Множественный выбор -->
        @if($testMultiply != "")
            @foreach($testMultiply as $multiply)
                <div class="test_a-question">{{ $multiply->id }}. {{ $multiply->question_name }} {{ strip_tags($multiply->question_text) }} </div>
                <?php $answers_json = json_decode($multiply->answers_json); ?>                
                <div class="test_a-answer">
                    <div class="answer-wrapper">
                        @foreach($answers_json as $answer)
                                <div class="answer-radio">
                                    <input class="answer-radio_input" type="checkbox" id="{{ $answer->answer_comment }}" value="1" name="question_1">
                                    <label class="answer-radio_label" for="{{ $answer->answer_comment }}"><?php echo str_replace("\xc2\xa0",' ',$answer->answer); ?></label>
                                </div>
                        @endforeach
                    </div>
                </div>


            @endforeach
        @endif
        <!-- Претаскивание -->
            <div class="test_b-title_wrapper">
                <div class="test_b-title_left">
                    Перетягуй відповіді в блоки зліва
                </div>
                <div class="test_b-title_right">
                    Ви маєте право на 3 помилки. <span class="test_b-darkText">Залишилась <span>1 </span> помилка.</span>
                </div>
            </div>
            <div class="test_b separator"></div>
            <div class="test_b-grid_wrapper">

                @if($testDragDrop != "")
                    @foreach($testDragDrop as $dragDrop)
                        <?php $dd_answers_json = json_decode($dragDrop->answers_json); ?>   
                        <div class="test_b-grid_inner">
                            <div class="test_b-grid_question">
                                <input type="hidden" id="true_answer{{ $dragDrop->id }}" name="answer{{ $dragDrop->id }}" value="">
                                
                                Lorem <div class="test_b-questionBlock questionBlock-small"><span id="answer{{ $dragDrop->id }}">{{ $dragDrop->id }}</span></div> Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            </div>
                        </div>
                        <div class="test_b-grid_inner">
                            <div id="answers{{ $dragDrop->id }}" class="test_b-grid_answer">
                                <div class="answer-circle"><span>{{ $dragDrop->id }}</span></div>
                                @foreach($dd_answers_json->answers as $asn)
                                    <div class="answer-block"><span>{{ $asn }}</span></div>
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
                                    if(to.el.children.length = 0){
                                        return;
                                    } 
                                }
                            },
                            animation: 100
                            });

                            var answer_el = document.getElementById(answer);
                            Sortable.create(answer_el, {
                            group: {
                                name: answer,
                                put: function(to, from){
                                    var from_id = from.el.id.replace(/\D+/g, '');
                                    var to_id = to.el.id.replace(/\D+/g, '');
                                    if(from_id == to_id){

                                        var true_answer = '#true_answer' + to_id;
                                        $(true_answer).val("test");

                                        console.log(to.el);
                                        return to.el.children.length < 1;
                                    }
                                }
                            },
                            animation: 100
                            });

                        </script>

                        <script>

                        var id = {{ json_encode($dragDrop->id) }};
                        var answer = 'answer' + id;
                        testresponse.push(answer);

                        </script>
                    @endforeach
                @endif
                
            </div>

  <a class="answer-btn btn-watch--more" href="##"><span>Надіслати тест </span></a>


  </div>
</section>
@endsection