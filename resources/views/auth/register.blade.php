@extends('layouts.front.sign')

@section('content')
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="POST" action="{{ route('register') }}">
            @csrf
        <!-- <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> -->
        <div class="modal-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <a href="{{ route('main')}}">
                    <img class="entrance-logo" src="{{ asset('img/entrance-logo.svg') }}" alt="logo">
                </a>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" role="tab" aria-controls="home"
                        aria-selected="true">Увійти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Зареєструватися</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="entrance-wrapper">
                        <h3 class="entrance-title">Зареєструватися за допомогою </h3>
                        <div class="entrance-social">
                            <div class="entrance-social_item">
                                <a href="{{ route('login.social', ['provider' => 'google', 'signup' => 'signup']) }}">
                                    <picture>
                                        <source srcset="{{ asset('img/login-google-small.png') }}"
                                            media="(max-width:768px"> <img class="entrance-social_image"
                                            src="{{ asset('img/login-google.png') }}" alt="img">
                                </a></picture>
                            </div>
                            <div class="entrance-social_item">
                                <a href="{{ route('login.social', ['provider' => 'facebook', 'signup' => 'signup']) }}">
                                    <picture>
                                        <source srcset="{{ asset('img/login-facebook-small.png') }}"
                                            media="(max-width:768px"> <img class="entrance-social_image"
                                            src="{{ asset('img/login-facebook.png') }}" alt="img">
                                </a></picture>
                            </div>
                            <!--<div class="entrance-social_item">
                                <a href="##">
                                    <picture>
                                        <source srcset="{{ asset('img/login-instagram-small.pn') }}g"
                                            media="(max-width:768px"> <img class="entrance-social_image"
                                            src="{{ asset('img/login-instagram.png') }}" alt="img">
                                </a></picture>
                            </div>
                            <div class="entrance-social_item">
                                <a href="##">
                                    <picture>
                                        <source srcset="{{ asset('img/login-mono-small.png') }}"
                                            media="(max-width:768px"> <img class="entrance-social_image"
                                            src="{{ asset('img/login-mono.png') }}" alt="img">
                                </a></picture>
                            </div>
                            <div class="entrance-social_item">
                                <a href="##">
                                    <picture>
                                        <source srcset="{{ asset('img/login-privatebank-small.png') }}"
                                            media="(max-width:768px"> <img class="entrance-social_image"
                                            src="{{ asset('img/login-privatebank.png') }}" alt="img">
                                </a></picture>
                            </div>-->
                        </div>
                        <div class="entrance-separator"></div>
                        <p>або</p>

                        <label for="surname" class="entrance-label">Прізвище</label>
                        <input id="surname" type="text" class="entrance-input capitalize-letter @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" placeholder="Іванов" required autocomplete="surname" autofocus>
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="name" class="entrance-label">Ім'я</label>
                        <input id="name" type="text" class="entrance-input capitalize-letter @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Іван" required autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="patronymic" class="entrance-label">По батькові</label>
                        <input id="patronymic" type="text" class="entrance-input capitalize-letter @error('patronymic') is-invalid @enderror" name="patronymic" value="{{ old('patronymic') }}" placeholder="Іванович" required autocomplete="patronymic">
                        @error('patronymic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="email" class="entrance-label">Електронна адреса</label>
                        <input id="email" type="email" class="entrance-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="mail@mail.com" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="password" class="entrance-label">Пароль</label>
                        <input id="password" type="password" class="entrance-input @error('password') is-invalid @enderror" name="password" placeholder="********" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="password-confirm" class="entrance-label">Підтвердіть пароль</label>
                        <input id="password-confirm" type="password" class="entrance-input" name="password_confirmation" placeholder="********" required autocomplete="new-password">

                        <label for="role" class="entrance-label">Роль</label>
                        <select id="role" class="entrance-input" name="role" required >
                            <option value="student">Студент</option>
                            <option value="teacher">Вчитель</option>
                        </select>

                        <div class="modal-footer">
                            <button type="submit" class="btn-entrance btn btn-secondary"
                                data-dismiss="modal">Зареєструватися</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
