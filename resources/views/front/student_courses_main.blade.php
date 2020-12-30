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
            <div class="main-menu_inner main-menu_innerWelcom  active">
                <a class="main-menu_btn" href="{{ route('student_courses_main') }}"><span>Головна</span></a>
            </div>
            <div class="main-menu_inner main-menu_innerWelcom">
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
            @foreach($courses as $course)
                @if($course->visibility == "all")
                    <div class="direction-inner">
                        <div class="direction-inner_top">
                            @if($course->course_image_path != "")
                                <img class="direction-inner_img" style="width: 357px; height: 233px;" src="{{url('/images/' . $course->course_image_path)}}" height="233" width="357" alt="img">
                            @else
                                <img class="direction-inner_img" style="width: 357px; height: 233px;" src="{{ asset('img/direction_3.jpg') }}" alt="img">
                            @endif
                            <a class="image-btn" href="{{ route('view_course', $course->id) }}">
                                <span>До курсу</span>
                                <!--<div class="image-btn_arrow"></div>-->
                            </a>
                        </div>
                        <div class="direction-inner_bottom">
                            <div class="direction-inner_bottom--title">
                                <h4> {{ $course->name }}</h4>
                            </div>
                            <div class="direction-inner_bottom--text">
                                {!! Str::limit(strip_tags($course->description), 300, '...') !!}
                            </div>
                        </div>
                    </div>

                @elseif($course->visibility == "register")
                    @if (Auth::check())
                    <div class="direction-inner">
                        <div class="direction-inner_top">
                            @if($course->course_image_path != "")
                                <img class="direction-inner_img" style="width: 357px; height: 233px;" src="{{url('/images/' . $course->course_image_path)}}" height="233" width="357" alt="img">
                            @else
                                <img class="direction-inner_img" style="width: 357px; height: 233px;" src="{{ asset('img/direction_3.jpg') }}" alt="img">
                            @endif
                            <a class="image-btn" href="{{ route('view_course', $course->id) }}">
                                <span>До курсу</span>
                                <!--<div class="image-btn_arrow"></div>-->
                            </a>
                        </div>
                        <div class="direction-inner_bottom">
                            <div class="direction-inner_bottom--title">
                                <h4> {{ $course->name }}</h4>
                            </div>
                            <div class="direction-inner_bottom--text">
                                {!! Str::limit(strip_tags($course->description), 300, '...') !!}
                            </div>
                        </div>
                    </div>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</section>
<!--Popular section-->
@include('layouts.front.includes.popular')
<!-- End Popular Section -->
@endsection
