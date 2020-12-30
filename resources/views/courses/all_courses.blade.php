@extends('layouts.front.front')

@section('title')
    Всі курси
@endsection

@section('header')
    <header class="header">
        <div class="topWhite-layer">
            <div class="container">
                @include('layouts.front.includes.header_menu')
                <div class="header-text">
                    <div class="header-text-top">
                        Virtual education
                    </div>
                    <div class="header-text-middle">
                        Пізнай світ по-новому
                    </div>
                    {{--<a class="header-btn" href="{{ route('simulator') }}">
                        <span>перейти до курсів</span>
                    </a>--}}
                    <a class="header-btn" href="{{ route('all_courses') }}">
                        <span>перейти до курсів</span>
                    </a>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge" id="direction-separator_badge"><span>Тематичні напрямки</span></div>
    </div>
    <div class="container">
        <div class="direction-wrapper">
            
            <!-- Тест вывода курсов -->
            @foreach($courses as $course)
                @if($course->visibility == "all")

                    <a href="{{ route('view_course', $course->id) }}" class="direction-inner d-block">
                        <div class="direction-inner_top">
                            @if($course->course_image_path != "")
                                <img class="direction-inner_img" src="{{url('/images/' . $course->course_image_path)}}" alt="img">
                            @else
                                <img class="direction-inner_img" src="{{ asset('img/direction_3.jpg') }}" alt="img">
                            @endif
                            <span class="image-btn">
                                <span>До курсу</span>
                                <!--<div class="image-btn_arrow"></div>-->
                            </span>
                        </div>
                        <div class="direction-inner_bottom">
                            <div class="direction-inner_bottom--title">
                                <h4> {{ $course->name }}</h4>
                            </div>
                            <div class="direction-inner_bottom--text">
                                {!! Str::limit(strip_tags($course->description), 300, '...') !!}
                            </div>
                        </div>
                    </a>

                @elseif($course->visibility == "register")
                    @if (Auth::check())
                    <a href="{{ route('view_course', $course->id) }}" class="direction-inner d-block">
                        <div class="direction-inner_top">
                            @if($course->course_image_path != "")
                                <img class="direction-inner_img" src="{{url('/images/' . $course->course_image_path)}}" alt="img">
                            @else
                                <img class="direction-inner_img" src="{{ asset('img/direction_3.jpg') }}" alt="img">
                            @endif
                            <span class="image-btn">
                                <span>До курсу</span>
                                <!--<div class="image-btn_arrow"></div>-->
                            </span>
                        </div>
                        <div class="direction-inner_bottom">
                            <div class="direction-inner_bottom--title">
                                <h4> {{ $course->name }}</h4>
                            </div>
                            <div class="direction-inner_bottom--text">
                                {!! Str::limit(strip_tags($course->description), 300, '...') !!}
                            </div>
                        </div>
                    </a>
                    @endif
                @endif
            @endforeach
            <!-- END Тест вывода курсов END -->
        </div>
    </div>
</section>


@endsection
