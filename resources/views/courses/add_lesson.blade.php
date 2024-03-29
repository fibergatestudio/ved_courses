@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])

            <div class="cource-container--mobile">
                <form action="{{ route('add_lesson_apply', ['course_id' => $course_info->id ]) }}" id="add_lesson_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3 class="courseEdit-title courseControl-title">Додати заняття</h3>
                    <div class="courseEdit-block">
                        <div class="courseEdit-top">
                            Як це працює
                        </div>
                        <div class="courseAdd-wrapper">
                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">Опис<sup>*</sup></div>
                                </div>
                                <div class="courseAdd-inner_right">
                                    <textarea class="tinyMCE-area" id="course_description" name="course_description"></textarea>
                                </div>
                            </div>

                            <div class="courseAdditional-bottom-inner">
                                <div class="courseAdditional-bottom_left">
                                    <div class="courseAdd_left--name">Назва<sup>*</sup></div>
                                </div>
                                <div class="courseAdditional-bottom_right">
                                    <input class="courseAdditional--input" id="course_name" name="course_name" maxlength="250" type="text">
                                </div>
                            </div><br>

                            <div class="courseAdditional-bottom-inner">
                                <div class="courseAdditional-bottom_left">
                                    <div class="courseAdd_left--name">Час на вивчення (хвилини)<sup>*</sup></div>
                                </div>
                                <div class="courseAdditional-bottom_right">
                                    <input class="courseAdditional--input" id="learning_time" name="learning_time" type="text">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">Протокол</div>

                        <div class="courseAdd-wrapper">
                            <div class="newTest-mark-string courseAdd-access_restyling courseEdit-btn-margin">
                                <div class="newTest-mark-inner_left">Показати протокол</div>
                                <div class="newTest-mark-inner_right">
                                    <div class="newTest-mark-wrapper">
                                        <select class="newTest-mark-select" name="show_protocol">
                                            <option value="0">Hi</option>
                                            <option value="1">Так</option>
                                        </select>
                                        <div class="newTest-mark_arrowBlock"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">Опис<sup>*</sup></div>
                                </div>
                                <div class="courseAdd-inner_right">
                                    <textarea class="tinyMCE-area" name="course_protocol_descr"></textarea>
                                </div>
                            </div>

                            <div class="courseAdditional-bottom-inner courseAdd-inner_margbottom">
                                <div class="courseAdditional-bottom_left">
                                    <div class="courseAdd_left--name">Час на вивчення (хвилини)<sup>*</sup></div>
                                </div>
                                <div class="courseAdditional-bottom_right">
                                    <input class="courseAdditional--input" id="learning_protocol_time" name="learning_protocol_time" type="text">
                                </div>
                            </div>

                            <div class="courseAdditional-String">
                                Файли з розширенням PDF, DOC або DOCХ. Максимальний розмір - 20 Мб.
                            </div>

                            <div class="courseAdditional-flexbox">
                                <input type="hidden" id="docs_counter" name="docs_counter" value="0">
                                <div id="docs">
                                    <div v-for="(id,index) in ids" class="courseAdditional-flexbox">
                                    
                                        <div class="courseAdditional-flexbox_item">
                                            <div class="courseAdditional-left_text">Додати документ</div>
                                        </div>
                                        <div class="courseAdditional-flexbox_item courseAdditional-mobile-only">
                                            Файли з розширенням PDF, DOC або DOCХ. Максимальний розмір - 20 Мб.
                                        </div>
                                        <div class="courseAdditional-flexbox_item">
                                            <div class="courseAdditional-input-wrapper">
                                                <input class="courseAdditional-input_input" type="text" placeholder="Назва файлу">
                                                <input class="courseAdditional-input_button" type="file" :name="'add_document' + index" onchange="showFile(this)">
                                                <a class="courseAdditional-input_FakeButton" href="##">Завантажити</a>
                                            </div>
                                        </div> 
                                        <div class="courseAdditional-flexbox_item">
                                            <a class="courseAdditional-docName" href="##" @click="removeNewEntry(index)">

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div onclick="docs.addNewEntry()" class="btn btn-success">Добавить След. Док.</div> -->
                                <!-- <input type="file" class="form-control" :name="'add_document' + index" value=""> -->
                            </div>
                            <a class="courseAdditional-btn" href="##" onclick="docs.addNewEntry()">
                                <span>Додати наступний документ</span>
                            </a>
                        </div>
                    </div>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">Відеолекція</div>
                        <div class="courseAdd-wrapper">
                            <div class="courseAdditional-topName">
                                У разі відсутності відеоматеріалу до заняття буде відображено  повідомлення для студента <span> "В цьому занятті немає відео супроводу"</span>
                            </div>
                            <input type="hidden" id="videos_counter" name="videos_counter" value="0">
                            <div id="app1">
                                <div v-for="(id,index) in ids">
                                    <br>
                                    <hr>
                                    <div class="courseAdditional-topInput-wrapper">
                                        <div class="courseAdditional-topInput-left">
                                            Назва відео @{{ index + 1}}
                                        </div>
                                        <div class="courseAdditional-topInput-right">
                                            <input class="courseAdditional--input" type="text" :id="'video_name' + index" :name="'video_name' + index" value="">
                                        </div>
                                    </div>

                                    <div class="courseAdditional-bottom-inner courseAdd-inner_margbottom">
                                        <div class="courseAdditional-bottom_left">
                                            <div class="courseAdd_left--name">
                                                Довжина відео (хвилини) @{{ index + 1}}
                                            </div>
                                        </div>
                                        <div class="courseAdditional-bottom_right">
                                            <input class="courseAdditional--input" type="text" :id="'video_length' + index" :name="'video_length' + index">
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
                                                <input class="courseAdditional-input_input" type="text" placeholder="Посилання" :id="'video_link' + index" :name="'video_link' + index" required>
                                                <input class="courseAdditional-input_button" type="text" >
                                                <!-- <a class="courseAdditional-input_FakeButton" href="##">Додати</a> -->
                                            </div>
                                        </div>
                                        <div class="courseAdditional-flexbox_item">
                                            <div class="courseAdditional-flexbox_text">
                                                URL повинен бути типу: https://www.youtube.com/
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <a class="courseAdditional-docName docName-styling" :id="'video_text'+index" href="##">
                                        Довга назва посилання або завантаженого відео
                                    </a> -->
                                </div>
                                <a href="##" class="courseEdit-btn"
                                    style="padding: .4em 1em;
                                    max-width: 300px;
                                    color: lightcoral;
                                    border: 1px solid lightcoral;" @click="removeNewEntry(index)">
                                    <span>Видалити останнє відео</span>
                                </a>
                            </div>

                            <a class="courseAdditional-btn" href="##" onclick="app1.addNewEntry()">
                                <span>Додати наступне відео</span>
                            </a>
                        </div>
                    </div>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">3D модель</div>
                        <div class="courseAdd-wrapper">
                            <div class="courseAdditional-bottom-inner">
                                <div class="courseAdditional-bottom_left">
                                    <div class="courseAdd_left--name">Посилання<sup>*</sup></div>
                                </div>
                                <div class="courseAdditional-bottom_right">
                                    <input class="courseAdditional--input" name="model3d_link" type="text">
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">Тест</div>
                        <div class="courseAdd-wrapper">
                            <div class="courseAdditional-topName">
                                Цей блок надає можливість розробляти тести, які можуть містити питання різних типів. Дозволяється одна, або декілька спроб тесту, встановлюється обмеження часу. Кожна спроба оцінюється автоматично
                            </div>
                            <a class="courseAdditional-btn courseAdditional-btn_bottom" id="new_test_form" href="">
                                <span>Створити новий тест</span>
                            </a>
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>Номер тесту</th>
                                        <th>Назва</th>
                                        <th>Опис</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $test_num = 1; ?>
                                        @foreach($course_tests as $test)
                                            <tr>
                                                <td>{{ $test_num }}</td>
                                                <td>{{ $test->name }}</td>
                                                <td>{{ strip_tags($test->description) }}</td>
                                                <td>
                                                    <a href="{{ route('view_test_info_questions', ['test_info_id' => $test->id ]) }}"><div style="margin-bottom: 5px;" class="courseEdit-btn-watch btn-watch--more">Редактировать</div></a>
                                                    <a href="{{ route('delete_test', ['test_info_id' => $test->id ]) }}"><div style="background-color: #c64b3f;" class="courseEdit-btn-watch btn-watch--more">Удалить</div></a>
                                                </td>
                                            </tr>
                                            <?php $test_num++; ?>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="courseEdit-btn-watch_wrapper">
                        <a class="courseAdditional-btn-save" onclick="submitForm()" href="##"><span>Зберегти заняття</span></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


    <script>
        $( "#new_test_form" ).click(function(e) {
            e.preventDefault();
            console.log('clicked');
            $("#add_lesson_form").append("<input type='hidden' name='redirect_to_test' value='true' />");
            $( "#add_lesson_form" ).submit();
        });

    </script>

    <script type="text/javascript">
        function show(input) {
            var fileName = input.files[0].name;

            var fileExtension = ['mp4'];

            if ($.inArray($(input).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Неправильний формат файлу! Доступнi формати: "+fileExtension.join(', '));
            } else if(input.files[0].size >= 300000000){
                alert("Файл перевищує 300мб!");
            } else {
                var test = $(input).closest('.courseAdditional-input-wrapper').find('.courseAdditional-input_input').val(fileName);

                alert("Файл "+ fileName +" успішно додано!");
            }
        }

        function showFile(input){
            var fileName = input.files[0].name;

            var fileExtension = ['doc', 'docs', 'pdf'];

            if ($.inArray($(input).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Неправильний формат файлу! Доступнi формати: "+fileExtension.join(', '));
            } else if(input.files[0].size >= 20000000){
                alert("Файл перевищує 20мб!");
            } else {
                var test = $(input).closest('.courseAdditional-input-wrapper').find('.courseAdditional-input_input').val(fileName);

                alert("Файл "+ fileName +" успішно додано!");
            }
            /* alert(fileName); */
        }

        function submitForm(){

            // Получаем кол-во видео
            var video_counter = $('#videos_counter').val();

            var lesson_name = $.trim( $('#course_name').val() );
            var course_description = tinymce.get('course_description').getContent();
            var lesson_learning_time = $.trim( $('#learning_time').val() );
            var course_protocol_descr = tinymce.get('course_protocol_descr').getContent();
            var learning_protocol_time = $.trim( $('#learning_protocol_time').val() );
            //var course_description = tinymce.get('course_description').getContent();

            if(lesson_name == ''){
                alert('Введіть назву заняття!');
                return false;
            } else if(course_description == ''){
                alert('Введіть опис заняття!');
                return false;
            } else if(lesson_learning_time == ''){
                alert('Введіть "час на вивчення" заняття!');
                return false;
            } else if(course_protocol_descr == ''){
                alert('Введіть опис протоколу!');
                return false;
            } else if(learning_protocol_time == ''){
                alert('Введіть "час на вивчення" протоколу!');
                return false;
            } else {
                    if(video_counter > 0){
                        for(i = 0; i <= video_counter; i++){
                            // Имена инпутов для проверки
                            var number = i+1;
                            //var v_name = '#video_name' + i;
                            //var v_lenght = '#video_length' + i;
                            var v_link = '#video_link' + i;

                            // Получаем инфу
                            //var name = $.trim( $(v_name).val() );
                            //var length = $.trim( $(v_lenght).val() );
                            var link = $.trim( $(v_link).val() );

                                if (link  === '') {
                                    alert('Ссылка видео '+ number +' пустая.');
                                    return false;
                                } else if(i == video_counter){
                                    document.getElementById('add_lesson_form').submit();
                                }
                        }
                    } else if(video_counter == 0){
                        console.log(video_counter);

                            document.getElementById('add_lesson_form').submit();
                    }

            }
                //document.getElementById('add_lesson_form').submit();
            // Перебираем поля каждого видео
        }

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
                removeNewEntry: function(index){
                    //var id_t = '#question_text' + (currentCounter);
                    //tinymce.remove(id_t);
                    if(currentCounter >= 1){
                        currentCounter = currentCounter - 1;
                        this.ids.splice(index, 1);
                        document.getElementById("videos_counter").value = currentCounter;
                    }
                    
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
                    var test = document.getElementById("docs_counter").value;
                    console.log(test);
                    $('#docs_counter').val(docsCounter);
                },
                removeNewEntry: function(index){
                    docsCounter = docsCounter - 1;
                    this.ids.splice(index, 1);
                    document.getElementById("docs_counter").value = docsCounter;
                },

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
@endsection
