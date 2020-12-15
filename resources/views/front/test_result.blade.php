@extends('layouts.front.front_child')

@section('title')
    Результат Теста
@endsection

@section('content')

<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>РЕЗУЛЬТАТИ ТЕСТУ</span></div>
    </div>
    <div class="container">
        <!--<a class="breadcrumbs" href="#">Головна сторінка / Курс / Заняття 01</a>-->
        <ul class="breadcrumbs_list">
            <li class="breadcrumbs_item">
                <a href="{{ route('main') }}" class="breadcrumbs_link">Головна</a>
            </li>
            <li class="breadcrumbs_item">
                <a class="breadcrumbs_link">Результати тесту</a>
            </li>

        </ul>

    </div>
    </section>
    <section class="test_a">
        <form action="" id="course_test_form" method="POST">
        @csrf
        <div class="container">
        <div class="test_a-title test_a-title_doc">Назва тесту</div>
            <div class="test_a-title_bottom">Еще инфа</div>
            <div class="test_a separator"></div>
                    <?php $arr_questions_answers = json_decode($f_test_info->test_questions_json); ?>

                    @foreach($arr_questions_answers as $qa)
                        @if($qa[0]->question_type == 'Правильно/неправильно')
                        <div class="test_a-question">Вопрос {{ $qa[0]->question_id }} {{ $qa[0]->question_type }}</div>
                            <div class="test_a-answer">
                                <div class="answer-wrapper">
                                    Відповів вірно? - {{ $qa[0]->answered_right }}
                                </div>
                            </div>
                        @endif
                        @if($qa[0]->question_type == 'Множинний вибір')
                        <div class="test_a-question">Вопрос {{ $qa[0]->question_id }} {{ $qa[0]->question_type }}</div>
                            <div class="test_a-answer">
                                <div class="answer-wrapper">
                                    Оцінка: {{ $qa[0]->answer_grade }} 
                                </div>
                            </div>
                        @endif
                        @if($qa[0]->question_type == 'Перетягування в тексті')
                        <div class="test_a-question">Вопрос {{ $qa[0]->question_id }} {{ $qa[0]->question_type }}</div>
                            <div class="test_a-answer">
                                <div class="answer-wrapper">
                                    Відповів вірно? - {{ $qa[0]->answered_right }}
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
             <!-- <a class="answer-btn btn-watch--more" href="##" id="test_send"><span>Надіслати тест </span></a -->
        </div>
        </form>
    </section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection 