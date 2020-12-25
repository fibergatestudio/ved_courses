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
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])

            <div class="groups-control_edit-block mer-mw mer-pl-5">
                <h1 class='groups-head__title'>Додати групу</h1>
                @if(session()->has('message_error'))
                    <div class="alert alert-danger groups-edit__group-name uge_row_text-style uge__row">
                        {{ session()->get('message_error') }}
                    </div>
                @endif
                <div class="groups-edit">
                    <form action="{{ route('add_group_apply') }}" id="group_add_form" method="POST">
                        @csrf
                        <div class="groups-edit__group mw-100">
                            <p class="groups-edit__group-name eg-text-style">Назва групи</p>
                            <input class='eg-input' type="text" name="group_name"
                                placeholder="Повна назва групи" value="{{ old('group_name') }}">
                        </div>
                        <div class="groups-edit__group mw-100">
                            <p class="groups-edit__group-name eg-text-style">Додати студента</p>
                            <div class="groups-edit__student-add-form">
                                <input class='eg-input add-style' type="text" id="student" name="student"
                                    placeholder="Введіть ім'я студента" autocomplete="off">
                                <a class="add-student mer-w20" id="addstudent">Додати</a>
                                <ul class="dropdown-menu-list" style="display:block" id="studentList"></ul>
                            </div>
                        </div>
                        <div class="groups-edit__students-list mw-100">
                            <p class="groups-edit__group-name eg-text-style">Список студентів:</p>
                            <div class="col mer-studlist" id="studentsAdd1"></div>
                            <div class="col mer-studlist" id="studentsAdd2"></div>
                            <div class="col mer-studlist" id="studentsAdd3"></div>
                            <div class="col mer-studlist-m" id="studentsAdd"></div>
                        </div>
                        <div class="groups-edit__add-teacher-block mw-100">
                            <p class="groups-edit__current-teacher eg-text-style">Додати викладача</p>
                            @if($auth_teacher->role === 'teacher')
                            <input type="text" class="eg-input" value="{{ $auth_teacher->surname}} {{ $auth_teacher->name }} {{ $auth_teacher->patronymic }}" disabled style="margin-bottom: 30px;">
                            <input type="hidden" name="teacher_id" value="{{ $auth_teacher->id }}">
                            @else
                            <div class="select">                                                                
                                <select class="select-teacher mw-100" name="teacher_id" id="selectTeacher">
                                    <option>Немає</option>
                                    @foreach($teachers_list as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{-- {{ (old("teacher_id") == $teacher->id) ? "selected":"" }} --}}
                                        >{{ $teacher->surname}} {{ $teacher->name }} {{ $teacher->patronymic }}
                                    </option>
                                    @endforeach
                                </select>                                    
                            </div>
                            @endif
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
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script type="text/javascript" src="assets/js/slick.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    {{-- <script src="assets/js/main.js"></script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
    /* Создаем аррей с студентами */
    var students_array = new Array();
    var count_t = 1;
    var col_id = 1;

    $('#student').keyup(function(){
        let query = $(this).val();//.replace(/[A-Za-z]|[0-9]|\s+/g, ' ').trim();
        $(this).val(query);
        if(query != ''){
            axios.post("{{ route('autocomplete.fetch') }}", {
                ipt_str: query,
                students: students_array,
            })
            .then(function (response) {
                // console.log(response.data);
                $('#studentList').empty().fadeIn();
                response.data.forEach(function callback(currentValue, index, array) {
                    $('#studentList').append("\
                        <li><a href='#'>"+currentValue.full_name+"</a></li>\
                    ");
                });
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    });

    $('#studentList').on('click', 'li', function(e){
        e.preventDefault();
        $('#student').val($(this).text());
        $('#studentList').fadeOut();
    });

    $('#addstudent').click(function() {
        /* Берем имя текущего студента и очищаем от лишних пробелов*/
        var curr_stud = $('#student').val();//.replace(/[A-Za-z]|\s+/g, ' ').trim();

        /* Проверка на существующего студента в базе */
        axios.post("{{ route('autocomplete.fetch.check') }}", {
            student: curr_stud,
        })
        .then(function(response) {
            if (jQuery.inArray(response.data.full_name, students_array) != -1 ){
                alert("Студент "+response.data.full_name+" вже доданий!");
            } else {
                /* Общий */
                $('#studentsAdd'+col_id+', #studentsAdd').append("\
                    <div class='w-100' id='name"+count_t+"'>\
                        <div class='groups-edit__student-row mw-100 "+cust_even(count_t)+"'>\
                            <p class='student-number student-number-mer'>"+count_t+". &nbsp;</p>\
                            <p class='groups-edit__student groups-edit__student-mer'>"+curr_stud+"</p>\
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
                                            Ви дійсно бажаєте видалити <br> студента "+curr_stud+" зі списку?\
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
                    </div>\
                ");
                $('#studentsAdd'+col_id).append("\
                    <input type='hidden' name='student_name[]' value='" + curr_stud +"'>\
                ");
                /* Добавляем текущего студента в аррей */
                count_t++;
                students_array.push(curr_stud);

                $('#student').val('');

                /*Проверка столбца для ввода*/
                if (col_id == 1){
                    col_id = 2;
                } else if (col_id == 2){
                    col_id = 3;
                } else if (col_id == 3){
                    col_id = 1;
                }
            }
        })
        .catch(function(error) {
            console.log(error);
            /*Пока костыль на ошибку*/
            alert('Студента не знайдено, будь ласка виберіть студента з випадаючого списку!');
        });
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
        // console.log(div_name);
        setTimeout(function(){ $( div_name ).remove(); count_t--; }, 500);
        // console.log(students_array);
        // console.log("RemoveStud " + curr_stud);
    }

    $('#createGroup').click(function(e){
        e.preventDefault();

        if ($("input[name='group_name']").val() == ""){
            alert("Додайте назву групи!");
        } else if (count_t <= 1){
            alert("Додайте мінімум одного студента!");
        } else if ($('select[name=teacher_id]').val() == "Немає"){
            alert("Додайте викладача!");
        } else {
            $('#group_add_form').submit();
        }
    });

    $('#backToGroups').click(function(e){
        e.preventDefault();
        window.location.href = "/groups";
    });
</script>
@endsection
