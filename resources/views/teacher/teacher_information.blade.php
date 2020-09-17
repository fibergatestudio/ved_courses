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
           @include('layouts.teacher_sidebar', ['status' => Auth::user()->status] )
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Личная информация') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $teacher_info->id }}">
                        <div class="form-group">
                            <label>Логин</label>
                            <input type="text" class="form-control" name="name" value="{{ $teacher_info->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $teacher_info->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <input type="text" class="form-control" name="role" value="{{ $teacher_info->role }}" disabled>
                        </div>
                        <br>
                        <!-- <button type="submit" class="btn btn-success">Применить</button> -->
                    </form>
                        <a href="{{ route('teacher_panel') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
