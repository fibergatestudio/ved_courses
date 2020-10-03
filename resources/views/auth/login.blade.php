@extends('layouts.front.sign')

@section('content')
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <img class="entrance-logo" src="{{ asset('img/entrance-logo.svg') }}" alt="logo">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Увійти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" role="tab" aria-controls="profile"
                            aria-selected="false">Зареєструватися</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="entrance-wrapper">
                            <h3 class="entrance-title">Увійти за допомогою </h3>
                            <div class="entrance-social">
                                <div class="entrance-social_item">
                                    <a href="{{ route('login.social', ['provider' => 'google']) }}">
                                        <picture>
                                            <source srcset="{{ asset('img/login-google-small.png') }}"
                                                media="(max-width:768px"> <img class="entrance-social_image"
                                                src="{{ asset('img/login-google.png') }}" alt="img">
                                    </a></picture>
                                </div>
                                <div class="entrance-social_item">
                                    <a href="{{ route('login.social', ['provider' => 'facebook']) }}">
                                        <picture>
                                            <source srcset="{{ asset('img/login-facebook-small.png') }}"
                                                media="(max-width:768px"> <img class="entrance-social_image"
                                                src="{{ asset('img/login-facebook.png') }}" alt="img">
                                    </a></picture>
                                </div>
                                <!--
                            <div class="entrance-social_item">
                                <a href="##">
                                    <picture>
                                        <source srcset="{{ asset('img/login-instagram-small.png') }}"
                                            media="(max-width:768px"> <img class="entrance-social_image"
                                            src="{{ asset('img/login-instagram.pn') }}g" alt="img">
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
                            <label for="email" class="entrance-label">Електронна адреса</label>
                            <input id="email" type="email" class="entrance-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="mail@mail.com" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="password" class="entrance-label">Пароль</label>
                            <input id="password" type="password" class="entrance-input @error('password') is-invalid @enderror" name="password" placeholder="*********" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="entrance-label p-0" for="remember">Запам'ятати мене</label>
                            </div>
                            <p> <a class="btn btn-link" href="{{ route('password.request') }}">
                                Забули пароль?
                            </a></p>
                            <div class="modal-footer">
                                <button type="submit" class="btn-entrance btn btn-secondary"
                                    data-dismiss="modal">Увійти</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
