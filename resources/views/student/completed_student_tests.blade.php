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
                <div class="card-header">{{ __('Выполненные тесты студента') }} </div>
                <?php var_dump($student_info); ?>
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

                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                            </tr>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
