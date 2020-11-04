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
            @if(Auth::user()->role == "student")
                @include('layouts.student_sidebar')
            @endif
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Мои Тесты') }} 
                <!-- <a href="{{ route('new_test') }}"><button class="btn btn-success">Создать Тест</button></a> -->
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tests as $test)
                            <tr>
                                <td>{{ $test->id }}</td>
                                <td>{{ $test->name }}</td>
                                <td>{{ $test->description }}</td>
                                <td>
                                    <a href="{{ url('/tests_controll/view_sort/'. $test->id) }}">
                                        <button class="btn btn-success">Просмотреть</button>
                                    </a>
                                    <!-- <a href="{{ url('/tests_controll/'. $test->id .'/edit') }}">
                                        <button class="btn btn-success">Изменить</button>
                                    </a>
                                    <a href="">
                                        <button class="btn btn-danger">Удалить</button>
                                    </a> -->
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
