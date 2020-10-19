@extends('layouts.front.front_child')

@section('title')
Пройдені курси
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
                <a class="main-menu_btn" href="##"><span>Головна</span></a>
            </div>
            <div class="main-menu_inner main-menu_innerWelcom">
                <a class="main-menu_btn" href="{{ route('welcome_page') }}"><span>Курси в процесі</span></a>
            </div>
            <div class="main-menu_inner main-menu_innerWelcom active">
                <a class="main-menu_btn" href="{{ route('welcome2_page') }}"><span>Пройдені курси</span></a>
            </div>
            <div class="main-menu_inner main-menu_innerWelcom">
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/facebook.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/instagram.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/linkedin.png') }}" alt="img"></a></div>
            </div>
        </div>

        <div class="direction-wrapper">
            <div class="direction-inner">
                <div class="direction-inner_top">
                    <img class="direction-inner_img" src="{{ asset('img/direction_1.jpg') }}" alt="img">
                    <a class="image-btn" href="##">
                        <span>Підкатегорії</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="direction-inner_bottom">
                    <div class="direction-inner_bottom--title">
                        <h4>Вивчення <br> іноземних мов</h4>
                    </div>
                    <div class="direction-inner_bottom--text">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printerLorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer
                    </div>
                </div>
            </div>
            <div class="direction-inner">
                <div class="direction-inner_top">
                    <img class="direction-inner_img" src="{{ asset('img/direction_2.jpg') }}" alt="img">
                    <a class="image-btn" href="{{ route('simulator') }}">
                        <span>Підкатегорії</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="direction-inner_bottom">
                    <div class="direction-inner_bottom--title">
                        <h4>Симулятор слідчих <br> дій</h4>
                    </div>
                    <div class="direction-inner_bottom--text">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printerLorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer
                    </div>
                </div>
            </div>
            <div class="direction-inner">
                <div class="direction-inner_top">
                    <img class="direction-inner_img" src="{{ asset('img/direction_3.jpg') }}" alt="img">
                    <a class="image-btn" href="##">
                        <span>Підкатегорії</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="direction-inner_bottom">
                    <div class="direction-inner_bottom--title">
                        <h4>Назва розділу підрозділу</h4>
                    </div>
                    <div class="direction-inner_bottom--text">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printerLorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
