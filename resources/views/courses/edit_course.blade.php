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
                            <a href="{{ route('edit_about', ['course_id' => $course_info->id ]) }}" class="btn btn-success">Редактировать</a>
                        </div>
                        <div class="form-group">
                            <label>Программа курса</label>
                            <a href="{{ route('add_lesson', ['course_id' => $course_info->id ]) }}" class="btn btn-success">Добавить</a>
                        </div>
                        <div class="form-group">
                            <label>Частые вопросы</label>
                            <a href="{{ route('add_question', ['course_id' => $course_info->id ]) }}" class="btn btn-success">Добавить</a>
                        </div>
                        <div class="form-group">
                            <label>Список вопросов</label>
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Вопрос</th>
                                        <th>Ответ</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses_question_answers as $faq)
                                    <tr>
                                        <td>{{ $faq->id }}</td>
                                        <td>{{ $faq->course_question }}</td>
                                        <td>{{ $faq->course_answer }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        <!--  -->

                        <!--  -->
                        <br>
                        <div class="form-group">
                            <label>Видимость курса</label>
                            <select type="text" class="form-control" name="visibility">
                                <option value="all" @if($course_info->visibility == "all") selected @endif>Для всех</option>
                                <option value="register" @if($course_info->visibility == "register") selected @endif>Только для зарегистрированных</option>
                            </select>
                        </div>
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
