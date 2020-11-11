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
                <div class="card-header">{{ __('Добавить вопросы') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('add_question_apply', ['course_id' => $course_info->id ]) }}" id="test_form" method="POST" >
                        @csrf
                        <input type="hidden" id="counter" name="questions_counter" value="">
                        <div id="app1">
                            <div v-for="(id,index) in ids" >
                                <div class="form-group">
                                    <label>Вопрос @{{ index + 1}}</label>
                                    <input type="text" class="form-control" :name="'course_question'+index" value="">
                                </div>

                                <div class="form-group">
                                    <label>Ответ</label>
                                    <textarea :id="'question_text'+index" class="question_text" :name="'course_answer'+index"></textarea>
                                </div>
                                <!-- <input type="hidden" :id="'answer_counter'+index" :name="'answer_counter'+index" value="0"> -->
                            </div>
                            <div onclick="app1.addNewEntry()" class="btn btn-success">Добавить Вопрос</div>
                        </div>

                        <button type="submit" class="btn btn-success">Применить</button>
                    </form>
                    
                        <a href="{{ route('courses_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')

<script>
        var currentCounter = 0;
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
                    var id_t = '#question_text' + (currentCounter);

                    setTimeout(function(){  tinymce.init({ selector: id_t }); }, 100);

                    this.ids.push({id: currentCounter});
                    document.getElementById("counter").value = currentCounter;

                    
                },
            }
        });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({ selector: '#question_text0' });
</script>


@endsection


@endsection
