@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container container-height">

            @include('layouts.front.includes.admin_sidebar_vrst', [
                'headTitle' => 'Панель Адміна',
                'imgPath' => 'img/teacher-mobileMenu-1.png'
            ])

            <div class="cource-container--mobile">
                <div class="multipleChoice-top-title">
                    <h3 class="multipleChoice-title">Панель Адміна</h3>
                </div>
                <div class="multipleChoice-block newTest-block active">
                </div>
                <div class="multipleChoice-block newTest-block active">
                    <div class="newTest-top active">Вітаю!</div>
                    <div class="newTest-wrapper show">Для управління використовуйте панель зліва.</div>
                </div>
            </div>
        </div>
    </section>
@endsection
