@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.admin_sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Панель') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->role == "admin")
                        Для управления используйте меню слева.
                    @elseif(Auth::user()->role == "teacher")
                        is Teacher
                    @elseif(Auth::user()->role == "student")
                        is student
                    @else
                        no ROLE or WRONG role
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
