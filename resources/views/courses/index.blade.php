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
                <div class="card-header">{{ __('Управление Курсами') }} <a href="{{ route('new_course') }}"><button class="btn btn-success">Создать Курс</button></a></div>

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
                                <th>Картинка</th>
                                <th>Просмотров</th>
                                <th>Пройден (раз)</th>
                                <th>Содздатель (id,name)</th>
                                <th>Видимость</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->name }}</td>
                                <td>
                                    @if($course->course_image_path != "")
                                    <img src="{{url('/images/' . $course->course_image_path)}}" height="50" width="80" alt="Image"/>
                                    @endif
                                </td>   
                                <td></td>
                                <td></td>
                                <td>{{ $course->creator_id }} {{ $course->creator_name }}</td>
                                <td>
                                    @if( $course->visibility == "all")
                                        Для всех
                                    @else
                                        Только для зарегистрированных
                                    @endif
                                
                                </td>
                                <td>
                                    <a href="{{ route('edit_course', ['course_id' => $course->id ]) }}">
                                        <button class="btn btn-success">Изменить</button>
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
