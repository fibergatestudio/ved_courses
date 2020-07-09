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
                @include('layouts.teacher_sidebar')
            @endif
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Управление Группами') }} <a href="{{ route('add_group') }}"><button class="btn btn-success">Добавить</button></a></div>

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
                                <th>Название группы</th>
                                <th>Студенты</th>
                                <th>Имя учителя</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->name }}</td>
                                <td>
                                    @foreach($group->students_array as $student)
                                        <button class="btn btn-success m-1" disabled>{{ $student->full_name }}</button>
                                    @endforeach

                                </td>
                                <td>{{ $group->assigned_teacher_name }}</td>
                                <td>
                                    <a href="{{ route('edit_group',['group_id' => $group->id]) }}">
                                        <button class="btn btn-success">Изменить</button>
                                    </a>
                                    <a href="{{ route('delete_group',['group_id' => $group->id]) }}">
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
