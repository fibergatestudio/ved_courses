@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Панель') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Вы вошли в аккаунт ') }}
                    @if(Auth::user()->role == "admin")
                        Администратора
                    @elseif(Auth::user()->role == "teacher")
                        Учителя
                    @elseif(Auth::user()->role == "student")
                        Студента
                    @else
                        no ROLE or WRONG role
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
