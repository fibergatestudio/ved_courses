@extends('layouts.front.front_child')

@section('title')
    Увага!
@endsection

@section('header')

@endsection

@section('content')
    <section class="direction">
        <div class="direction-separator">
            <div class="direction-separator_badge"><span>Шановний гість</span></div>
        </div>
        <div class="container">
            <div class="guest-img-wrapper">
                <picture>
                    <source srcset="{{ asset('img/online-learning-small.png') }}" media="(max-width: 768px)">
                    <img src="{{ asset('img/online-learning-small.png') }}" alt="image">
                </picture>
            </div>
            <div class="guest-title-wrapper">
                <div class="guest-title-top">
                    Увага!
                </div>
                <div class="guest-title-bottom">
                    Для того щоб продовжити проходження курсу зареєструйтесь або увійдіть до особистого кабінету.
                </div>
            </div>
            <div class="guest-btn-wrapper">
            <a class="guest-btn guest-btn-back" href="{{ url()->previous() }}"> <span>Назад</span> </a>
                <a class="guest-btn guest-btn-reg" href="{{ route('register') }}"> <span>Зареєструватися</span> </a>
                <a class="guest-btn guest-btn-entrance" href="{{ route('login') }}"> <span>Увійти</span> </a>
            </div>
    </section>

    <section class="popular">
        <div class="direction-separator popular-separator">
            <div class="direction-separator_badge"><span>Найпопулярніші курси</span></div>
        </div>
        <div class="container">
            <div class="popular-wrapper">
                <div class="popular-inner">
                    <div class="popular-inner_top">
                        <img class="popular-inner_img" src="{{ asset('img/popular_1.jpg') }}" alt="img">
                        <a class="image-btn popular-btn" href="##">
                            <span>перейти до курсів</span>
                            <div class="image-btn_arrow"></div>
                        </a>
                    </div>
                    <div class="popular-inner_bottom">
                        <div class="popular-inner_bottom--title">
                            <h4>Довга назва найпопулярнішого курсу</h4>
                        </div>
                    </div>
                </div>
                <div class="popular-inner">
                    <div class="popular-inner_top">
                        <img class="popular-inner_img" src="{{ asset('img/popular_1.jpg') }}" alt="img">
                        <a class="image-btn popular-btn" href="##">
                            <span>перейти до курсів</span>
                            <div class="image-btn_arrow"></div>
                        </a>
                    </div>
                    <div class="popular-inner_bottom">
                        <div class="popular-inner_bottom--title">
                            <h4>Довга назва найпопулярнішого курсу</h4>
                        </div>
                    </div>
                </div>
                <div class="popular-inner">
                    <div class="popular-inner_top">
                        <img class="popular-inner_img" src="{{ asset('img/popular_1.jpg') }}" alt="img">
                        <a class="image-btn popular-btn" href="##">
                            <span>перейти до курсів</span>
                            <div class="image-btn_arrow"></div>
                        </a>
                    </div>
                    <div class="popular-inner_bottom">
                        <div class="popular-inner_bottom--title">
                            <h4>Довга назва найпопулярнішого курсу</h4>
                        </div>
                    </div>
                </div>
                <div class="popular-inner">
                    <div class="popular-inner_top">
                        <img class="popular-inner_img" src="{{ asset('img/popular_1.jpg') }}" alt="img">
                        <a class="image-btn popular-btn" href="##">
                            <span>перейти до курсів</span>
                            <div class="image-btn_arrow"></div>
                        </a>
                    </div>
                    <div class="popular-inner_bottom">
                        <div class="popular-inner_bottom--title">
                            <h4>Довга назва найпопулярнішого курсу</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
