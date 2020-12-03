@extends('layouts.front.front_child')


@section('style')

<style>

.dropdown-menu-list{
    position: absolute !important;
    top: 180px;
    left: 13px;
    z-index: 1000;
    float: left;
    min-width: 10rem;
    padding: 0.5rem 0;
    margin: 0.125rem 0 0;
    font-size: 1.4rem;
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
{{--<div style="display:none;" class="container">
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
        </div>
    @endif
    @if(session()->has('message_error'))
        <div class="alert alert-warning">
            {{ session()->get('message_error') }}
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
                <div class="card-header">{{ __('Добавить группу') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- <form action="{{ route('add_group_apply') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Название группы</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label>Студенты</label>
                            <div style="display:flex;">
                                <input type="text" id="student" class="form-control" name="student" value="">
                                <div id="studentList">
                                </div>
                                <a id="addstudent" style="color:white;" class="btn btn-success">Добавить</a>
                            </div>
                        </div>
                        <div id="studentsAdd" class="form-group">
                            <label>Список студентов</label><br>
                        </div>
                        <div class="form-group">
                            <label>Учителя</label>
                            <select class="form-control">
                                <option>Нет</option>
                                @foreach($teachers_list as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Создать</button>
                    </form> -->
                        <a href="{{ route('groups_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>--}}


 {{-- <body> --}}

    {{--<!-- Burger-menu (begin)-->
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

    <!-- deleteBtn modal-page (end) -->

    <!-- show students modal start -->
    <!-- deleteBtn modal-page (begin) -->
    <!-- <div class="bootstrap-restylingStudent modal fade" id="showStudents" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog_restyle">
            <div class="modal-content">
                <div class="deleteMenu-wrapper">
                    <div class="deleteMenu-text">
                        <h3 class="modal-students-title">ПІБ Студента</h3>
                        <div class="groups__elem student-data"><span>1. &nbsp;</span>Іванов Іван Іванович</div>
                        <div class="groups__elem student-data"><span>2. &nbsp;</span>Іванов Іван Іванович</div>
                        <div class="groups__elem student-data"><span>3. &nbsp;</span>Іванов Іван Іванович</div>
                        <div class="groups__elem student-data"><span>4. &nbsp;</span>Іванов Іван Іванович</div>
                        <div class="groups__elem student-data"><span>5. &nbsp;</span>Іванов Іван Іванович</div>
                        <div class="groups__elem student-data"><span>6. &nbsp;</span>Іванов Іван Іванович</div>
                        <div class="groups__elem student-data"><span>7. &nbsp;</span>Іванов Іван Іванович</div>
                    </div>
                </div>
                </ul>
            </div>
        </div>
    </div> -->


    <!-- deleteBtn modal-page (end) -->

    <!-- show students modal end -->--}}
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])

            {{-- @if(Auth::user()->role == "admin")
                    @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])
                @elseif(Auth::user()->role == "teacher")
                    @include('layouts.front.includes.teacher_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])
                @endif --}}

            <div class="groups-control_edit-block mer-mw mer-pl-5">
                <h1 class='groups-head__title'>Додати групу</h1>
                <div class="groups-edit">
                    <form action="{{ route('add_group_apply') }}" id="group_add_form" method="POST">
                        @csrf
                        <!-- <div class="groups-edit__teacher-block">
                            <p class="groups-edit__current-teacher eg-text-style">Поточний викладач: &nbsp;</p>
                            <p class="groups-edit__teachers-name"> Іванов Іван Іванович</p>
                        </div> -->
                        <div class="groups-edit__group mw-100">
                            <p class="groups-edit__group-name eg-text-style">Назва групи</p>
                            <input class='eg-input' type="text" name="name" id="getCourseName"
                                placeholder="Повна назва групи">
                        </div>
                        <div class="groups-edit__group mw-100">
                            <p class="groups-edit__group-name eg-text-style">Додати студента</p>
                            <div class="groups-edit__student-add-form">
                                <input class='eg-input add-style' type="text" id="student" name="student" id="getCourseName"
                                    placeholder="Введіть ім'я студента">
                                <a class="add-student mer-w20" id="addstudent">Додати</a>
                                <div id="studentList">
                                </div>
                            </div>
                        </div>
                        <!-- <div id="studentsAdd" class="form-group">
                            <label>Список студентов</label><br>
                        </div> -->
                        <div class="groups-edit__students-list mw-100">
                            <p class="groups-edit__group-name eg-text-style">Список студентів:</p>
                            <div class="groups-edit__student-col col" id="studentsAdd1"></div>
                            <div class="groups-edit__student-col col" id="studentsAdd2"></div>
                            <div class="groups-edit__student-col col" id="studentsAdd3"></div>
                        </div>
                        <div class="groups-edit__add-teacher-block mw-100">
                            <p class="groups-edit__current-teacher eg-text-style">Додати викладача</p>
                            <div class="select">
                                <select class="select-teacher mw-100" name="teacher_id" id="selectTeacher">
                                    <option>Нет</option>
                                    @foreach($teachers_list as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->surname}} {{ $teacher->name }} {{ $teacher->patronymic }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="groups-edit__buttons-block mw-100">
                            <button type="submit" class="groups-edit__create-group" id="createGroup">Створити</button>
                            <button class="groups-edit__back-to-groups" id="backToGroups">Назад</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>

        /* Создаем аррей с студентами */
        var students_array = new Array();
        var count_t = 1;
        var col_id = 1;

        $('#student').keyup(function(){
            /*Запрет на ввод английских букв и цифр*/
            var query = $(this).val($(this).val().replace(/[A-Za-z]|[0-9]/g, ''));
            if(query != ''){
               /* var product_id = 15;
                var url = '{{ route("autocomplete.fetch", ":id") }}';
                url = url.replace(':id',product_id); */

                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetch') }}" + "/?students=" + students_array,
                    method:"GET",
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

        $('#addstudent').click(function() {
            /* Берем имя текущего студента и убираем лишние пробелы и цифры*/
            var curr_stud = $('#student').val().replace(/\s+/g, ' ').trim().replace(/[0-9]/g,"");
            // console.log(curr_stud);
            // console.log(students_array);
            /*Валидация на пустое значение или пустую строку*/
            if(curr_stud.replace(/\s|[0-9]/g,"") == ""){
                alert("Неприпустимий формат строки! Будь ласка додайте мінімум одного студента!");
            }else{
                /*НУЖНА проверка на соответсвие студента с БД!*/



                /* Если студент есть в аррее */
                if(jQuery.inArray(curr_stud, students_array) != -1 ){
                    alert("Студент "+ curr_stud + " Вже доданий!");
                }else{
                    /* $('#studentsAdd').append("<div class='groups-edit__student-row'><p class='student-number'>" + count_t + ". &nbsp;</p><p class='groups-edit__student'>" + curr_stud + "</p><a class='delete-student' data-toggle='modal' data-target='#deleteModal"+ count_t +"'>X</a></div>");
                    $('#studentsAdd').append("<div class='bootstrap-restylingStudent modal fade' id='deleteModal"+count_t+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'><div class='modal-dialog  modal-dialog_restyle'><div class='modal-content'><div class='deleteMenu-wrapper'><div class='deleteMenu-topImg'><img src='/img/basket.png' alt='icon'></div><div class='deleteMenu-text'>Ви дійсно бажаєте видалити <br> студента "+curr_stud+"зі списку?</div><div class='deleteMenu-btn'><a class='flexTable-btn_delete' id='removeStudent' href='##' onclick='removeStud("+count_t+")'><span>Видалити</span></a></div></div></ul></div></div></div>");
                    //$('#studentsAdd').append( "<button class='btn btn-success m-1' disabled>"+ curr_stud + "</button>" );
                    $('#studentsAdd').append( "<input type='hidden' name='student_name[]' value='" + curr_stud +"'>" ); */

                    /* Общий */
                    $('#studentsAdd'+col_id).append("\
                    <div class='w-100' id='name"+count_t+"'>\
                        <div class='groups-edit__student-row mw-100 "+cust_even(count_t)+"'>\
                            <p class='student-number student-number-mer'>" + count_t + ". &nbsp;</p>\
                            <p class='groups-edit__student groups-edit__student-mer'>" + curr_stud + "</p>\
                            <a class='delete-student delete-student-mer' href='' data-toggle='modal' data-target='#deleteModal"+ count_t +"'>X</a>\
                        </div>\
                        <div class='bootstrap-restylingStudent modal fade' id='deleteModal"+count_t+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>\
                            <div class='modal-dialog  modal-dialog_restyle'>\
                                <div class='modal-content'>\
                                    <div class='deleteMenu-wrapper'>\
                                        <div class='deleteMenu-topImg'>\
                                            <img src='/img/basket.png' alt='icon'>\
                                        </div>\
                                        <div class='deleteMenu-text'>\
                                            Ви дійсно бажаєте видалити <br> студента "+curr_stud+"зі списку?\
                                        </div>\
                                        <div class='deleteMenu-btn'>\
                                            <a class='flexTable-btn_delete' id='removeStudent' data-dismiss='modal' aria-label='Close' onclick='removeStud("+count_t+")'>\
                                                <span>Видалити</span>\
                                            </a>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                        <input type='hidden' name='student_name[]' value='" + curr_stud +"'>\
                    </div>\
                    ");
                    /* Добавляем текущего студента в аррей */
                    count_t++;
                    students_array.push(curr_stud);

                    alert($this);
                    /*Проверка столбца для ввода*/
                    if(col_id == 1){
                        col_id = 2;
                    }else if(col_id == 2){
                        col_id = 3;
                    }else if(col_id == 3){
                        col_id = 1;
                    }
                }
            }
        });

        /*Проверка на четный нечетный*/
        function cust_even(count_t){
            if (count_t % 2 == 0)
                return '';
            if (count_t % 2 == 1)
                return 'bgc-mer';
        }

        function removeStud(curr_stud) {
            students_array.splice( $.inArray(curr_stud,students_array) ,1 );
            var div_name = "#name" + curr_stud;
            console.log(div_name);
            setTimeout(function(){ $( div_name ).remove(); count_t--; }, 500);

            console.log(students_array);
            console.log("RemoveStud " + curr_stud);
        }
        $('#createGroup').click(function(e){
            e.preventDefault();

            if(count_t <= 1){
                alert("Додайте мінімум одного студента!");
            } else {
                $('#group_add_form').submit();
            }
        });
        $('#backToGroups').click(function(e){
            e.preventDefault();
            window.location.href = "/groups";
        });



    </script>

{{-- </body> --}}

@section('scripts')

@endsection


@endsection
