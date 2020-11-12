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
                <div class="card-header">{{ __('Добавить урок') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div> 
                    @endif

                    <form action="{{ route('add_lesson_apply', ['course_id' => $course_info->id ]) }}" id="test_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Как это работает</label>
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            <textarea id="question_text" class="question_text" name="course_description">Введите описание </textarea>
                        </div>

                        <div class="form-group">
                            <label>Время на прочтение (минуты)</label>
                            <input type="number" class="form-control" name="learning_time" value="">
                        </div>

                        <div class="form-group">
                            <label>Протокол</label>
                        </div>

                        <div class="form-group">
                            <label>Описание</label>
                            <textarea id="question_text" class="question_text" name="course_protocol_descr">Введите описание протокола</textarea>
                        </div>
                        <div class="form-group">
                            <label>Время на прочтение (минуты)</label>
                            <input type="number" class="form-control" name="learning_protocol_time" value="">
                        </div>

                        <div class="form-group">
                            <label>Добавить документ</label>
                            <hr>
                                <input type="hidden" id="docs_counter" name="docs_counter" value="">
                                <div id="docs">
                                    <div v-for="(id,index) in ids" >
                                        <input type="file" class="form-control" :name="'add_document' + index" value="">
                                    </div>
                                    <div onclick="docs.addNewEntry()" class="btn btn-success">Добавить След. Док.</div>
                                </div>
                            <hr>
                        </div>

                        <div class="form-group">
                            <label>Видеоколлекция</label>
                        </div>
                        <input type="hidden" id="videos_counter" name="videos_counter" value="">
                        <div id="app1">
                            <div v-for="(id,index) in ids" >
                                <hr>
                                <div class="form-group">
                                    <label>Название видео @{{ index + 1}}</label>
                                    <input type="text" class="form-control" :name="'video_name' + index" value="">
                                </div>
                                <div class="form-group">
                                    <label>Длина видео @{{ index + 1}}</label>
                                    <input type="number" class="form-control" :name="'video_length' + index" value="">
                                </div>
                                <div class="form-group">
                                    <label>Добавить видео @{{ index + 1}}</label>
                                    <input type="file" class="form-control" :name="'video_file' + index" value=""> 
                                </div>
                                <div class="form-group">
                                    <label>Ссылка видео @{{ index + 1}}</label>
                                    <input type="text" class="form-control" :name="'video_link' + index" value="">
                                </div>
                                <hr>
                            </div>
                            <div onclick="app1.addNewEntry()" class="btn btn-success">Добавить Следущее Видео</div>
                        </div>

                        <div class="form-group">
                            <label>Текущие тесты курса</label>
                            <div class="form-group">
                                <label>Список тестов</label>
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>#</th> 
                                            <th>Имя</th>
                                            <th>Описание</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($course_tests as $test)
                                        <tr>
                                            <td>{{ $test->id }}</td>
                                            <td>{{ $test->name }}</td>
                                            <td>{{ strip_tags($test->description) }}</td>
                                            <td>
                                                <a href="{{ route('view_test_info_questions', ['test_info_id' => $test->id ]) }}"><div class="btn btn-success">Редактировать</div></a>
                                                <div class="btn btn-danger">Удалить</div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('add_lesson_redirect', ['course_id' => $course_info->id ]) }}" class="btn btn-success">Добавить тест</a>
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
                //tinymce.init({ selector: id_t });
                this.ids.push({id: currentCounter});
                document.getElementById("videos_counter").value = currentCounter;
                
            },
            
        }
    });

    var docsCounter = 0;
    var docs = new Vue({
        el: '#docs',
        data: {
            ids: [
                { id: docsCounter},
            ],
            answers: [
            ],
        },
        methods: {
            addNewEntry: function(){
                docsCounter = docsCounter + 1;
                //tinymce.init({ selector: id_t });
                this.ids.push({id: docsCounter});
                document.getElementById("docs_counter").value = docsCounter;
                
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
