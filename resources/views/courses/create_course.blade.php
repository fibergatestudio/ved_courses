@extends('layouts.front.front_child')

@section('content')
{{-- <div style="display:none;" class="container">
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
                <div class="card-header">{{ __('Создать Курс') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('create_course') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Название Курса</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>

                        <div id="studentsAdd" class="form-group">
                            <label>Описание Курса</label>
                            <textarea type="text" class="form-control" name="description" value=""></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control" name="course_image" >
                        </div>
                        <br>

                        <button type="submit" class="btn btn-success">Создать</button>
                    </form>
                        <a href="{{ route('courses_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}


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

    <!-- student modal-page (end) -->

    <!-- deleteBtn modal-page (begin) -->



    <!-- deleteBtn modal-page (end) -->

     <!-- deleteMENU modal-page (begin) -->


    <!-- deleteMENU modal-page (end) --> --}}
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])

            {{-- @if(Auth::user()->role == "admin")
                @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])
            @elseif(Auth::user()->role == "teacher")
                @include('layouts.front.includes.teacher_sidebar_vrst')
            @endif --}}

            <div class="cource-container--mobile">
                <form action="{{ route('create_course') }}" method="POST" id="create_course" enctype="multipart/form-data">
                    @csrf
                        <h3 class="courseEdit-title courseControl-title">Створити курс</h3>

                        <div class="courseEdit-block">
                            <div class="courseEdit-top">
                                Назва та опис курсу
                            </div>
                            <div class="courseAdd-wrapper">

                                <div class="courseAdd-inner courseAdd-inner_margbottom">
                                    <div class="courseAdd-inner_left">
                                        <div class="courseAdd_left--name">
                                            Назва<sup>*</sup>
                                        </div>
                                    </div>
                                    <div class="courseAdd-inner_right">
                                        <input class="course-faq--input courseAdditional--input"  name="name" type="text">
                                    </div>
                                </div>

                                <div class="courseAdd-inner courseAdd-inner_margbottom">
                                    <div class="courseAdd-inner_left">
                                        <div class="courseAdd_left--name">
                                            Опис<sup>*</sup>
                                        </div>
                                    </div>
                                    <div class="courseAdd-inner_right">
                                        <textarea class="tinyMCE-area" name="description"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="courseEdit-block">
                            <div class="courseEdit-top">
                                Фото курсу
                            </div>
                            <div class="courseAdd-wrapper">
                                <div class="courseAdd-grid">
                                    <div class="courseAdd-grid_item">
                                        Додати фото
                                    </div>
                                    <div class="courseAdd-grid_item">

                                        <div class="courseAdditional-input-wrapper">
                                            <input class="courseAdditional-input_input" type="text" placeholder="Назва файлу">
                                            <input class="courseAdditional-input_button" type="file" name="course_image">
                                            <a class="courseAdditional-input_FakeButton" href="##">Завантажити</a>
                                        </div>

                                        <div class="courseAdd-info-wrapper">
                                            <a class="courseAdditional-docName docName-restyling" id="img_upload_name" href="##">
                                                Довга назва фото
                                            </a>
                                        </div>

                                    </div>
                                    <div class="courseAdd-grid_item">
                                        Короткі зауваження щодо додавання фото курсу.
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="courseEdit-btn-watch_wrapper">
                            <a class="courseEdit-btn-watch btn-watch--more" id="submit_button" href="##"><span>Зберегти курс</span></a>
                        </div>
                    </form>
        </div>
    </div>

    </section>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        $(document).ready(function() {
            $('input[type="file"]').change(function(e) {
                var geekss = e.target.files[0].name;
                //alert(geekss);
                $("#img_upload_name").text(geekss);

            });
        });
    </script>
    <script>

    $( "#submit_button" ).click(function() {
        $( "#create_course" ).submit();
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
                'insertfile link image media pageembed template ' ,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

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
