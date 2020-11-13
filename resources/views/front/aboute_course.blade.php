@extends('layouts.front.front_child')

@section('title')
    Про курс
@endsection

@section('header')

@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>{{ $course->name }}</span></div>
    </div>
    <div class="container">
        <!--<a class="breadcrumbs" href="#">Головна сторінка / Курс назва</a> -->
        <ul class="breadcrumbs_list">
            <li class="breadcrumbs_item">
                <a href="{{route('main')}}" class="breadcrumbs_link">Головна</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ route('view_course', $course->id) }}" class="breadcrumbs_link">{{ $course->name }}</a>
            </li>
        </ul>


        <div class="main-menu">
            <div class="main-menu_inner active">
                <a class="main-menu_btn" href="{{ route('view_course', $course->id) }}"><span>Про курс</span></a>
            </div>
            <div class="main-menu_inner ">
                <a class="main-menu_btn" href="{{ route('view_course', [$course->id, 'teachers']) }}"><span>Викладачі</span></a>
            </div>
            <div class="main-menu_inner">
                <a class="main-menu_btn" href="{{ route('view_course', [$course->id, 'program']) }}"><span>Програма курсу</span></a>
            </div>
            <div class="main-menu_inner">
                <a class="main-menu_btn" href="{{ route('view_course', [$course->id, 'faq']) }}"><span>Поширені запитання</span></a>
            </div>
            <div class="main-menu_inner">
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/facebook.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/instagram.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/linkedin.png') }}" alt="img"></a></div>
            </div>
        </div>
        <h4 class="main-title_middle" id="anchor_course">Про цей курс</h4>
        <div class="main-textblock">
            {!! $course_information->course_description ?? 'Немає опису курсу' !!}
        </div>
        @isset($course_information->course_learn_arr)
        <div class="main-learn">
            <h4 class="main-learn_title">Чого ви навчитесь</h4>

            <div class="about-course_wrapper main-learn_wrapper">

                    @foreach (collect(json_decode($course_information->course_learn_arr)) as $item)
                    <div class="main-learn_inner">
                        <div class="main-learn_inner--icon"></div>
                        <div class="main-learn_inner--text">{!! $item !!}</div>
                    </div>
                    @endforeach
            </div>
        </div>
        @endisset
    </div>
</section>
@endsection
