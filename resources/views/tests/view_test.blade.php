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
            @elseif(Auth::user()->role == "student")
                @include('layouts.student_sidebar')
            @endif
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><div class="row">{{ __('Просмотр теста') }} № {{ $test_info->id }} | Просмотров: {{ $test_info->views }} | Пройдено: {{ $test_info->finished_count }}</div></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('test_submit', ['test_id' => $test_info->id]) }}" method="POST">
                    @csrf
                    <?php $i = 1; ?>
                    @foreach($test_qa as $question)
                        <?php //var_dump($question); ?>
                        <div class="row col-md-12">
                            <div class="col-md-2">Вопрос № {{ $i }} </div>
                            <input type="hidden" class="form-control col-md-4" name="question[]" value="{{ $question->question }}" >
                            <p class="form-control col-md-3">{{ $question->question }}</p>
                            <select class="form-control col-md-4" name="answer[]">
                                <option default>Выберите Ответ</option>
                                @foreach($question->answer as $answer)
                                
                                    <option value="{{ $answer }}"> {{ $answer }} </option>

                                @endforeach
                            </select>
                            <input type="hidden" name="right_answer[]" value="{{ $question->right_answer }}">
                        </div>
                    <?php $i++; ?>
                    @endforeach
                        <a href="{{ route('tests_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>

                        <button type="submit" class="btn btn-success">Отправить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<script>
$(document).ready(function(){

    $('#student').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#studentList').fadeIn();  
                    $('#studentList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#student').val($(this).text());  
        $('#studentList').fadeOut();  
    });  

    /* Создаем аррей с студентами */
    var students_array = new Array();

    $('#addstudent').click(function() {
        /* Берем имя текущего студента */
        var curr_stud = $('#student').val();
        console.log(curr_stud);
        console.log(students_array);
        /* Если студент есть в аррее */
        if(jQuery.inArray(curr_stud, students_array) != -1 ){
            alert("Студент "+ curr_stud + " Уже добавлен!");
        } else {
            $('#studentsAdd').append( "<button class='btn btn-success m-1' disabled>"+ curr_stud + "</button>" );
            $('#studentsAdd').append( "<input type='hidden' name='student_name[]' value='" + curr_stud +"'>" );
            /* Добавляем текущего студента в аррей */
            students_array.push(curr_stud);
        }
       
    });

});
</script>
@endsection


@endsection
