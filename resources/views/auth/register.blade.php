@extends('layouts.front.sign')

@section('content')
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> -->
        <div class="modal-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <img class="entrance-logo" src="{{ asset('img/entrance-logo.svg') }}" alt="logo">
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
                        <label class="entrance-label ">Прізвище</label>
                        <input class="entrance-input capitalize-letter" type="email" placeholder="Іванов">
                        <label class="entrance-label">Ім'я</label>
                        <input class="entrance-input capitalize-letter" type="email" placeholder="Іван">
                        <label class="entrance-label">По батькові</label>
                        <input class="entrance-input capitalize-letter" type="email" placeholder="Іванович">
                        <label class="entrance-label">Електронна адреса</label>
                        <input class="entrance-input" type="email" placeholder="mail@mail.com">
                        <div class="modal-footer">
                            <button type="button" class="btn-entrance btn btn-secondary"
                                data-dismiss="modal">Зареєструватися</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
