@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])

            <form onsubmit="formEditGroup(this);return false;" action="{{ route('apply_edit_group',['group_id' => $group_info->id]) }}" method="POST">
            @csrf
                <div class="ge">
                    <h3 class="ccec__main-title">Редагування групи</h3>
                    <div class="ccec-header ge__header">
                        @if(session()->has('message_success'))
                            <div class="alert alert-success groups-edit__group-name uge_row_text-style uge__row">
                                {{ session()->get('message_success') }}
                            </div>
                        @endif
                        @if(session()->has('message_error'))
                            <div class="alert alert-danger groups-edit__group-name uge_row_text-style uge__row">
                                {{ session()->get('message_error') }}
                            </div>
                        @endif
                        <div class="groups-edit__teacher-block ge__teacher-course">
                            <p class="groups-edit__current-teacher eg-text-style ge__mb-20">
                                <span class="ccec-header_style">Поточний викладач:&nbsp;</span>
                                <span class="ccec-header_style" id="currentTeacher">{{ $group_info->assigned_teacher_name ?? 'Немає' }}</span>
                            </p>
                            <p class="groups-edit__current-teacher eg-text-style">
                                <span class="ccec-header_style">Назва курсу :&nbsp;</span> </p>
                                <select class='eg-input uge__input_style' name="course_number" style="height: 50px">
                                    <option value="">Повна назва курсу студента</option>
                                        @if($courses)
                                            @foreach($courses as $course)
                                                @if($course->name === $group_info->course_number)
                                                    <option value="{{ $course->name }}" selected>{{ $course->name }}</option>
                                                @else
                                                    <option value="{{ $course->name }}">{{ $course->name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                </select>
                                <!-- <span class="ccec-header_style" id="courseNamer"></span> -->
                            <!-- </p> -->
                        </div>
                        <div class="groups-edit__group ccec__add-student-block_style inputs-row">
                            <p class="groups-edit__group-name eg-text-style ge__m-input-header">Назва групи</p>
                            <div class="groups-edit__student-add-form ">
                                <input class='eg-input add-style ccec__input' type="text" name="nameGroup" value="{{ $group_info->name }}"
                                    id="getCourseName" placeholder="Повна назва групи">
                                <a class="add-student ccec__button ge__m-button" href="##"
                                    data-toggle="modal" data-target="#changeGroupNameM">Зберегти</a>
                                @include('layouts.front.includes.modals.change_group_name')
                            </div>
                            <p class="groups-edit__group-name eg-text-style ge__input-subtext">
                                Назву курсу редагується при гострій необхідності та при узгодженні з Адміністрацією закладу.
                            </p>
                        </div>
                        <div class="groups-edit__group ccec__add-student-block_style inputs-row">
                            <p class="groups-edit__group-name eg-text-style ge__m-input-header">Додати студента</p>
                            <div class="groups-edit__student-add-form ">
                                <input class='eg-input add-style ccec__input' id="student" type="text" name="student_name"
                                    placeholder="Іванов Іван Іванович" autocomplete="off">
                                <a id="addstudent" class="add-student ccec__button ge__m-button">Додати</a>
                                <ul class="dropdown-menu" id="studentList"></ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flexTable-wrapper ge">
                    <div class="flexTable-scrollContainer">
                        <div class="sc-scrollInner">
                            <div class="sc-topTitle" style="padding: 0 30px 0 15px" id="name0">
                                <div class="ccec__sc-topTitle_inner-mer student-number-mer">№</div>
                                <div class="ccec__sc-topTitle_inner-mer col text-center">ПІБ студента</div>
                                <div class="ccec__sc-topTitle_inner-mer col text-center">Номер групи</div>
                                <div class="ccec__sc-topTitle_inner-mer col text-center">Номер телефону</div>
                                <div class="ccec__sc-topTitle_inner-mer col text-center">Email</div>
                                <div class="ccec__sc-topTitle_inner-mer col text-center">Номер студ.квитка</div>
                                <div class="ccec__sc-topTitle_inner-mer col text-center">ПІБ викладача</div>
                                <div class="ccec__sc-topTitle_inner-mer col text-center">Управління</div>
                            </div>

                            @foreach($students_array as $student)
                                <div class="sc-string ccec__row" id="name{{ $loop->iteration }}">
                                    <div class="ccec__string-inner-mer student-number-mer">{{ $loop->iteration }}.</div>
                                    <div class="ccec__string-inner-mer col text-center">@if(isset($student->full_name)){{ $student->full_name }}@else-@endif</div>
                                    <div class="ccec__string-inner-mer col text-center">@if(isset($student->group_number)){{ $student->group_number }}@else-@endif</div>
                                    <div class="ccec__string-inner-mer col text-center">@if(isset($student->student_phone_number)){{ $student->student_phone_number }}@else-@endif</div>
                                    <div class="ccec__string-inner-mer col w-wrap text-center">@if(isset($student->student_email)){{ $student->student_email }}@else-@endif</div>
                                    <div class="ccec__string-inner-mer col text-center">@if(isset($student->student_number)){{ $student->student_number }}@else-@endif</div>
                                    <div class="ccec__string-inner-mer col text-center" id="teach{{ $loop->iteration }}">@if(isset($student->teacher_fio)) {{ $student->teacher_fio }} @else-@endif</div>
                                    <div class="ccec__string-inner-mer col text-center">
                                        <a class="flexTable-btn_delete ccec__delete-btn" href="##" data-toggle="modal"
                                            data-target="#deleteModal{{ $loop->iteration }}"><span>Видалити</span>
                                        </a>
                                        @include('layouts.front.includes.modals.delete_student', [
                                            'modalId' => 'deleteModal',
                                            'secondId' => $loop->iteration,
                                            'target' => $student->full_name
                                        ])
                                    </div>
                                    <input type="hidden" name="student_name[]" value="@if(isset($student->full_name)){{ $student->full_name }}@else''@endif">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="flexMobile-wrapper sc-wrapper_restyle ccec" id="mobi0">
                    @foreach($students_array as $student)
                        <div class="flexMobile-block sc-mobile-block_restyle ccec__m-content" id="mobi{{ $loop->iteration }}">
                            <div class="flexMobile-string">
                                <div class="flexMobile-string_inner blackFont  sc-mobile-string_restyle ccec__m_mr-15">№</div>
                                <div class="flexMobile-string_inner grayFont  sc-mobile-string_restyle">{{ $loop->iteration }}.</div>
                            </div>
                            <div class="flexMobile-string blackFont ug__mb-0">ПІБ студента</div>
                            <div class="flexMobile-string grayFont">
                                <div class="text-limiter">@if(isset($student->full_name)){{ $student->full_name }}@else-@endif</div>
                            </div>
                            <div class="flexMobile-string blackFont ug__mb-0">Номер групи</div>
                            <div class="flexMobile-string grayFont">
                                <div class="text-limiter">@if(isset($student->group_number)){{ $student->group_number }}@else-@endif</div>
                            </div>
                            <div class="flexMobile-string blackFont ug__mb-0">Номер телефону</div>
                            <div class="flexMobile-string grayFont sc-margin-b-15">
                                <div class="text-limiter">@if(isset($student->student_phone_number)){{ $student->student_phone_number }}@else-@endif</div>
                            </div>
                            <div class="flexMobile-string blackFont ug__mb-0">Email</div>
                            <div class="flexMobile-string grayFont">
                                <div class="text-limiter">@if(isset($student->student_email)){{ $student->student_email }}@else-@endif</div>
                            </div>
                            <div class="flexMobile-string blackFont ug__mb-0">Номер студ.квитка</div>
                            <div class="flexMobile-string grayFont">
                                <div class="text-limiter ccec__m_mb-10px">@if(isset($student->student_number)){{ $student->student_number }}@else-@endif</div>
                            </div>
                            <div class="flexMobile-string blackFont ug__mb-0">ПІБ викладача</div>
                            <div class="flexMobile-string grayFont sc-margin-b-15">
                                <div class="text-limiter" id="mteach{{ $loop->iteration }}">@if(isset($student->teacher_fio)){{ $student->teacher_fio }}@else-@endif</div>
                            </div>
                            <div class="flexMobile-string flex-btns_restyle">
                                <a class="flexTable-btn_delete groups-btn-edit-restyle ccec__m_btn-style" href="##"
                                    data-toggle="modal" data-target="#deleteModalm{{ $loop->iteration }}"><span>Видалити</span>
                                </a>
                                @include('layouts.front.includes.modals.delete_student', [
                                    'modalId' => 'deleteModalm',
                                    'secondId' => $loop->iteration,
                                    'target' => $student->full_name
                                ])
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="groups-edit__group uge__row ge__select-block_style mer-sel-wth">
                    <p class="groups-edit__group-name eg-text-style">Додати викладача</p>
                    @if($auth_teacher->role === 'teacher')
                    <input type="text" class="eg-input" value="{{ $auth_teacher->surname}} {{ $auth_teacher->name }} {{ $auth_teacher->patronymic }}" disabled>
                    <input type="hidden" name="teacher_id" value="{{ $auth_teacher->id }}">
                    @else
                    <div class="select uge__select_block ge__select_style">
                        <select name="teacher_id"
                            class="select-teacher select-teacher_sce_restyle uge__select_style"
                            id="selectTeacher">
                            <option>Нет</option>
                            @foreach($teachers as $teacher)
                                @if($group_info->assigned_teacher_id == $teacher->id)
                                    <option value="{{ $teacher->id }}" selected>{{ $teacher->surname}} {{ $teacher->name }} {{ $teacher->patronymic }}</option>
                                @else
                                    <option value="{{ $teacher->id }}">{{ $teacher->surname}} {{ $teacher->name }} {{ $teacher->patronymic }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @endif
                </div>

                <div class="groups-edit__buttons-block ccec__back-save-btns">
                    <a href="{{ route('groups_controll') }}"
                        class="groups-edit__back-to-groups sce__buttons-restyle uge__buttons-style ugea__button_style ccec__btn"
                        id="backToUsers" style="text-align: center;">Назад</a>
                    <button type="submit"
                        class="groups-edit__create-group sce__buttons-restyle uge__buttons-style ugea__button_style">Зберегти</button>
                </div>
            </form>
        </div>
    </section>
    <script type="text/javascript">
        var coursesObj = '<?=json_encode($course_for_js)?>';
    </script>
@endsection

@section('js')

    <script>
        var students_array = new Array();
        // var count_t = 1;

        $(document).ready(function(){
            /* Берем все текущие значения */
            let values = $("input[name='student_name[]']")
                .map(function(){
                    students_array.push($(this).val());
                    return $(this).val();
                }).get();
            //костыль при перегрузке сбрасывает select в соответствие учителю
            let cur_teach = "{{ $group_info->assigned_teacher_id }}";
            $('#selectTeacher option[value='+cur_teach+']').prop('selected', true);
        });

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
                    if(response.data.length == 0){
                        $('#studentList').fadeOut();
                    }else{
                        $('#studentList').empty().fadeIn();
                        response.data.forEach(function callback(currentValue, index, array) {
                            $('#studentList').append("\
                                <li class='dropdown-item dropdown-item-ved'><a href='#'>"+currentValue.full_name+"</a></li>\
                            ");
                        });
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            }else{
                $('#studentList').fadeOut();
            }
        });

        $('#studentList').on('click', 'li', function(e){
            e.preventDefault();
            $('#student').val($(this).text());
            $('#studentList').fadeOut();
        });

        $('#addstudent').click(function() {
            /* Берем имя текущего студента */
            let curr_stud = $('#student').val();//.replace(/[A-Za-z]|[0-9]|\s+/g, ' ').trim();
            let teacher_id = $('#selectTeacher option:selected').val();//"{{ $group_info->assigned_teacher_id }}";
            let teacher_name = $('#selectTeacher option:selected').text();//"{{ $group_info->assigned_teacher_name }}";

            /* Проверка на существующего студента в базе */
            axios.post("{{ route('autocomplete.fetch.check') }}", {
                student: curr_stud,
            })
            .then(function(response) {
                if(jQuery.inArray(response.data.full_name, students_array) != -1 ){
                    alert("Студент "+response.data.full_name+" вже доданий!");
                }else{
                    /*Перебор обьекта на значения null*/
                    $.each(response.data, function( key, value ) {
                        if(value == null || value == undefined){
                            response.data[key] = '-';
                        }
                    });

                    //присваиваем id и ФИО учителя студенту
                    response.data.assigned_teacher_id = teacher_id;
                    response.data.teacher_fio = teacher_name;

                    /*Ищу последнюю строку со студентом и получаю порядковый*/
                    let count_stud = $("div[id^='name']:last").attr("id").replace("name", "");
                    count_stud++;

                    $("div[id^='name']:last").after("\
                        <div class='sc-string ccec__row' id='name"+count_stud+"'>\
                            <div class='ccec__string-inner-mer student-number-mer'>"+count_stud+".</div>\
                            <div class='ccec__string-inner-mer col text-center'>"+response.data.full_name+"</div>\
                            <div class='ccec__string-inner-mer col text-center'>"+response.data.group_number+"</div>\
                            <div class='ccec__string-inner-mer col text-center'>"+response.data.student_phone_number+"</div>\
                            <div class='ccec__string-inner-mer col w-wrap text-center'>"+response.data.student_email+"</div>\
                            <div class='ccec__string-inner-mer col text-center'>"+response.data.student_number+"</div>\
                            <div class='ccec__string-inner-mer col text-center' id='teach"+count_stud+"'>"+response.data.teacher_fio+"</div>\
                            <div class='ccec__string-inner-mer col text-center'>\
                                <a class='flexTable-btn_delete ccec__delete-btn' href='##' data-toggle='modal'\
                                    data-target='#deleteModal"+count_stud+"'><span>Видалити</span>\
                                </a>\
                            </div>\
                            <div class='bootstrap-restylingStudent modal fade' id='deleteModal"+count_stud+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>\
                                <div class='modal-dialog  modal-dialog_restyle'>\
                                    <div class='modal-content'>\
                                        <div class='deleteMenu-wrapper'>\
                                            <div class='deleteMenu-topImg'>\
                                                <img src='/img/graduation-cap.png' alt='icon'>\
                                            </div>\
                                            <div class='deleteMenu-text'>\
                                                Ви дійсно бажаєте видалити <br> студента "+response.data.full_name+" зі списку?\
                                            </div>\
                                            <div class='deleteMenu-btn'>\
                                                <a class='flexTable-btn_delete' id='removeStudent' data-dismiss='modal' aria-label='Close' onclick='removeStud("+count_stud+")' href=''>\
                                                    <span>Видалити</span>\
                                                </a>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                            <input type='hidden' name='student_name[]' value='"+response.data.full_name+"'>\
                        </div>\
                    ");

                    let content = "\
                        <div class='flexMobile-block sc-mobile-block_restyle ccec__m-content' id='mobi"+count_stud+"'>\
                            <div class='flexMobile-string'>\
                                <div class='flexMobile-string_inner blackFont  sc-mobile-string_restyle ccec__m_mr-15'>№</div>\
                                <div class='flexMobile-string_inner grayFont  sc-mobile-string_restyle'>"+count_stud+".</div>\
                            </div>\
                            <div class='flexMobile-string blackFont ug__mb-0'>ПІБ студента</div>\
                            <div class='flexMobile-string grayFont'>\
                                <div class='text-limiter'>"+response.data.full_name+"</div>\
                            </div>\
                            <div class='flexMobile-string blackFont ug__mb-0'>Номер групи</div>\
                            <div class='flexMobile-string grayFont'>\
                                <div class='text-limiter'>"+response.data.group_number+"</div>\
                            </div>\
                            <div class='flexMobile-string blackFont ug__mb-0'>Номер телефону</div>\
                            <div class='flexMobile-string grayFont sc-margin-b-15'>\
                                <div class='text-limiter'>"+response.data.student_phone_number+"</div>\
                            </div>\
                            <div class='flexMobile-string blackFont ug__mb-0'>Email</div>\
                            <div class='flexMobile-string grayFont'>\
                                <div class='text-limiter'>"+response.data.student_email+"</div>\
                            </div>\
                            <div class='flexMobile-string blackFont ug__mb-0'>Номер студ.квитка</div>\
                            <div class='flexMobile-string grayFont'>\
                                <div class='text-limiter ccec__m_mb-10px'>"+response.data.student_number+"</div>\
                            </div>\
                            <div class='flexMobile-string blackFont ug__mb-0'>ПІБ викладача</div>\
                            <div class='flexMobile-string grayFont sc-margin-b-15'>\
                                <div class='text-limiter' id='mteach"+count_stud+"'>"+response.data.teacher_fio+"</div>\
                            </div>\
                            <div class='flexMobile-string flex-btns_restyle'>\
                                <a class='flexTable-btn_delete groups-btn-edit-restyle ccec__m_btn-style' href=''\
                                    data-toggle='modal' data-target='#deleteModalm"+count_stud+"'><span>Видалити</span>\
                                </a>\
                            </div>\
                            <div class='bootstrap-restylingStudent modal fade' id='deleteModalm"+count_stud+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>\
                                <div class='modal-dialog  modal-dialog_restyle'>\
                                    <div class='modal-content'>\
                                        <div class='deleteMenu-wrapper'>\
                                            <div class='deleteMenu-topImg'>\
                                                <img src='/img/graduation-cap.png' alt='icon'>\
                                            </div>\
                                            <div class='deleteMenu-text'>\
                                                Ви дійсно бажаєте видалити <br> студента "+response.data.full_name+" зі списку?\
                                            </div>\
                                            <div class='deleteMenu-btn'>\
                                                <a class='flexTable-btn_delete' id='removeStudent' data-dismiss='modal' aria-label='Close' onclick='removeStud("+count_stud+")' href=''>\
                                                    <span>Видалити</span>\
                                                </a>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>";

                    if($("div[id^='mobi']:last").attr("id") == 'mobi0'){
                        $("div[id^='mobi']:last").append(content);
                    }else{
                        $("div[id^='mobi']:last").after(content);
                    }

                    /* Добавляем текущего студента в аррей */
                    students_array.push(curr_stud);
                    $('input[name="student_name"]').val('');
                }
            })
            .catch(function(error) {
                console.log(error);
                /*Пока костыль на ошибку*/
                alert('Студента не знайдено, будь ласка виберіть студента з випадаючого списку!');
            });
        });

        function removeStud(count_stud) {
            event.preventDefault();
            students_array.splice( $.inArray(count_stud,students_array) ,1 );
            setTimeout(function(){
                $("div[id='name"+count_stud+"']").remove();
                $("div[id='mobi"+count_stud+"']").remove();
            }, 500);
            /*Не убирался серый фон от модала, с этим костылем работает*/
            $('.modal-backdrop').hide();
        }

        $('#changeGroupName').click(function(e){
            e.preventDefault();
            //Берем новое название группы
            let nameGroup = $('input[name="nameGroup"]').val().replace(/\s+/g, ' ').trim();
            //Берем индентификатор группы
            let groupId = {{ $group_info->id }};
            //отправка асинхронного запроса на сервер
            axios.post("{{ route('edit_group.name_change') }}", {
                nameGroup: nameGroup,
                groupId: groupId,
            })
            .then(function (response) {
                alert(response.data);
            })
            .catch(function (error) {
                /*Пока костыль на ошибку*/
                alert('Не вдалося змінити назву группи');
            });
            /*Скрываю модал*/
            $("#changeGroupNameM").modal('hide');
            /*Не убирался серый фон от модала, с этим костылем работает*/
            $('.modal-backdrop').hide();
        });

        $('#selectTeacher').change(function() {
            let teacher = $('#selectTeacher option:selected').text();
            $("div[id^='teach']").html(teacher);
            $("div[id^='mteach']").html(teacher);
        });
    </script>

    <script type="text/javascript">

        coursesObj = JSON.parse(coursesObj);

        function formEditGroup(form) {
            const course = $('[name="course_number"]').val();
            const teacher = $('[name="teacher_id"]').val();
            for (let key in coursesObj) {
                if(key === course){
                    let temp = coursesObj[key].toString();
                    temp = temp.split(',');
                    if (temp.indexOf(teacher) === -1) {
                        alert("У цього викладача немає такого курсу !");
                        return false;
                    }
                }
            }
            form.submit();
        }

    </script>
@endsection



