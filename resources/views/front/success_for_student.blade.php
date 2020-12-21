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
        </div>

    </div>
</section>
<!--Popular section-->
@include('layouts.front.includes.popular')
<!-- End Popular Section -->
@endsection
