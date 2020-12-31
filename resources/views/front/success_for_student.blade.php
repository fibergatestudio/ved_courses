@extends('layouts.front.front_child')

@section('title')
Курси в процесі
@endsection

@section('header')

@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>Ласкаво просимо!</span></div>
    </div>
    <div class="container">

        <div class="main-menu main-menuWelcome">
            <div class="main-menu_inner main-menu_innerWelcom">
                <a class="main-menu_btn" href="{{ route('student_courses_main') }}"><span>Головна</span></a>
            </div>
            <div class="main-menu_inner main-menu_innerWelcom active">
            <a class="main-menu_btn" href="{{ route('student_courses') }}"><span>Курси в процесі</span></a>
            </div>
            <div class="main-menu_inner main-menu_innerWelcom">
                <a class="main-menu_btn" href="{{ route('student_courses_ended') }}"><span>Пройдені курси</span></a>
            </div>
            <div class="main-menu_inner main-menu_innerWelcom">
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/facebook.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/instagram.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/linkedin.png') }}" alt="img"></a></div>
            </div>
        </div>

        <div class="direction-wrapper">
            <h3  class="main-teachers_title">Перебуває на перевірці</h3>
            @if(count((array)$course_lessons) && $lesson_count)
                <div class="ss__parent-section">
                        <div class="ss__course-title-wrapper">
                            <h3 class="main-teachers_title ss__block-title" id="anchor_program">Програма курсу: що
                                ви
                            вивчите</h3>
                            <a class="ss__hide-btn-style active">Згорнути все
                            </a>
                        </div>
                        <div class="purple-separator"></div>
                        <div class="toggle-section active">

                            @foreach($course_lessons as $lesson)

                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">{{ sprintf("%02d", $loop->iteration) }}</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m">
                                                <a href="{{ route('view_lesson', [$course_info->id, $lesson->id]) }}">{{ $lesson->course_name ?? 'Без назви' }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">
                                            <?php $clear_descr = str_replace("&nbsp;", '', $lesson->course_description); ?> 
                                            {!! strip_tags($clear_descr) !!}
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол</a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">
                                                @if ($lesson->learning_protocol_time)
                                                    {{ $lesson->learning_protocol_time.' хв.' }}
                                                @endif
                                            </div>
                                            @if ($lesson->learning_protocol_time)
                                            <div class="wwl__circle-mark"></div>
                                            @endif
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <span>{{ strip_tags($clear_descr) ?? '' }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">

                                                @if ($course_protocols[$loop->index])
                                                <p class="text-p">
                                                    @if ($course_protocols[$loop->index]->raiting)
                                                    <p class="is-result">
                                                        <span class="ss__test-decoration">Бали за протокол</span>
                                                        <span>{{$course_protocols[$loop->index]->raiting}}</span>
                                                    </p>
                                                    @else
                                                        <p class="no-result">Протокол на перевірці</p>
                                                    @endif
                                                </p>
                                                @else
                                                    @if ($course_protocols[$loop->index] === false)
                                                        <a href="{{ route('protocol.show', ['course_id' => $course_info->id, 'lesson_id' => $lesson->id, 'user_id' => $student_id]) }}">Протокол не заповнено</a>
                                                    @else
                                                        <p>Протокол в занятті відсутній</p>
                                                    @endif
                                                @endif
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    @if($lesson->test_exist == true)
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">
                                                @if(isset($lesson->test_info))
                                                    {{ $lesson->test_info->time_limit }} хв.
                                                @endif
                                            </div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">@if(isset($lesson->test_info))  {{ strip_tags($lesson->test_info->description) }} @endif
                                                    </a>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="results ss__results">
                                            @if(empty($lesson->test_results))
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            @else
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">{{ $lesson->test_results['final_score'] }}</span>/<span
                                                    id="totalAnswers">{{ $lesson->test_results['max_score'] }}</span>)&nbsp;
                                                <span id="percentComplete">{{ $lesson->test_results['completion_percent'] }}%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">{{ $lesson->test_results['final_score'] }}</span>/<span id="testScore">{{ $lesson->test_results['max_score'] }}</span>
                                            </p>
                                            @endif
                                        </div>

                                    </div>
                                    @endif
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

    </div>
</section>
<!--Popular section-->
@include('layouts.front.includes.popular')
<!-- End Popular Section -->
@endsection
