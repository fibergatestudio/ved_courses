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
               @include('layouts.teacher_sidebar', ['status' => Auth::user()->status] )
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Ваши Студенты') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!-- <th>Логин</th>
                                <th>Имейл</th> -->
                                <th>ФИО</th>
                                <th>Название ВУЗа</th>
                                <th>Номер Курса</th>
                                <th>Номер Группы</th>
                                <th>Номер студенческого</th>
                                <th>Назначеный Препод.</th>
                                <th>Статус</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teacher_students as $student)
                            <tr>
                                <td> {{ $student->user_id }} </td>
                                <!-- <td>{{ $student->login }}</td>
                                <td>{{ $student->email }}</td> -->
                                <td> {{ $student->full_name }} </td>
                                <td> {{ $student->university_name }} </td>
                                <td> {{ $student->course_number }} </td>
                                <td> {{ $student->group_number }} </td>
                                <td> {{ $student->student_number }} </td>
                                <td> {{ $student->assigned_teacher_id }} </td>
                                <td>{{ $student->status }} </td>
                                <td>
                                    <a href="{{ route('completed_tests',['student_id' => $student->user_id]) }}">
                                        <button class="btn btn-success">Просмотреть тесты</button>
                                    </a>
                                    <a href="{{ route('students_controll_edit',['student_id' => $student->user_id]) }}">
                                        <button class="btn btn-success">Изменить</button>
                                    </a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
