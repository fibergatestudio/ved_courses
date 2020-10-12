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
                <div class="card-header">{{ __('Создание теста') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('create_new_test_info') }}" id="test_form" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label>Название Теста</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                        
                        <div id="studentsAdd" class="form-group">
                            <label>Описание Теста</label>
                            <textarea type="text" class="form-control" name="description" value=""></textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Начало Тестирования</label>
                            <input type="text" class="form-control datetimepicker" name="start_date_time"> 
                            <label>Окончание Тестирования</label>
                            <input type="text" class="form-control datetimepicker" name="end_date_time"> 
                            <label>Ограничение времени</label>
                            <input type="number" class="form-control" name="time_limit"> 
                            <label>Когда время заканчивается</label>
                            <select class="form-control" name="when_time_is_up">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Ограничение времени</label>
                            <input type="number" class="form-control" name="passing_score" value="">
                            <label>Разршено попыток</label>
                            <select class="form-control" name="available_attempts">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                            <label>Метод оценивания</label>
                            <select class="form-control" name="assessment_method">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                        </div>
                        <hr> 

                        <div class="form-group">
                            <label>Новая страница</label>
                            <select class="form-control" name="new_page">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                            <label>Метод перехода</label>
                            <select class="form-control" name="transition_method">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                        </div>

                        <hr>
                        <div class="form-group">
                            <label>Случайный порядок ответов</label>
                            <select class="form-control" name="random_answers_order">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                            <label>Получение результата</label>
                            <select class="form-control" name="getting_result">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Параметры просмотра</label>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                    One of three columns
                                    </div>
                                    <div class="col-md-3">
                                    One of three columns
                                    </div>
                                    <div class="col-md-3">
                                    One of three columns
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Фото и имя студента</label>
                            <select class="form-control" name="photo_and_student_name">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Разширенный ответ</label>
                            <select class="form-control" name="extended_feedback">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Доступность</label>
                            <select class="form-control" name="availability">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                            <label>Режим работы с группами</label>
                            <select class="form-control" name="operating_mode">
                                <option>Выберите</option>
                                <option>-</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Добавить вопрос</button>
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


<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->

<script>

$(function () {
    $('.datetimepicker').datetimepicker();
});

</script>

@endsection


@endsection