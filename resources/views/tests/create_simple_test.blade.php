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
                <div class="card-header">{{ __('Создать обычный тест') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('create_simple_test') }}" id="test_form" method="POST" >
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
                        <!--  -->
                        <input type="hidden" id="counter" name="questions_counter" value="">
                        <div id="app1">
                            <div v-for="(id,index) in ids" class="form-group row">

                            <div @click="removeNewEntry(index)" class="btn btn-danger m-1">-</div>

                                <div class="container-fluid"> <div class="row"><hr>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="page-header text-center"> <h3> Вопрос № @{{ index + 1}}.</h3> </div>
                                            <div class="row">
                                                <input type="text" class="form-control" :name="'question[]'" style="display: inline-block" placeholder="Введите вопрос" >
                                            </div>
                                        </div> <br><hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="page-header text-center"> <h3> Варианты ответа </h3> </div><br>
                                                    <div @click="addNewAnswer(index)" class="btn btn-success m-1">Добавить Ответ</div>
                                                    <input type="hidden" :id="'answer_counter'+index" :name="'answer_counter'+index" value="0">
                                                <div class="row" :id="'answers' + index"> 
                                                    <!-- <div>
                                                        <input type="text" class="form-control" :name="'answer'+index + '[]'" style="display: inline-block" placeholder="Введите ответ" >
                                                    </div> -->
                                                    <!-- <div class="col-md-3">
                                                        <input type="text" class="form-control" :name="'answer'+index + '[]'" style="display: inline-block" placeholder="Введите ответ А" >
                                                    </div> -->
                                                    <!-- <div class="col-md-3">
                                                        <input type="text" class="form-control" :name="'answer'+index + '[]'" style="display: inline-block" placeholder="Введите ответ Б" >   
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" :name="'answer'+index + '[]'" style="display: inline-block" placeholder="Введите ответ В" >
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" :name="'answer'+index + '[]'" style="display: inline-block" placeholder="Введите ответ Г" >
                                                    </div> -->
                                                    
                                                    <!-- <input type="image" value="" class="btn btn-success" @click="addNewAnswer( index );"  /> -->
                                                    <br>
                                                    <!-- <div onclick="addAnswer(index)" class="btn btn-success">Добавить Ответ</div> -->
                                                </div>
                                            </div>
                                        </div><br><hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- <div class="page-header text-center"> <h3> Правильный ответ </h3> </div> -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select class="form-control" :name="'right_answer'+index" :id="'right_answer'+index" required>
                                                            <option default>Выберите верный ответ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><hr>
                                    </div>
                                </div> 
                            </div>
                                <!-- <input type="text" :name="'question'+id.id" class="form-control col-md-2" style="display: inline-block" >
                                <input type="text" :name="'answer'+id.id" class="form-control col-md-2" style="display: inline-block" >
                                <input type="text" :name="'answer'+id.id" class="form-control col-md-2" style="display: inline-block" >
                                <input type="text" :name="'answer'+id.id" class="form-control col-md-2" style="display: inline-block" >
                                <input type="text" :name="'answer'+id.id" class="form-control col-md-2" style="display: inline-block" >
                                <input type="text" :name="'right_answer'+id.id" class="form-control col-md-2" style="display: inline-block" > -->
                                <!-- <select :name="'urgency'+id.id" class="form-control col-md-3" style="display: inline-block" required id="item_urgency">
                                    <option selected="selected">Выберите срочность</option>
                                    <option value="Не горит">Не горит</option>
                                    <option value="Горит">Горит</option>
                                    <option value="Очень горит">Очень горит</option>
                                </select> -->
                            </div>
                            
                            {{-- Добавить новый элемент : кнопка --}}
                            <div onclick="app1.addNewEntry()" class="btn btn-success">Добавить Вопрос</div>

                            <hr>
                        </div>
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

<script>
        //var global_index = 0;
        var currentCounter = 0;
        //var answersCounter = 0;
        var app1 = new Vue({
            el: '#app1',
            data: {
                ids: [
                    { id: currentCounter},
                ],
                answers: [
                ],
            },
            methods: {
                addNewEntry: function(){
                    currentCounter = currentCounter + 1;
                    this.ids.push({id: currentCounter});
                    document.getElementById("counter").value = currentCounter;
                },
                removeNewEntry: function(index){
                    currentCounter = currentCounter - 1;
                    this.ids.splice(index, 1);
                    document.getElementById("counter").value = currentCounter;
                },
                addNewAnswer2: function(index){
                    var answer_counter = 'answer_counter' + index;
                    //Vue.set(app1.answers, 'answer', 2)
                    //console.log(JSON.stringify(this.data))
                    console.log(answer_counter);
                    this.answers.push({answer_counter: answer_counter});
                    console.log(JSON.stringify(this.test));
                    document.getElementById(answer_counter).value = answersCounter;
                },
                addNewAnswer: function(index){
                    
                    var answer_id = '#answers' + index;
                    var right_answer_id = '#right_answer' + index;
                    var answer_counter = '#answer_counter' + index;
                    $(answer_counter).val(parseInt($(answer_counter).val()) + 1);
                    console.log(answer_counter);
                    $(right_answer_id)
                        .append($("<option></option>")
                                    .attr("value",  $(answer_counter).val())
                                    .text("Ответ "+ $(answer_counter).val())); 
                    //$(right_answer_id).append( "<option value=''>Ответ А</option>" );
                    $(answer_id).append( "<div class='col-md-3'><input type='text' class='form-control' name='answer"+index+"[]' placeholder='Введите ответ " + $(answer_counter).val() +"'></div>" );
                    
                },
            }
        });
    
</script>
<script>
$("#test_form").on("submit", function(e){
    //e.preventDefault();
    //var variable = $('#test_form').find('input[name="answer0[]"]').val();
    //console.log("Кол-во. Ответов " + global_index + "Кол-во. вопросов " + currentCounter);
    //e.submit();
 })
</script>


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