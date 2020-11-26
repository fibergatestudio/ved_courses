@extends('layouts.front.front_child')


@section('style')

<style>

.dropdown-menu-list{
    position: absolute !important;
    top: 133px;
    left: 20px;
    z-index: 1000;
    float: left;
    min-width: 10rem;
    padding: 0.5rem 0;
    margin: 0.125rem 0 0;
    font-size: 0.9rem;
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
                <div class="card-header">{{ __('Изменить группу') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- <form action="{{ route('apply_edit_group',['group_id' => $group_info->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Название группы</label>
                            <input type="text" class="form-control" name="name" value="{{ $group_info->name }}">
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
                            <label>Список текущих студентов</label><br>
                            @foreach($students_array as $student)
                                <div class="btn btn-success student"> {{ $student-> full_name }}
                                    <input type="hidden" class="ids" name="student_name[]" value="{{ $student->full_name }}">
                                    <button type="button" class="btn close remove">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>Учителя</label>
                            <select class="form-control" name="teacher_id">
                                <option>Нет</option>
                                @foreach($teachers as $teacher)
                                    @if($group_info->assigned_teacher_name == $teacher->name)
                                        <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                                    @else
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Изменить</button>
                    </form> -->
                        <a href="{{ route('groups_controll') }}">
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
        <div class="modal-dialog  modal-dialog_restyle">
            <div class="modal-content">
                <div class="deleteMenu-wrapper">

                    <div class="deleteMenu-topImg ccec_deleteImg">
                        <img src="/img/graduation-cap.png" alt="icon">
                    </div>
                    <div class="deleteMenu-text">
                        Ви точно бажаєте видалити <br> студента <span id="studentName">Іванов Іван Іванович</span>?
                    </div>
                    <div class="deleteMenu-btn">
                        <a class="flexTable-btn_delete" href="##"><span>Видалити</span></a>
                    </div>
                </div>
                </ul>
            </div>
        </div>
    </div>

    <!-- deleteBtn modal-page (end) -->


    <!-- Change group name modal start  -->


    <div class="bootstrap-restylingStudent modal fade" id="changeGroupName" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog_restyle">
            <div class="modal-content">
                <div class="deleteMenu-wrapper">

                    <div class="deleteMenu-topImg ge_deleteImg">
                        <img src="assets/img/writing.png" alt="icon">
                    </div>
                    <div class="deleteMenu-text">
                        Ви точно бажаєте змінити назву <br> групи?
                    </div>
                    <div class="deleteMenu-btn">
                        <a class="flexTable-btn_edit groups-btn-edit-restyle" href="##"
                            id="changeGroupName"><span>Змінити</span></a>
                        <a class="flexTable-btn_delete" href="##"
                            id="discardGroupNameChanges"><span>Скасувати</span></a>
                    </div>
                </div>
                </ul>
            </div>
        </div>
    </div>

    <!-- Change group name modal end  --> --}}




    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            <!-- sidebar-menu (start) -->

            <div class="sidebar ">

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
                                <img src="assets/img/005-lecture.png" alt="icon">
                            </div>
                            <div class="sidebar-top_mobile-name">
                                Управління групами
                            </div>
                        </div>
                        <!-- changeling block mobile-btn (end) -->

                    </div> --}}

                    {{-- @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png']) --}}

                    @if(Auth::user()->role == "admin")
                        @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])
                    @elseif(Auth::user()->role == "teacher")
                        @include('layouts.front.includes.teacher_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-3.png'])
                    @endif

                </div>

            </div>
            <!-- sidebar-menu (end) -->

            <div class="ge">
                <form action="{{ route('apply_edit_group',['group_id' => $group_info->id]) }}" method="POST">
                    @csrf
                    <h3 class="ccec__main-title">Редагування групи</h3>
                    <div class="ccec-header ge__header">
                        <div class="groups-edit__teacher-block ge__teacher-course">
                            <p class="groups-edit__current-teacher eg-text-style ge__mb-20"><span
                                    class="ccec-header_style">Поточний викладач:
                                    &nbsp;</span><span class="ccec-header_style" id="currentTeacher">{{ $group_info->assigned_teacher_name }}</span>
                            </p>
                            <p class="groups-edit__current-teacher eg-text-style"><span class="ccec-header_style">Назва
                                    курсу :
                                    &nbsp;</span><span class="ccec-header_style" id="courseNamer">Довга назва курсу
                                    вивчення Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam explicabo,
                                    error nesciunt fugiat iusto consequuntur incidunt exercitationem distinctio assumenda
                                    ullam, debitis molestiae fugit beatae nostrum eius quaerat iure. Odio, quibusdam?</span>
                            </p>
                        </div>
                        <div class="groups-edit__group ccec__add-student-block_style inputs-row">
                            <p class="groups-edit__group-name eg-text-style ge__m-input-header">Назва групи</p>
                            <div class="groups-edit__student-add-form ">
                                <input class='eg-input add-style ccec__input' type="text" name="name" value="{{ $group_info->name }}"
                                    id="getCourseName" placeholder="Повна назва групи">
                                <button class="add-student ccec__button ge__m-button" id="changeGroupName"
                                    data-toggle="modal" data-target="#changeGroupName">Зберегти</button>
                            </div>
                            <p class="groups-edit__group-name eg-text-style ge__input-subtext">Назву курсу редагується при
                                гострій
                                необхідності та при узгодженні з Адміністрацією закладу. </p>
                        </div>
                        <div class="groups-edit__group ccec__add-student-block_style inputs-row">
                            <p class="groups-edit__group-name eg-text-style ge__m-input-header">Додати студента</p>
                            <div class="groups-edit__student-add-form ">
                                <input class='eg-input add-style ccec__input' id="student" type="text" name="course-name"
                                     placeholder="Іванов Іван Іванович">

                                <a id="addstudent" class="add-student ccec__button ge__m-button" id="egAddStudent">Додати</a>
                                <div id="studentList">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flexTable-wrapper ge">
                    <div class="flexTable-scrollContainer">
                        <div class="sc-scrollInner">

                            <div class="sc-topTitle">
                                <div class="ccec__sc-topTitle_inner">№</div>
                                <div class="ccec__sc-topTitle_inner">ПІБ студента</div>
                                <div class="ccec__sc-topTitle_inner">Номер групи</div>
                                <div class="ccec__sc-topTitle_inner">Номер телефону</div>
                                <div class="ccec__sc-topTitle_inner">Email</div>
                                <div class="ccec__sc-topTitle_inner">Номер студ.квитка</div>
                                <div class="ccec__sc-topTitle_inner">ПІБ викладача</div>
                                <div class="ccec__sc-topTitle_inner">Управління</div>
                            </div>
                            <div id="studentsAdd" ></div>
                            @foreach($students_array as $student)

                                <div class="sc-string ccec__row">
                                    <div class="ccec__string-inner">1.</div>
                                    <div class="ccec__string-inner">{{ $student-> full_name }} </div>
                                    <div class="ccec__string-inner">2</div>
                                    <div class="ccec__string-inner">+38 (097) 123 - 45 - 67</div>
                                    <div class="ccec__string-inner ccec__string-inner_cust-style">
                                        admin@mail.com
                                    </div>
                                    <div class="ccec__string-inner ccec__string-inner_cust-style">12345678910111213</div>
                                    <div class="ccec__string-inner">{{ $student-> full_name }} </div>
                                    <div class="ccec__string-inner">
                                        <a class="flexTable-btn_delete ccec__delete-btn" href="##" data-toggle="modal"
                                            data-target="#deleteModal"><span>Видалити</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                            <div class="groups-edit__group uge__row ge__select-block_style">
                                <p class="groups-edit__group-name eg-text-style">Додати викладача</p>
                                <div class="select uge__select_block ge__select_style">
                                    <select name="select-teacher"
                                        class="select-teacher select-teacher_sce_restyle uge__select_style"
                                        id="selectTeacher">
                                        <option>Нет</option>
                                        @foreach($teachers as $teacher)
                                            @if($group_info->assigned_teacher_name == $teacher->name)
                                                <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                                            @else
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flexMobile-wrapper sc-wrapper_restyle ccec">

                    <div class="flexMobile-block sc-mobile-block_restyle ccec__m-content">
                        <div class="flexMobile-string">
                            <div class="flexMobile-string_inner blackFont  sc-mobile-string_restyle ccec__m_mr-15">№
                            </div>
                            <div class="flexMobile-string_inner grayFont  sc-mobile-string_restyle">1.</div>
                        </div>
                        <div class="flexMobile-string blackFont ug__mb-0">ПІБ студента
                        </div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">Іванов Іван Іванович</div>
                        </div>
                        <div class="flexMobile-string blackFont ug__mb-0">Номер групи
                        </div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">2
                            </div>
                        </div>
                        <div class="flexMobile-string blackFont ug__mb-0">Номер телефону
                        </div>
                        <div class="flexMobile-string grayFont sc-margin-b-15">
                            <div class="text-limiter">+38 (097) 123 - 45 - 67
                            </div>
                        </div>
                        <div class="flexMobile-string blackFont ug__mb-0">Email
                        </div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">admin@mail.com
                            </div>
                        </div>
                        <div class="flexMobile-string blackFont ug__mb-0">Номер студ.квитка
                        </div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter ccec__m_mb-10px">12345678910111213
                            </div>
                        </div>
                        <div class="flexMobile-string blackFont ug__mb-0">ПІБ викладача
                        </div>
                        <div class="flexMobile-string grayFont sc-margin-b-15">
                            <div class="text-limiter">Іванов Іван Іванович
                            </div>
                        </div>
                        <div class="flexMobile-string flex-btns_restyle">
                            <a class="flexTable-btn_delete groups-btn-edit-restyle ccec__m_btn-style" href="##"
                                data-toggle="modal" data-target="#deleteModal"><span>Видалити</span>
                            </a>
                        </div>
                    </div>


                    <div class="groups-edit__group uge__row ge__select-block_style">
                        <p class="groups-edit__group-name eg-text-style">Додати викладача</p>
                        <div class="select uge__select_block ge__select_style">
                            <select name="select-teacher" class="select-teacher select-teacher_sce_restyle uge__select_style" id="selectTeacher">
                                <option>Нет</option>
                                @foreach($teachers as $teacher)
                                    @if($group_info->assigned_teacher_name == $teacher->name)
                                        <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                                    @else
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>


                <!-- <div class="groups-footer groups-footer_style sc-footer-pagination_restyle">
                    <div class="groops-pagination">
                        <div class="groops-pagination__btn-previous"><a class="groops-pagination__btn-previous_not-active"
                                href="#">Назад</a>
                        </div>
                        <div class="groops-pagination__pagination-item groops-pagination__pagination-item_style">
                            <a class="groops-pagination__pagination-item_active" href="#">
                                1
                            </a>
                        </div>
                        <div class="groops-pagination__pagination-item groops-pagination__pagination-item_style">
                            <a href="#">2</a>
                        </div>
                        <div class="groops-pagination__pagination-item groops-pagination__pagination-item_style">
                            <a href="#">3</a>
                        </div>
                        <div class="groops-pagination__pagination-item">...</div>
                        <div class="groops-pagination__pagination-item groops-pagination__pagination-item_style">
                            <a href="#">25</a>
                        </div>
                        <div class="groops-pagination__btn-forward">
                            <a href="#">Вперед</a>
                        </div>
                    </div>

                </div> -->
                <div class="groups-edit__buttons-block ccec__back-save-btns">
                    <button
                        class="groups-edit__back-to-groups sce__buttons-restyle uge__buttons-style ugea__button_style ccec__btn"
                        id="backToUsers">Назад </button>
                    <button class="groups-edit__create-group sce__buttons-restyle uge__buttons-style ugea__button_style"
                        id="saveUser">Зберегти </button>
                </div>
        </form>

    </section>


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

        /* Берем все текущие значения */
        var values = $("input[name='student_name[]']")
                .map(function(){
                    students_array.push($(this).val());
                    return $(this).val();
                }).get();

        /* Добавляем в аррей */
        //students_array.push(values);

        console.log(students_array);

        $('#addstudent').click(function() {
            /* Берем имя текущего студента */
            var curr_stud = $('#student').val();
            var s_count = 1;
            console.log(curr_stud);
            console.log(students_array);
            /* Если студент есть в аррее */
            if(jQuery.inArray(curr_stud, students_array) != -1 ){
                alert("Студент "+ curr_stud + " Уже добавлен!");
            } else {
                $('#studentsAdd').append( "<div class='sc-string ccec__row'><div class='ccec__string-inner'>"+s_count+".</div><div class='ccec__string-inner'>"+curr_stud+"</div><div class='ccec__string-inner'>2</div><div class='ccec__string-inner'>+38 (097) 123 - 45 - 67</div><div class='ccec__string-inner ccec__string-inner_cust-style'>admin@mail.com</div><div class='ccec__string-inner ccec__string-inner_cust-style'>12345678910111213</div><div class='ccec__string-inner'>" + curr_stud +"</div><div class='ccec__string-inner'><a class='flexTable-btn_delete ccec__delete-btn' href='##' data-toggle='modal' data-target='#deleteModal'><span>Видалити</span></a></div></div>" );
                //$('#studentsAdd').append( "<button class='btn btn-success m-1' disabled>"+ curr_stud + "</button>" );
                $('#studentsAdd').append( "<input type='hidden' name='student_name[]' value='" + curr_stud +"'>" );
                /* Добавляем текущего студента в аррей */
                s_count++;
                students_array.push(curr_stud);
            }

        });

        $(".remove").click(function(){
            //var remove_id =
            var remove_name = $(this).closest(".student").find(".ids").val();

            console.log( remove_name );
            //alert(remove_id);

            students_array.splice( $.inArray(remove_name,students_array) ,1 );

            $(this).closest(".student").remove();
        });
    });

    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

@section('scripts')
@endsection


@endsection
