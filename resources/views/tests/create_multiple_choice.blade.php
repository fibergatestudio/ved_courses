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
                <div class="card-header">{{ __('Добавление вопроса "Множественный выбор" к тесту') }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('create_multiple_choice',['test_info_id' => $test_info_id]) }}" id="test_form" method="POST" >
                        @csrf
                    <!-- Множественный выбор -->
                        <div class="form-group">
                            <label>Название вопроса</label>
                            <input type="text" class="form-control" name="question_name" required>
                        </div>
                        <div class="form-group">
                            <label>Текст вопроса</label>
                            <textarea id="question_text" class="question_text" name="question_text">Введите текст вопроса</textarea>
                        </div>
                        <div class="form-group">
                            <label>Бал по умолчанию</label>
                            <input type="text" class="form-control" name="default_score">
                        </div>
                        <div class="form-group">
                            <label>Коментарий ко всему тесту</label>
                            <textarea id="question_text" class="question_text" name="test_comment">Введите текст коментария</textarea>
                        </div>
                        <div class="form-group">
                            <label>Один или несколько верных ответов</label>
                            <select class="form-control" name="answers_type">
                                <option value="Допускается несколько верных ответов">Допускается несколько верных ответов</option>
                                <option value="Только один верный ответ">Только один верный ответ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Нумеровать ответы?</label>
                            <select class="form-control" name="number_answers"> 
                                <option value="Без нумерации">Без нумерации</option>
                                <option value="a, b, c">a, b, c, ...</option>
                                <option value="A, B, C">A, B, C, ...</option>
                                <option value="1, 2, 3">1, 2, 3, ...</option>
                            </select>
                        </div>
                        <hr>
                        <h1>Варианты ответов </h1>
                        <input type="hidden" id="counter" name="questions_counter" value="">
                        <div id="app1">
                            <div v-for="(id,index) in ids" >
                                <div class="form-group">
                                    <label>Вариант ответа @{{ index + 1}}</label>
                                    <textarea id="question_text" class="question_text" :name="'answer[]'">Введите ответ</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Оценка</label>
                                    <select class="form-control" :name="'answer_grade[]'">
                                        <option value="Не выбрано">Не выбрано</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Комментарий</label>
                                    <textarea id="question_text" class="question_text" name="answer_comment">Введите комментарий</textarea>
                                </div>

                                <input type="hidden" :id="'answer_counter'+index" :name="'answer_counter'+index" value="0">
                                <!--<div @click="addNewAnswer(index)" class="btn btn-success m-1 text-center">Добавить Ответ</div>-->
                            </div>
                            <div onclick="app1.addNewEntry()" class="btn btn-success">Добавить Вопрос</div>

                        </div>
                        <button type="submit" class="btn btn-warning">Сохранить вопрос</button>
                    </form>
                    <!-- Верно\Не верно -->

                    <!-- Краткий ответ -->
                    <!-- Перетаскивание в тексте -->

                        <a href="">
                            <button type="submit" class="btn btn-success">Добавить ответ</button>
                        </a>

                        <a href="{{ route('tests_controll') }}">
                            <button type="submit" class="btn btn-danger">Удалить вопрос</button>
                        </a>

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

                    tinymce.init({
                        selector: '.question_text'
                    });

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
                    $(answer_id).append( "<div class='col-md-12'><input type='text' class='form-control' name='answer"+index+"[]' placeholder='Введите ответ " + $(answer_counter).val() +"'></div>" );
                    
                },
            }
        });
    

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
  tinymce.init({
    selector: '.question_text'
  });
</script>

@endsection


@endsection