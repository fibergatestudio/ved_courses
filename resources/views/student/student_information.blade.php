@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
        </div>
    @endif
    @if(session()->has('message_error'))
        <div class="alert alert-warning">
            {{ session()->get('message_error') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.student_sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Личная информация') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('student_information_apply') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student_info->id }}">
                        <div class="form-group">
                            <label>Прізвище</label>
                            <input type="text" class="form-control" name="surname" value="{{ $student_info->surname }}">
                        </div>
                        <div class="form-group">
                            <label>Ім'я</label>
                            <input type="text" class="form-control" name="name" value="{{ $student_info->name }}">
                        </div>
                        <div class="form-group">
                            <label>По батькові</label>
                            <input type="text" class="form-control" name="patronymic" value="{{ $student_info->patronymic }}">
                        </div>
                        <div class="form-group">
                            <label>Фото профілю</label>&nbsp;<img src="{{ $photo }}">
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="form-group">
                            <label>Поштова скринька</label>
                            <input type="text" class="form-control" name="email" value="{{ $student_info->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <input type="text" class="form-control" name="role" value="{{ $student_info->role }}" disabled>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Назва ВУЗа</label>
                            <input type="text" class="form-control" name="university_name" value="{{ $student_full_info->university_name }}">
                        </div>
                        <div class="form-group">
                            <label>Номер курсу</label>
                            <input type="number" class="form-control" name="course_number" value="{{ $student_full_info->course_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер групи</label>
                            <input type="number" class="form-control" name="group_number" value="{{ $student_full_info->group_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер студентського квитка</label>
                            <input type="number" class="form-control" name="student_number" value="{{ $student_full_info->student_number }}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </form><br>
                    <form action="{{ route('student_information_change_password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Пароль</label>
                            <input type="password" class="form-control" name="oldpass">
                        </div>
                        <div class="form-group">
                            <label>Новий пароль</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Повторити пароль</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </form><br>
                        <a href="{{ route('student_panel') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
