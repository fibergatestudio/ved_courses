@extends('layouts.front.front_child')

@section('content')


<body>

    {{-- <!-- Burger-menu (begin)-->
    <ul class="menu_title-wrapper">

        <li class="menu_title-inner">
            <div class="menu_burger-clone">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Про ресурс</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Тематичні напрями</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Студент</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link menu_title-linkStudent" href="##">Ім'я викладача</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Панель курсів</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Профіль</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Налаштування</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Вийти</a>
        </li>

    </ul>
    <!-- Burger-menu (end)-->

    <!-- student modal-page (begin) -->
    <div class="bootstrap-restylingStudent modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <ul class="student-menu-wrapper">
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Панель курсів</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Профіль</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Налаштування</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Вийти</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- student modal-page (end) -->

    <!-- deleteBtn modal-page (begin) -->
    <div class="bootstrap-restylingStudent modal fade" id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="deleteMenu-wrapper">

                    <div class="deleteMenu-topImg">
                        <img src="assets/img/basket.png" alt="icon">
                    </div>
                    <div class="deleteMenu-text">
                        Ви точно бажаєте видалити <br> Курс ?
                    </div>
                    <div class="deleteMenu-btn">
                        <a class="flexTable-btn_delete" href="##"><span>Видалити</span></a>
                    </div>
                </div>
                </ul>
            </div>
        </div>
    </div>


    <!-- deleteBtn modal-page (end) --> --}}

    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            <!-- sidebar-menu (start) -->

            {{-- <div class="sidebar">

                <div class="sidebar-sticky">

                    <div class="sidebar-top_wrapper">
                        <div class="sidebar-top_burger-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <!-- changeling block mobile-btn (start) -->
                        <div class="sidebar-top_mobile-btn">
                            <div class="sidebar-top_mobile-img">
                                <img src="assets/img/teacher-mobileMenu-2.png" alt="icon">
                            </div>
                            <div class="sidebar-top_mobile-name">
                                Управління курсами
                            </div>
                        </div>
                        <!-- changeling block mobile-btn (end) -->

                    </div> --}}
                    @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])

                {{-- </div>

            </div> --}}
            <!-- sidebar-menu (end) -->

            <div class="cource-container--mobile">
                <form action="{{ route('edit_lesson_apply', ['course_id' => $course_info->id, 'lesson_id' => $lesson_info->id]) }}" id="add_lesson_form" method="POST" enctype="multipart/form-data">
                    @csrf
                <h3 class="courseEdit-title courseControl-title">Редагувати заняття</h3>
                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Як це працює
                    </div>
                    <div class="courseAdd-wrapper">

                        <div class="courseAdd-inner courseAdd-inner_margbottom">
                            <div class="courseAdd-inner_left">
                                <div class="courseAdd_left--name">
                                    Опис<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdd-inner_right">
                                    <textarea class="tinyMCE-area" name="course_description">{{ $lesson_info->course_description }}</textarea>
                            </div>
                        </div>

                        <div class="courseAdditional-bottom-inner">
                            <div class="courseAdditional-bottom_left">
                                <div class="courseAdd_left--name">
                                    Назва<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdditional-bottom_right">
                                <input class="courseAdditional--input" name="course_name" type="text" value="{{ $lesson_info->course_name }}">
                            </div>
                        </div><br>

                        <div class="courseAdditional-bottom-inner">
                            <div class="courseAdditional-bottom_left">
                                <div class="courseAdd_left--name">
                                    Час на вивчення (хвилини)<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdditional-bottom_right">
                                <input class="courseAdditional--input" name="learning_time" type="text" value="{{ $lesson_info->learning_time }}">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Протокол
                    </div>

                    <div class="courseAdd-wrapper">
                        <div class="newTest-mark-string courseAdd-access_restyling courseEdit-btn-margin">
                            <div class="newTest-mark-inner_left">
                                Показати протокол
                            </div>
                            <div class="newTest-mark-inner_right">
                                <div class="newTest-mark-wrapper">
                                    <select class="newTest-mark-select" name="show_protocol">
                                        <option value="0" @if($lesson_info->show_protocol == 0) selected @endif >Hi</option>
                                        <option value="1" @if($lesson_info->show_protocol == 1) selected @endif >Так</option>
                                    </select>
                                    <div class="newTest-mark_arrowBlock"></div>
                                    </div>
                            </div>
                        </div>
                        <div class="courseAdd-inner courseAdd-inner_margbottom">
                            <div class="courseAdd-inner_left">
                                <div class="courseAdd_left--name">
                                    Опис<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdd-inner_right">
                                    <textarea class="tinyMCE-area" name="course_protocol_descr">{{ $lesson_info->course_protocol_descr }}</textarea>
                            </div>
                        </div>

                        <div class="courseAdditional-bottom-inner courseAdd-inner_margbottom">
                            <div class="courseAdditional-bottom_left">
                                <div class="courseAdd_left--name">
                                    Час на вивчення (хвилини)<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdditional-bottom_right">
                                <input class="courseAdditional--input" name="learning_protocol_time" type="text" value="{{ $lesson_info->learning_protocol_time }}">
                            </div>
                        </div>

                        <div class="courseAdditional-String">
                            Файли з розширенням PDF, DOC або DOCХ. Максимальний розмір - 20 Мб.
                        </div>

                        <div class="courseAdditional-flexbox">
                            <div class="courseAdditional-flexbox_item courseAdditional-mobile-only">
                                Файли з розширенням PDF, DOC або DOCХ. Максимальний розмір - 20 Мб.
                            </div>

                            <input type="hidden" id="docs_counter" name="docs_counter" value="0">

                                <?php if(isset($lesson_info)){
                                    $docs_count = json_decode($lesson_info->add_document);
                                    //var_dump($test); ?>
                                    <input type="hidden" id="docs_count" value="<?php echo count($docs_count); ?>">
                                <?php } ?>

                            <div id="docs">
                                <div v-for="(id,index) in ids" style="display: flex; align-items: center;">
                                    <!-- <input type="file" class="form-control" :name="'add_document' + index" value=""> -->

                                    <div class="courseAdditional-flexbox_item">
                                        <div class="courseAdditional-left_text">
                                            Додати документ
                                        </div>
                                    </div>
                                    <div class="courseAdditional-flexbox_item">
                                        <div class="courseAdditional-input-wrapper">
                                            <input class="courseAdditional-input_input" type="text" placeholder="Назва файлу" :id="'add_document_name' + index">
                                            <input class="courseAdditional-input_button" type="file" :name="'add_document' + index" onchange="showFile(this)">
                                            <a class="courseAdditional-input_FakeButton" href="##">Завантажити</a>
                                        </div>
                                    </div>
                                    <div class="courseAdditional-flexbox_item">
                                        <a class="courseAdditional-docName" href="##" @click="removeNewEntry(index)">
                                            
                                        </a>
                                    </div>

                                </div>
                                <!-- <div onclick="docs.addNewEntry()" class="btn btn-success">Добавить След. Док.</div> -->
                            </div>


                        </div>

                        <a class="courseAdditional-btn" href="##" onclick="docs.addNewEntry()">
                            <span>Додати наступний документ</span>
                        </a>
                    </div>
                </div>

                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Відеолекція
                    </div>
                    <div class="courseAdd-wrapper">

                        <div class="courseAdditional-topName">
                            У разі відсутності відеоматеріалу до заняття буде відображено  повідомлення для студента <span> "В цьому занятті немає відео супроводу"</span>
                        </div>
                        <input type="hidden" id="videos_counter" name="videos_counter" value="0">
                        <div id="app1">
                            <div v-for="(id,index) in ids" >
                                <br>
                                <hr>
                                <div class="courseAdditional-topInput-wrapper">
                                    <div class="courseAdditional-topInput-left">
                                        Назва відео @{{ index + 1}}
                                    </div>
                                    <div class="courseAdditional-topInput-right">
                                        <input class="courseAdditional--input" type="text" :name="'video_name' + index">
                                    </div>
                                </div>

                                <div class="courseAdditional-bottom-inner courseAdd-inner_margbottom">
                                    <div class="courseAdditional-bottom_left">
                                        <div class="courseAdd_left--name">
                                            Довжина відео (хвилини) @{{ index + 1}}
                                        </div>
                                    </div>
                                    <div class="courseAdditional-bottom_right">
                                        <input class="courseAdditional--input" type="text" :name="'video_length' + index">
                                    </div>
                                </div>



                                <div class="courseAdditional-flexbox">
                                    <div class="courseAdditional-flexbox_item">
                                        <div class="courseAdditional-left_text">
                                            Додати відео @{{ index + 1}}
                                        </div>
                                    </div>
                                    <div class="courseAdditional-flexbox_item courseAdditional-mobile-only">
                                        Короткі зауваження щодо додавання відеофайлу або посилань з інших джерел.
                                    </div>
                                    <div class="courseAdditional-flexbox_item">
                                        <div class="courseAdditional-input-wrapper">
                                            <input class="courseAdditional-input_input" type="text" placeholder="Назва файлу">
                                            <input class="courseAdditional-input_button" type="file" :name="'video_file' + index" onchange="show(this)">
                                            <a class="courseAdditional-input_FakeButton" href="##">Завантажити</a>
                                        </div>
                                    </div>
                                    <div class="courseAdditional-flexbox_item">
                                        <div class="courseAdditional-flexbox_text">
                                        Короткі зауваження щодо додавання відеофайлу або посилань з інших джерел.
                                        Формат файлу: mp4, Максимальний розмір: 300mb
                                        </div>
                                    </div>
                                </div>

                                <div class="courseAdditional-flexbox courseAdditional-flexbox-marginBottom">
                                    <div class="courseAdditional-flexbox_item">
                                        <div class="courseAdditional-left_text">
                                            Додати посилання @{{ index + 1}}
                                        </div>
                                    </div>
                                    <div class="courseAdditional-flexbox_item courseAdditional-mobile-only">
                                        Рекомендації щодо додавання посилань та вибору ресурсів.
                                    </div>
                                    <div class="courseAdditional-flexbox_item">
                                        <div class="courseAdditional-input-wrapper">
                                            <input class="courseAdditional-input_input" type="text" placeholder="Посилання" >
                                            <input class="courseAdditional-input_button" type="text" :name="'video_link' + index">
                                            <!-- <a class="courseAdditional-input_FakeButton" href="##">Додати</a> -->
                                        </div>
                                    </div>
                                    <div class="courseAdditional-flexbox_item">
                                        <div class="courseAdditional-flexbox_text">
                                            Рекомендації щодо додавання посилань та вибору ресурсів.
                                        </div>
                                    </div>

                                </div>
                                <!-- <a class="courseAdditional-docName docName-styling" :id="'video_text'+index" href="##">
                                    Довга назва посилання або завантаженого відео
                                </a> -->
                            </div>

                        </div>



                        <a class="courseAdditional-btn" href="##" onclick="app1.addNewEntry()">
                            <span>Додати наступне відео</span>
                        </a>


                    </div>
                </div>

                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        3D модель
                    </div>
                    <div class="courseAdd-wrapper">

                        <div class="courseAdditional-bottom-inner">
                            <div class="courseAdditional-bottom_left">
                                <div class="courseAdd_left--name">
                                    Посилання<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdditional-bottom_right">
                                <input class="courseAdditional--input" name="model3d_link" type="text" value="{{ $lesson_info->model3d_link }}">
                            </div>
                        </div><br>

                    </div>
                </div>

                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Тест
                    </div>
                    <div class="courseAdd-wrapper">

                        <div class="courseAdditional-topName">
                            Коротка інструкція щодо створення тестування, або рекомендації Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </div>

                        <a class="courseAdditional-btn courseAdditional-btn_bottom" href="{{ route('add_lesson_redirect', ['course_id' => $course_info->id ]) }}">
                            <span>Створити новий тест</span>
                        </a>

                    </div>
                    <div class="form-group">
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
                                        <a href="{{ route('view_test_info_questions', ['test_info_id' => $test->id ]) }}"><div style="margin-bottom: 5px;" class="courseEdit-btn-watch btn-watch--more">Редактировать</div></a>
                                        <a href="{{ route('delete_test', ['test_info_id' => $test->id ]) }}" style="background-color: #c64b3f;" class="courseEdit-btn-watch btn-watch--more">Удалить</div></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="courseEdit-btn-watch_wrapper">
                    <a class="courseAdditional-btn-save" onclick="document.getElementById('add_lesson_form').submit();" href="##"><span>Зберегти заняття</span></a>
                </div>
            </form>

    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script type="text/javascript">
        function show(input) {
            var fileName = input.files[0].name;
            var test = $(input).closest('.courseAdditional-input-wrapper').find('.courseAdditional-input_input').val(fileName);            
        }

        function showFile(input){
            var fileName = input.files[0].name;
            var test = $(input).closest('.courseAdditional-input-wrapper').find('.courseAdditional-input_input').val(fileName);
            console.log(test);
            /* alert(fileName); */
        }

    </script>

    <script>
    
    $( document ).ready(function() {
        var q_count = $('#docs_count').val();
        var i;

        const myDocs = [];
        @if(isset($lesson_info))
            @foreach (json_decode($lesson_info->add_document) as $doc)
                myDocs.push('{!! $doc !!}');
            @endforeach
        @endif
        console.log(myDocs);
        for (i = 0; i < q_count; i++) {
            //var id_t = '#question_text' + (i);
            docs.addNewEntryWithText(myDocs[i]);
        }


    });

    
    </script>

    <script>
        var currentCounter = 0;
        var app1 = new Vue({
            el: '#app1',
            data: {
                ids: [
                    { id: currentCounter},
                ],
            },
            methods: {
                addNewEntry: function(){
                    currentCounter = currentCounter + 1;

                    this.ids.push({id: currentCounter});
                    //document.getElementById("videos_counter").value = currentCounter;
                    $('#videos_counter').val(currentCounter);

                },

            }
        });
    </script>
    <script>

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
                    //document.getElementById("docs_counter").value = docsCounter;
                    $('#docs_counter').val(currentCounter);
                },
                removeNewEntry: function(index){
                    currentCounter = currentCounter - 1;
                    this.ids.splice(index, 1);
                    document.getElementById("docs_counter").value = currentCounter;
                },
                addNewEntryWithText(value){
                    var doc_input_name = '#add_document_name' + docsCounter;
                    $(doc_input_name).val(value);
                    docsCounter = docsCounter + 1;
                    //tinymce.init({ selector: id_t });
                    console.log(doc_input_name);
                    this.ids.push({id: docsCounter});
                    //document.getElementById("docs_counter").value = docsCounter;
                    $('#docs_counter').val(currentCounter);
                }

            }
        });

    </script>

    <script>
        tinymce.init({
            selector: '.tinyMCE-area',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar:
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist | ' +
                'insertfile link image media pageembed template ',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
</body>




@section('scripts')
@endsection


@endsection
