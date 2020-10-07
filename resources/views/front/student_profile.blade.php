@extends('layouts.front.front_child')

@section('title')
    Профіль
@endsection

@section('header')

@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>Профіль</span></div>
    </div>
    <div class="container">
        <div class="profile-grid_wrapper">
            <div class="profile-grid_item">
                <div class="profile-item_photo">
                </div>
            </div>
            <div class="profile-grid_item">
                <div class="profile-item_name">Іванов Іван Іванович </div>
                <div class="profile-item_position">студент</div>
                <div class="profile-item_students">Назва курсу та групи</div>
                <div class="profile-item_course">email@gmail.com</div>
            </div>
            <div class="profile-grid_item">
                <div class="profile-grid_fakeform active">
                    <p>+ Додати інформацію про себе</p>
                    <p>Розкажіть іншим користувачам трохи про себе: де ви живете, чим </p>
                    <p>цікавитесь, чому проходите курси, або що сподіваєтеся вивчити.</p>
                </div>
                <form class="profile-grid_form">
                <textarea class="profile-item_text" spellcheck="false"></textarea>
                </form>

            </div>
        </div>
        <a class="btn-watch--more" href="##"><span>Редагувати</span></a>



    </div>
</section>
@endsection
