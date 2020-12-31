@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])

            <div class="cource-container--mobile">
                <form action="{{ route('edit_course_apply', ['course_id' => $course_info->id ]) }}" id="edit_course_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3 class="courseEdit-title courseControl-title">Редагування курсу</h3>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">Назва та опис курсу</div>
                        <div class="courseAdd-wrapper">
                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">Назва<sup>*</sup></div>
                                </div>
                                <div class="courseAdd-inner_right">
                                    <input class="course-faq--input courseAdditional--input"
                                        name="name" value="{{ $course_info->name }}" type="text">
                                </div>
                            </div>

                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">Опис<sup>*</sup></div>
                                </div>
                                <div class="courseAdd-inner_right">
                                        <textarea class="tinyMCE-area" name="description"
                                            value="">{{ $course_info->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">Фото курсу</div>
                        <div class="courseAdd-wrapper">
                            <div class="courseAdd-grid">
                                <div class="courseAdd-grid_item">Додати фото</div>
                                <div class="courseAdd-grid_item">

                                    <div class="courseAdditional-input-wrapper">
                                        <input class="courseAdditional-input_input" type="text" placeholder="Назва файлу" >
                                        <input class="courseAdditional-input_button" type="file" name="course_image">
                                        <a class="courseAdditional-input_FakeButton" href="##">Завантажити</a>
                                    </div>

                                    <div class="courseAdd-info-wrapper">
                                        <img @if(!empty($course_info->course_image_path)) src="/images/{{ $course_info->course_image_path }}" @endif id="imgprev" heigth="150" width="150">
                                        <a class="courseAdditional-docName docName-restyling" id="img_upload_name" style="padding-right: 145px;"  href="{{ route('delete_photo', ['course_id' => $course_info->id ] )}}">
                                            @if(!empty($course_info->course_image_path))
                                                {{ $course_info->course_image_path }}
                                            @else
                                                Нема фото
                                            @endif
                                        </a>
                                    </div>

                                </div>
                                <div class="courseAdd-grid_item">Файли з розширенням JPG, JPEG, або PNG. Максимальний розмір - 5 Мб</div>
                            </div>
                        </div>
                    </div>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">Про курс</div>
                        <div class="courseEdit-about">
                            <h5 class="courseEdit-about_title">Про цей курс</h5>

                            <div class="courseEdit-textblock main-textblock">
                                @if(isset($course_information->course_description))
                                    {!! $course_information->course_description !!}
                                @endif
                            </div>

                            <div class="main-learn">
                                <h4 class="courseEdit-learn main-learn_title">Чого ви навчитесь</h4>
                                <div class="courseEdit-learn_wrapper main-learn_wrapper">
                                @if(isset($course_information->course_learn_arr))
                                    @foreach(json_decode($course_information->course_learn_arr) as $learn)

                                        <div class="main-learn_inner">
                                            <div class="main-learn_inner--icon"></div>
                                            <div class="main-learn_inner--text">{!! $learn !!}</div>
                                        </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                            <div class="courseEdit-separator separator"></div>
                            <div class="courseEdit-btn_wrapper">
                                <a href="{{ route('edit_about', ['course_id' => $course_info->id ]) }}" class="courseEdit-btn">
                                    <span>редагувати</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">
                            Викладачi
                        </div>
                        <div class="courseAdd-wrapper">
                            <div class="newTest-mark-string courseEdit-select_restyling courseEdit-btn-margin">
                                <div class="newTest-mark-inner_left">
                                    Викладач курсу
                                </div>
                                <div class="newTest-mark-inner_right">
                                    <div class="newTest-mark-wrapper">
                                        <select class="newTest-mark-select" name="assigned_teacher_id">
                                            <option>Выберите</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" @if($teacher->id == $course_info->assigned_teacher_id ) selected @endif>{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="newTest-mark_arrowBlock"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($assigned_teachers as $teacher)
                            <div class="courseEdit-teachers teachers-grid_wrapper" id="teacher{{ $teacher->id }}">
                                <div class="teachers-grid_item">
                                    @if (App\User::find($teacher->id)->getMedia('photos')->last())
                                        <div class="courseEdit-item_photo" style="background-image: url({{ asset(App\User::find($teacher->id)->getMedia('photos')->last()->getUrl('thumb_big')) }}) !important;"> </div>
                                    @else
                                        <div class="courseEdit-item_photo"> </div>
                                    @endif
                                </div>
                                <div class="teachers-grid_item">
                                        <div class="teachers-item_name d-flex">
                                        <a class="courseAdditional-docName justify-content-end" href="##" onclick="deleteTeacher({{ $teacher->id }});" style="width: 0px;"></a>{{ $teacher->surname }} {{ $teacher->name }} {{ $teacher->patronymic }}
                                        </div>
                                    <div class="courseEdit-item_position teachers-item_position col">Професор наук</div>
                                </div>
                                <div class="teachers-grid_item">
                                    <div class="courseEdit-item_text teachers-item_text">
                                        {{ $teacher->descr }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">Доступ до курсу</div>
                        <div class="courseAdd-wrapper">
                            <div class="newTest-mark-string courseAdd-access_restyling courseEdit-btn-margin">
                                <div class="newTest-mark-inner_left">Доступ до курсу мають</div>
                                <div class="newTest-mark-inner_right">
                                    <div class="newTest-mark-wrapper">
                                        <select class="newTest-mark-select" name="visibility">
                                            <option value="all" @if($course_info->visibility == "all") selected @endif>Всі користувачі</option>
                                            <option value="register" @if($course_info->visibility == "register") selected @endif>Тільки зареєстровані користувачі</option>
                                        </select>
                                        <div class="newTest-mark_arrowBlock"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $course_num=1; ?>

                    @foreach($course_lessons as $lesson)
                        <div class="courseEdit-block">
                            <div class="courseEdit-top">
                                Програма курсу
                                <a href="{{ route('delete_lesson', ['course_id' => $course_info->id, 'lesson_id' => $lesson->id ]) }}" style="margin-left: 8px;" class="courseAdditional-docName"></a>
                            </div>
                            <div class="courseEdit-grid_wrapper">
                                <div class="courseEdit-grid_item">
                                    <div class="programs-item_lesson--number">0{{ $course_num }}</div>
                                    <div class="programs-item_lesson--text">Заняття {{ $course_num }}</div>
                                </div>
                                <div class="courseEdit-grid_item">
                                    <div class="courseEdit-item_chapter programs-item_chapter">{{ strip_tags($lesson->course_name) }}
                                        <picture>
                                            <source srcset="/img/pencil-edit-small.png" media="(max-width:592px)">
                                            <a href="{{ route('edit_lesson', ['course_id' => $course_info->id , 'lesson_id' =>$lesson->id ]) }}"><img class="courseEdit-item_image" src="/img/pencil-edit.png" alt="pencil-image"></a>
                                        </picture>
                                    </div>
                                </div>
                                <div class="courseEdit-grid_item">
                                    <?php $clear_descr = str_replace("&nbsp;", '', $lesson->course_description); ?> 
                                    <div class="programs-item_text">{{ strip_tags($clear_descr) }}</div>
                                </div>
                                <div class="courseEdit-grid_item">
                                    <div class="programs-item_hours"><a href="##">{{ $lesson->learning_time }} години на завершення</a> </div>
                                </div>
                                <div class="courseEdit-grid_item">
                                    <div class="courseEdit-item_faq courseEdit-item_button">
                                        <a href="##">Як це працює</a>
                                    </div>
                                    <div class="courseEdit-hidden">
                                        <div class="courseEdit-underline"></div>
                                        {{ strip_tags($lesson->course_description) }}
                                        {{-- <table class="hidden-menu">
                                            <tbody>
                                                <tr class="hidden-menu_string">
                                                    <td class="courseEdit-hidden_column hidden-menu_column">{{ $lesson->learning_time }} хв.</td>
                                                    <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                                    <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">{{ strip_tags($lesson->course_description) }}</a></td>
                                                </tr>
                                            </tbody>
                                        </table>--}}
                                    </div>

                                    <div class="courseEdit-item_book courseEdit-item_button">
                                        <a href="##">Протокол</a>
                                    </div>
                                    <div class="courseEdit-hidden">
                                        <div class="courseEdit-underline"></div>
                                        @if($lesson->show_protocol == 1)
                                            Є протокол
                                        @else
                                            Нема протоколу
                                        @endif
                                        {{-- <table class="hidden-menu">
                                            <tbody >
                                                <tr class="hidden-menu_string">
                                                    <td class="courseEdit-hidden_column hidden-menu_column">{{ $lesson->learning_protocol_time }} хв.</td>
                                                    <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                                    <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">{{ $lesson->course_protocol_descr }}</a></td>
                                                </tr>
                                            </tbody>
                                        </table> --}}
                                    </div>

                                    <div class="courseEdit-item_video courseEdit-item_button">
                                        <a href="##">Відеолекція</a>
                                    </div>
                                    <div class="courseEdit-hidden">
                                        <div class="courseEdit-underline"></div>
                                        <div class="courseEdit_video">{{ $lesson->video_count }} відео</div>

                                        <table class="hidden-menu">
                                            <tbody>
                                            @foreach($lesson->video_arr as $l_video)
                                                @if(isset($l_video['video_length']) && isset($l_video['video_name'] ))
                                                <tr class="hidden-menu_string">
                                                    @if(isset($l_video['video_length']))<td class="courseEdit-hidden_column hidden-menu_column"> {{ $l_video['video_length'] }} хв.</td>@endif
                                                    <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                                    @if(isset($l_video['video_name'] ))<td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">{{ $l_video['video_name'] }}</a></td>@endif
                                                </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="courseEdit-item_test courseEdit-item_button">
                                        @if(isset($lesson->test_id))
                                            <a href="{{ route('view_test_info_questions', ['test_info_id' => $lesson->test_id ]) }}">Тест
                                                <img class="courseEdit-item_image" src="/img/pencil-edit-small.png" alt="pencil-image">
                                            </a>
                                        @endif
                                    </div>
                                    {{--<div class="courseEdit-hidden">
                                        <div class="courseEdit-underline"></div>
                                        <table class="hidden-menu">
                                            <tbody >
                                                <tr class="hidden-menu_string">
                                                    <td class="courseEdit-hidden_column hidden-menu_column">20 хв.</td>
                                                    <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                                    <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <?php $course_num++; ?>
                    @endforeach

                    <div class="courseEdit-btn_wrapper">
                        <a href="{{ route('add_lesson', ['course_id' => $course_info->id ]) }}" class="courseEdit-btn courseEdit-btn-add">
                            <span>Додати заняття</span>
                        </a>
                    </div>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">
                            Поширені запитання
                        </div>
                        @foreach($courses_question_answers as $faq)
                            <div class="main-faq_panel active">{{ strip_tags($faq->course_question) }}</div>
                            <?php $clear_answer = str_replace("&nbsp;", '', $faq->course_answer); ?>
                            <div class="main-faq_panel--inner show">{{ strip_tags($clear_answer) }}</div>
                        @endforeach

                        <div class="courseEdit-btn_wrapper">
                            @if(count($courses_question_answers) != 0)
                            <a href="{{ route('edit_question', ['course_id' => $course_info->id ]) }}" style="max-width:310px;" class="courseEdit-btn courseEdit-btn-add courseEdit-btn-margin">
                                <span>Ред. запитання</span>
                            </a>
                            @else
                            <a href="{{ route('add_question', ['course_id' => $course_info->id ]) }}" style="max-width:310px;" class="courseEdit-btn courseEdit-btn-add courseEdit-btn-margin">
                                <span>Додати запитання</span>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="courseEdit-btn-watch_wrapper">
                        <a class="courseEdit-btn-watch btn-watch--more" id="submit_button" href="##"><span>Зберегти курс</span></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>
    function deleteTeacher(teacher_id){
        console.log("Текущий айди: " + teacher_id);
        var removeItem = teacher_id;
        var teacher_block_id = '#teacher' + teacher_id;
        $(teacher_block_id).remove();

        @if(isset($course_info->assigned_teacher_id))
        var cur_teacher_arr = {!! $course_info->assigned_teacher_id !!};
        console.log("Текущий аррей: " + cur_teacher_arr);
        @endif


        var course_id = {!! $course_info->id !!};
        //var new_teacher_arr = cur_teacher_arr.splice( $.inArray(teacher_id, cur_teacher_arr), 1);

        cur_teacher_arr = $.grep(cur_teacher_arr, function(value) {
            return value != removeItem;
        });
        console.log("Новый аррей: " + cur_teacher_arr);

        axios.post("{{ route('ajax_remove_teacher') }}", {
            course_id: course_id,
            teachers: cur_teacher_arr,
        })
        .then(function (response) {
            console.log(response.data);
            location.reload();
        })
        .catch(function (error) {
            console.log(error);
        });


    } 

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imgprev').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function arrayRemove(arr, value) {

        return arr.filter(function(ele){
            return ele != value;
        });
    }

    $(document).ready(function() {
        $('input[type="file"]').change(function(e) {
            var geekss = e.target.files[0].name;

            var fileExtension = ['jpeg', 'jpg', 'png'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Неправильний формат файлу! Доступнi формати: "+fileExtension.join(', '));
            } else {
                readURL(this);
                alert("Фото "+ geekss + " успішно додано!");
                $("#img_upload_name").text(geekss);
                //$( "#edit_course_form" ).submit();
            }

        });
    });
    


$( "#submit_button" ).click(function() {
    $( "#edit_course_form" ).submit();
});


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
            'insertfile link image media pageembed template ' ,
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>

@endsection
