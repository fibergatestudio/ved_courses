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
                <!-- Да\Нет -->
            
                    <div class="test_a-title_bottom">Еще инфа</div>
                    <div class="test_a separator"></div>
                            <div class="test_a-question">Вопрос</div>
                            <div class="test_a-answer">
                                <div class="answer-wrapper">

                                            <div class="answer-radio">
                                                <input class="answer-radio_input" type="checkbox" id=""
                                                    value="" name="">
                                                <label class="answer-radio_label" for=""></label>
                                            </div>
                                </div>
                            </div>

             <!-- <a class="answer-btn btn-watch--more" href="##" id="test_send"><span>Надіслати тест </span></a -->
        </div>
        </form>
    </section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection 