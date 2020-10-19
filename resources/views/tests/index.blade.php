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
                <div class="card-header">{{ __('Управление Тестами') }} 
                <a href="{{ route('new_test_info') }}"><button class="btn btn-success">Создать Новый Тест</button></a>
                </div>

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
                                <th>Название теста</th>
                                <th>Описание</th>
                                <th>Просмотров</th>
                                <th>Пройден (раз)</th>
                                <th>Содздатель (id)</th>
                                <th>Активен</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tests_info as $test)
                            <tr>
                                <td>{{ $test->id }}</td>
                                <td>{{ $test->name }}</td>
                                <td>{{ $test->description }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="{{ route('view_test_info_questions', ['test_info_id' => $test->id ]) }}">
                                        <button class="btn btn-success">Просмотреть</button>
                                    </a>
                                    <a href="">
                                        <button class="btn btn-danger">Удалить</button>
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
