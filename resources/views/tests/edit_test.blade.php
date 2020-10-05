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
                <div class="card-header">{{ __('Редактирование теста') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('/tests_controll/'.$test_id.'/edit_apply') }}" id="test_form" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label>Название Теста</label>
                            <input type="text" class="form-control" name="name" value="{{ $test_info->name }}">
                        </div>
                        
                        <div id="studentsAdd" class="form-group">
                            <label>Описание Теста</label>
                            <textarea type="text" class="form-control" name="description" value="">{{ $test_info->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Включен</label>
                            <select name="is_enabled" class="form-control">
                                <option>Выберите</option>
                                <option value="true" @if($test_info->is_enabled == "true") selected @endif>Да</option>
                                <option value="false" @if($test_info->is_enabled == "false") selected @endif>Нет</option>
                            </select>
                        </div>
                        <hr>
                        <!--  -->

                        <!--  -->
                        <br>
                        <button type="submit" class="btn btn-success">Создать</button>
                    </form>
                    
                        <a href="{{ route('tests_controll') }}">
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
