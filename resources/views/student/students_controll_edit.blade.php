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
            @if(Auth::user()->role == "admin")
                @include('layouts.admin_sidebar')
            @elseif(Auth::user()->role == "teacher")
               @include('layouts.teacher_sidebar', ['status' => Auth::user()->status] )
            @endif
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Редактирование студента ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('students_controll_apply',['student_id' => $student->user_id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>ФИО</label>
                            <input type="text" class="form-control" name="full_name" value="{{ $student->full_name }}">
                        </div>
                        <div class="form-group">
                            <label>Название университета</label>
                            <input type="text" class="form-control" name="university_name" value="{{ $student->university_name }}">
                        </div>
                        <div class="form-group">
                            <label>Номер курса</label>
                            <input type="number" class="form-control" name="course_number" value="{{ $student->course_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер группы</label>
                            <input type="number" class="form-control" name="group_number" value="{{ $student->group_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер студенчиского билета</label>
                            <input type="number" class="form-control" name="student_number" value="{{ $student->student_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер телефона</label>
                            <input type="number" class="form-control" name="student_phone_number" value="">
                        </div>
                        <div class="form-group">
                            <label>Назначенный преподаватель</label>
                            <select class="form-control" name="assigned_teacher_id">
                                    <option value="">Нет</option>
                                @foreach($teachers as $teacher)

                                    @if($teacher->id == $student->assigned_teacher_id)
                                        <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                                    @else
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endif

                                   
                                @endforeach
                            </select>
                        </div>
                        
                        <hr>
                        
                        <button type="submit" class="btn btn-success">Применить</button>
                    </form>
                        <a href="{{ route('users_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
