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
                <div class="card-header">{{ __('Редактирование курса') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('edit_course_apply', ['course_id' => $course_info->id ]) }}" id="test_form" method="POST" >
                        @csrf
                        <!-- <input type="hidden" name="course_id" value="{{ $course_info->id }}"> -->
                        <div class="form-group">
                            <label>Название Теста</label>
                            <input type="text" class="form-control" name="name" value="{{ $course_info->name }}">
                        </div>
                        
                        <div id="studentsAdd" class="form-group">
                            <label>Описание Теста</label>
                            <textarea type="text" class="form-control" name="description" value="">{{ $course_info->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Про этот курс</label>
                            <a href="{{ route('edit_about', ['course_id' => $course_info->id ]) }}">
                                <input class="btn btn-success" value="Редактировать" disabled></a>
                        </div>
                        <div class="form-group">
                            <label>Программа курса</label>
                            <a href="{{ route('add_lesson', ['course_id' => $course_info->id ]) }}">
                                <input class="btn btn-success" value="Добавить" disabled></a>
                        </div>
                        <div class="form-group">
                            <label>Частые вопросы</label>
                            <a href="{{ route('add_question', ['course_id' => $course_info->id ]) }}">
                                <input class="btn btn-success" value="Добавить" disabled></a>
                        </div>

                        <hr>
                        <!--  -->

                        <!--  -->
                        <br>
                        <button type="submit" class="btn btn-success">Применить</button>
                    </form>
                    
                        <a href="{{ route('courses_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')

@endsection


@endsection
