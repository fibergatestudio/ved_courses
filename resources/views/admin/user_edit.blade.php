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
            @include('layouts.admin_sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Редактирование пользователя ') }} {{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('user_edit_apply',['user_id' => $user->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Логин</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <input type="hidden" class="form-control" name="role" value="{{ $user->role }}">
                            <input type="text" class="form-control" value="{{ $user->role }}" disabled>
                        </div>
                        <!-- <div class="form-group">
                            <label>Роль</label>

                            <select class="form-control" name="role">
                                <option value="admin">Админ</option>
                                <option value="teacher">Учитель</option>
                                <option value="student">Студент</option>
                            </select>
                        </div> -->
                        <hr>
                        @if($temporal_student == 'true')
                            <div class="form-group">
                                Временный студент: Требуется подтверждение
                            </div>
                        @endif
                        @if($student_info != '')
                        <div class="form-group">
                            <label>ФИО</label>
                            <input type="text" class="form-control" name="full_name" value="{{ $student_info->full_name }}">
                        </div>
                        <div class="form-group">
                            <label>Название университета</label>
                            <input type="text" class="form-control" name="university_name" value="{{ $student_info->university_name }}">
                        </div>
                        <div class="form-group">
                            <label>Номер курса</label>
                            <input type="number" class="form-control" name="course_number" value="{{ $student_info->course_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер группы</label>
                            <input type="number" class="form-control" name="group_number" value="{{ $student_info->group_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер студенчиского билета</label>
                            <input type="number" class="form-control" name="student_number" value="{{ $student_info->student_number }}">
                        </div>
                        @endif
                        <br>
                        <button type="submit" class="btn btn-success">Применить</button>
                    </form>
                        <a href="{{ route('teacher_apply', ['user_id' => $user->id]) }}">
                            <button class="btn btn-primary">Подтвердить</button>
                        </a>
                        <a href="{{ route('users_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
