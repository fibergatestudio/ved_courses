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
                <div class="card-header">{{ __('Изменить "про курс"') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert"> 
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('edit_about_apply', ['course_id' => $course_info->id ]) }}" id="test_form" method="POST" >
                        @csrf

                        <div class="form-group">
                            <label>Описание</label>
                            <textarea id="question_text" class="question_text" name="course_description">{{ $course_i->course_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Чего вы научитесь</label>
                        </div>

                        <div class="form-group">
                            <label>Пункт 1</label>
                            <textarea id="question_text" class="question_text" name="course_learn[]">Введите текст коментария</textarea>
                        </div>
                        <div class="form-group">
                            <label>Пункт 2</label>
                            <textarea id="question_text" class="question_text" name="course_learn[]">Введите текст коментария</textarea>
                        </div>
                        <div class="form-group">
                            <label>Пункт 3</label>
                            <textarea id="question_text" class="question_text" name="course_learn[]">Введите текст коментария</textarea>
                        </div>
                        <div class="form-group">
                            <label>Пункт 4</label>
                            <textarea id="question_text" class="question_text" name="course_learn[]">Введите текст коментария</textarea>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
  tinymce.init({
    selector: '.question_text'
  });
</script>


@endsection


@endsection
