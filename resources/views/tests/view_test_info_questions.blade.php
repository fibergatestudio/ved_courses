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
                <div class="card-header">{{ __('Просмотр информации и вопросов') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="" id="test_form" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label>Название Теста</label>
                            <input type="text" class="form-control" name="name" value="{{ $test_view_info->name }}">
                        </div>
                        
                        <div id="studentsAdd" class="form-group">
                            <label>Описание Теста</label>
                            <textarea type="text" class="form-control" name="description">{{ $test_view_info->description }}</textarea>
                        </div>
                        <hr> 
                        <br>

                        <div class="form-group">
                            <label>Список вопросов</label>
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Тип вопроса</th>
                                        <th>Название вопроса</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($test_question_answers as $test)
                                    <tr>
                                        <td>{{ $test->id }}</td>
                                        <td>{{ $test->question_type }}</td>
                                        <td>{{ $test->question_name }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </form>
                        <a href="{{ route('question_type',['test_info_id'=>$test_info_id]) }}">
                            <button class="btn btn-success">Добавить вопрос</button>
                        </a>
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

@endsection


@endsection