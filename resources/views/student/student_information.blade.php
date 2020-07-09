@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
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

                    <form action="{{ route('student_information_apply') }}" method="POST">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student_info->id }}">
                        <div class="form-group">
                            <label>Логин</label>
                            <input type="text" class="form-control" name="name" value="{{ $student_info->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $student_info->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <input type="text" class="form-control" name="role" value="{{ $student_info->role }}" disabled>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>ФИО</label>
                            <input type="text" class="form-control" name="full_name" value="{{ $student_full_info->full_name }}">
                        </div>
                        <div class="form-group">
                            <label>Название университета</label>
                            <input type="text" class="form-control" name="university_name" value="{{ $student_full_info->university_name }}">
                        </div>
                        <div class="form-group">
                            <label>Номер курса</label>
                            <input type="number" class="form-control" name="course_number" value="{{ $student_full_info->course_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер группы</label>
                            <input type="number" class="form-control" name="group_number" value="{{ $student_full_info->group_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер студенчиского билета</label>
                            <input type="number" class="form-control" name="student_number" value="{{ $student_full_info->student_number }}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Применить</button>
                    </form>
                        <a href="{{ route('student_panel') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
