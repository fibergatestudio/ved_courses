<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                @guest
                <div class="alert alert-danger">
                    Незарегистрированым пользователям доступено только 1е занятие
                </div>
                @endguest
                <h3>Занятия Курса № {{ $course_id }}</h3>

                <div class="card-columns">
                    <a href="">
                        <div class="card bg">
                            <div class="card-body text-center">
                            <p class="card-text"><h4>Занятие 1</h4></p>
                            </div>
                        </div>
                    </a>
                    @guest
                    <div class="bg">

                            <div class="card bg">
                                <div class="card-body text-center">
                                <p class="card-text"><h4>Занятие 2</h4></p>
                                </div>
                            </div>

                            <div class="card bg">
                                <div class="card-body text-center">
                                <p class="card-text"><h4>Занятие 3</h4></p>
                                </div>
                            </div>
                    </div> 
                    <div class="text-center">Для достука по всем урокам залогиньтесь</div>
                    @else
                        @if($user_info->status == 'confirmed')<a href="">@endif
                            <div class="card bg">
                                <div class="card-body text-center">
                                <p class="card-text"><h4>Занятие 2</h4></p>
                                </div>
                            </div>
                        @if($user_info->status == 'confirmed')</a>@endif
                        @if($user_info->status == 'confirmed')<a href="">@endif
                            <div class="card bg">
                                <div class="card-body text-center">
                                <p class="card-text"><h4>Занятие 3</h4></p>
                                </div>
                            </div>
                        @if($user_info->status == 'confirmed')</a>@endif
                        @if($user_info->status != 'confirmed')<div class="text-center">Пользователь не подтвержден, доступ к урокам ограничен</div>@endif
                    @endguest
                </div>
                
                <a href="{{ url('/') }}"><button class="btn btn-success text-center">Назад</button></a>
            </div>
        </div>
    </body>
</html>