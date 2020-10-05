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
            @include('layouts.admin_sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Загрузка студентов') }}</div>

                <div class="card-body">
                    <form action="{{ route('import_students_apply') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="file" name="import_file" class="form-control">

                        <button type="submit" class="btn btn-success">Отправить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
