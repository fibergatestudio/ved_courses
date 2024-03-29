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
                <div class="card-header">{{ __('Добавление вопроса к тесту') }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('question_type_submit',['test_info_id' => $test_info_id]) }}" id="test_form" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label>Выбор типа теста</label>
                            <select class="form-control" name="question_type">
                                <option value="Множинний вибір">Множественный выбор</option>
                                <option value="Правильно/неправильно">Верно\Не верно</option>
                                <!-- <option value="Краткий ответ">Краткий ответ</option> -->
                                <option value="Перетягування в тексті">Перетаскивание в тексте</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Далее</button>
                    </form>
                        <hr>
                        <br>

                        <a href="{{ route('tests_controll') }}">
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