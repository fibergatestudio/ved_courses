@extends('layouts.front.front_child')

@section('title')
    Тест
@endsection

@section('content')
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
    <div class="test_a-title test_a-title_doc">Довга назва тесту</div>
    <div class="test_a-title_bottom">Оберіть одну, або декілька відповідей на задані питання.</div>
       <div class="test_a separator"></div>
       
        <!-- Да\Нет -->
        @if($testTrueFalse != "")
            @foreach($testTrueFalse as $trueFalse)
                <div class="test_a-question">{{ $trueFalse->id }}. {{ $trueFalse->question_name }} {{ strip_tags($trueFalse->question_text) }} </div>            
                <div class="test_a-answer">
                    <div class="answer-wrapper">
                            <div class="answer-radio">
                                <input class="answer-radio_input" type="checkbox" id="answer_true" value="1" name="answer_true">
                                <label class="answer-radio_label" for="answer_true">Верно</label>
                            </div>
                            <div class="answer-radio">
                                <input class="answer-radio_input" type="checkbox" id="answer_false" value="1" name="answer_false">
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
                                    <label class="answer-radio_label" for="{{ $answer->answer_comment }}"><?php echo  str_replace("\xc2\xa0",' ',$answer->answer); ?></label>
                                </div>
                        @endforeach
                    </div>
                </div>


            @endforeach
        @endif
        <!-- Претаскивание -->
        @if($testDragDrop != "")
            @foreach($testDragDrop as $dragDrop)
                {{!! $dragDrop->question_name !!}} 
            @endforeach
        @endif
        <!-- <div class="test_a-question">1. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an </div>
        <div class="test_a-answer">
            <div class="answer-wrapper">
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_1-1" value="1" name="question_1" checked>
                    <label class="answer-radio_label" for="answer_1-1">а). Lorem Ipsum has been the industry's standard dummy text ever</label>
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_1-2" value="2" name="question_1">
                    <label class="answer-radio_label" for="answer_1-2">б). Lorem Ipsum has been the industry's standard dummy text ever</label>
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_1-3" value="3" name="question_1">
                    <label class="answer-radio_label" for="answer_1-3">в). Lorem Ipsum has been the industry's standard dummy text ever</label>
                </div>
                <div class="answer-radio">
                    <input class="answer-radio_input" type="checkbox" id="answer_1-4" value="4" name="question_1">
                    <label class="answer-radio_label" for="answer_1-4">г). Lorem Ipsum has been the industry's standard dummy text ever</label>
                </div>
            </div>
        </div> -->

  <a class="answer-btn btn-watch--more" href="##"><span>Надіслати тест </span></a>


  </div>
</section>
@endsection
