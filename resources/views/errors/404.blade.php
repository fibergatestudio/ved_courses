@extends('layouts.front.front_child')

@section('title')
    404
@endsection

@section('content')
    <section class="courseControl  f0f">
        <div class="courseControl-separator direction-separator ">
        </div>
        <div class="courseControl-container sticky-container container  f0f mt-6">

            <div class="f0f__wrapper">
                <div class="f0f__content">
                    <div class="f0f__desc">
                    <h1 class="f0f__title">Упс, сторінки не знайдено!</h1>
                        <p class="f0f__text">Ви знаходитесь тут тому, що запитувана сторінка не існує або була
                            переміщена за іншою адресою.
                        </p>
                        @guest
                            <div class="f0f__btns">
                                <a class="flexTable-btn_edit groups-edit__back-to-groups sc__student-edit f0f__to-main-page"
                                    href="{{ URL::to('/') }}"><span>На головну
                                    </span>
                                </a>
                                <a class="flexTable-btn_edit sc__student-success-btn f0f__reg-login" href="{{ route('login') }}">Зареєструватися /
                                    Увійти
                                </a>
                            </div>
                        @endguest

                        @auth
                            @if( Auth::user()->role == "admin")
                                <div class="f0f__btns">
                                    <a class="flexTable-btn_edit sc__student-success-btn f0f__reg-login f0fa__back-to-sp" href="{{ route('admin_panel') }}">Повернутись
                                        на панель
                                        керування
                                    </a>
                                </div>
                            @endif

                            @if( Auth::user()->role == "teacher")
                                <div class="f0f__btns">
                                    <a class="flexTable-btn_edit sc__student-success-btn f0f__reg-login f0fa__back-to-sp" href="{{ route('teacher_panel') }}">Повернутись
                                        на панель
                                        керування
                                    </a>
                                </div>
                            @endif

                            @if( Auth::user()->role == "student")
                                <div class="f0f__btns">
                                    <a class="flexTable-btn_edit sc__student-success-btn f0f__reg-login f0fa__back-to-sp" href="{{ route('home') }}">Повернутись
                                        на панель
                                        керування
                                    </a>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="f0f__img"></div>
            </div>
        </div>
    </section>
@endsection
