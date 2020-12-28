@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container container-height">

            @include('layouts.front.includes.admin_sidebar_vrst', [
                'headTitle' => 'Панель Вчителя',
                'imgPath' => 'img/teacher-mobileMenu-1.png'
            ])

            <div class="cource-container--mobile">
                <div class="multipleChoice-top-title d-none d-md-block">
                    <h3 class="multipleChoice-title">Панель Вчителя</h3>
                </div>
                <div class="multipleChoice-block newTest-block active">

                </div>
                <div class="multipleChoice-block newTest-block active">
                    <div class="newTest-top active">Вітаю!</div>
                    <div class="newTest-wrapper show">Для управління використовуйте панель <span class="d-none d-md-inline">зліва</span>
                        <span class="d-inline d-md-none">зверху</span>.</div>
                </div>
            </div>
        </div>
    </section>
@endsection
