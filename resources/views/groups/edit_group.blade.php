@extends('layouts.app')


@section('style')

<style>

.dropdown-menu-list{
    position: absolute !important;
    top: 133px;
    left: 20px;
    z-index: 1000;
    float: left;
    min-width: 10rem;
    padding: 0.5rem 0;
    margin: 0.125rem 0 0;
    font-size: 0.9rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 0.25rem;
}

</style>

@endsection

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
                <div class="card-header">{{ __('Изменить группу') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('apply_edit_group',['group_id' => $group_info->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Название группы</label>
                            <input type="text" class="form-control" name="name" value="{{ $group_info->name }}">
                        </div>
                        <div class="form-group">
                            <label>Студенты</label>
                            <div style="display:flex;">
                                <input type="text" id="student" class="form-control" name="student" value="">
                                <div id="studentList">
                                </div>
                                <a id="addstudent" style="color:white;" class="btn btn-success">Добавить</a>
                            </div>
                            @csrf
                        </div>
                        <div id="studentsAdd" class="form-group">
                            <label>Список текущих студентов</label><br>
                            @foreach($students_array as $student)
                                <div class="btn btn-success student"> {{ $student-> full_name }} 
                                    <input type="hidden" class="ids" name="student_name[]" value="{{ $student->full_name }}">
                                    <button type="button" class="btn close remove">
                                        <span aria-hidden="true">×</span>
                                    </button> 
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>Учителя</label>
                            <select class="form-control" name="teacher_id">
                                <option>Нет</option>
                                @foreach($teachers as $teacher)
                                    @if($group_info->assigned_teacher_name == $teacher->name)
                                        <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                                    @else
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Изменить</button>
                    </form>
                        <a href="{{ route('groups_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
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

    /* Берем все текущие значения */
    var values = $("input[name='student_name[]']")
            .map(function(){
                students_array.push($(this).val());
                return $(this).val();
            }).get();

    /* Добавляем в аррей */
    //students_array.push(values);

    console.log(students_array);

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

    $(".remove").click(function(){
        //var remove_id = 
        var remove_name = $(this).closest(".student").find(".ids").val();

        console.log( remove_name );
        //alert(remove_id);

        students_array.splice( $.inArray(remove_name,students_array) ,1 );

        $(this).closest(".student").remove();
    });
});

</script>
@endsection


@endsection
