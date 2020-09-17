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
                <div class="card-header">{{ __('Управлене студентами') }}</div>

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
                            @foreach($students as $student)
                            <tr>
                                <td>
                                    {{ $student->user_id }}
                                </td>
                                <td>
                                @if(empty($student->full_name))
                                    Пусто
                                @else
                                    {{ $student->full_name }}
                                @endif
                                </td>
                                <td>
                                    @if(empty($student->university_name))
                                        Пусто
                                    @else
                                        {{ $student->university_name }}
                                    @endif
                                </td>
                                <td>
                                    @if(empty($student->course_number))
                                        Пусто
                                    @else
                                    {{ $student->course_number }}
                                    @endif
                                </td>
                                <td>
                                    @if(empty($student->group_number))
                                        Пусто
                                    @else
                                        {{ $student->group_number }}
                                    @endif
                                </td>
                                <td>
                                    @if(empty($student->student_number))
                                        Пусто
                                    @else
                                        {{ $student->student_number }}
                                    @endif
                                </td>
                                <td>
                                    @if(empty($student->assigned_teacher_id))
                                        Пусто
                                    @else
                                        {{ $student->assigned_teacher_id }}
                                    @endif
                                </td>
                                <td>{{ $student->status }} </td>
                                <td>
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
