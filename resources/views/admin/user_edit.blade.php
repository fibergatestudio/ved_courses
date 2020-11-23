@extends('layouts.front.front_child')

@section('content')
<section class="courseControl">
    <div class="courseControl-separator direction-separator">
    </div>
    <div class="courseControl-container sticky-container container">

        @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Редагування користувача'])

        <div class="groups-control_edit-block">
            <form action="{{ route('user_edit_apply', ['user_id' => $user->id]) }}" method="POST">
            @csrf
            <h1 class='groups-head__title uge__title uge__title_first-child'>Редагування користувача {{ $user->name }}</h1>
            @if(session()->has('message_success'))
                <div class="alert alert-success">
                    {{ session()->get('message_success') }}
                </div>
            @endif
            <div class="groups-edit__group uge__row">
                <p class="groups-edit__group-name uge_row_text-style">Логін </p>
                <input class='eg-input uge__input_style' type="text" name="name" value="{{ $user->name }}" id="getLogin"
                    placeholder="Логін">
            </div>
            <div class="groups-edit__group uge__row">
                <p class="groups-edit__group-name uge_row_text-style">Email</span></p>
                <input class='eg-input uge__input_style' type="text" name="email" value="{{ $user->email }}" id="getEmail"
                    placeholder="example@mail.com">
            </div>
            <div class="groups-edit__group uge__row">
                <p class="groups-edit__group-name uge_row_text-style">Роль</p>
                <input type="hidden" class="form-control" name="role" value="{{ $user->role }}">
                <div class="select uge__select_block">
                    <select name="select-teacher"
                        class="select-teacher select-teacher_sce_restyle uge__select_style" id="selectTeacher">
                        <option value="role-1" {{ $user->role == 'admin'  ? 'selected="selected"' : ''}}>Адмiн</option>
                        <option value="role-2" {{ $user->role == 'teacher'  ? 'selected="selected"' : ''}}>Викладач</option>
                        <option value="role-3" {{ $user->role == 'student'  ? 'selected="selected"' : ''}}>Студент</option>
                    </select>
                </div>
            </div>



            @if($student_info != '')
                <h1 class='groups-head__title uge__title uge__title_third-child'>{{__('Редагування даних')}}</h1>
                <div class="groups-edit__group uge__row">
                    <p class="groups-edit__group-name uge_row_text-style">ПІБ: <span id="studentName">Іванов Іван Іванович</span></p>
                        <input class='eg-input uge__input_style' type="text" name="full_name" value="{{ $student_info->full_name }}" id="getNames"
                            placeholder="Іванов Іван Іванович">
                </div>
                <div class="groups-edit__group uge__row">
                    <p class="groups-edit__group-name uge_row_text-style">Назва ВУЗу</p>
                    <input class='eg-input uge__input_style' type="text" name="university_name" value="{{ $student_info->university_name }}" id="getUniversityName"
                            placeholder="Повна назва ВУЗу">
                </div>
                <div class="sce__course-number">
                    <div class="groups-edit__group uge__row sce_width-55">
                        <p class="groups-edit__group-name uge_row_text-style">Назва курсу</p>
                        <input class='eg-input uge__input_style' type="text" name="course_number" value="{{ $student_info->course_number }}" id="getCourseName"
                                placeholder="Повна назва курсу студента">
                    </div>
                    <div class="groups-edit__group uge__row sce_width-40">
                        <p class="groups-edit__group-name uge_row_text-style">Номер групи</p>
                        <input class='eg-input uge__input_style' type="text" name="group_number" value="{{ $student_info->group_number }}" id="getGroupName"
                                placeholder="2">
                    </div>
                </div>
                <div class="groups-edit__group uge__row uge__mb_30">
                    <p class="groups-edit__group-name uge_row_text-style">Номер студентського квитка<!--Номер телефону--></p>
                    <input class='eg-input uge__input_style' type="text" name="student_number" value="{{ $student_info->student_number }}" id="getStudentName"
                                placeholder="2">
                    {{--<input class='eg-input uge__input_style uge__row uge__mb-0' type="tel" name="course-name"
                            id="getPhoneNumber" placeholder="+XX (XXX) XXX-XX-XX"
                            pattern="\+38\s?[\(]{0,1}[0-9]{3}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}">
                            {{-- \+38\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2} --}}
                </div>
            @endif
                <div class="groups-edit__buttons-block uge__mb_30">
                    <button type="submit" class="groups-edit__create-group sce__buttons-restyle uge__buttons-style"
                            id="saveUser">Зберегти </button>
                    <button class="groups-edit__back-to-groups sce__buttons-restyle uge__buttons-style"
                            id="backToUsers"
                            onClick="event.preventDefault(); window.location.href='{{ route('users_controll') }}'">Назад</button>
                </div>
        </form>
    </div>
</section>
@endsection
{{--
<div style="display:none;" class="container">
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.admin_sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Редактирование пользователя ') }} {{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('user_edit_apply',['user_id' => $user->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Логин</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <input type="hidden" class="form-control" name="role" value="{{ $user->role }}">
                            <input type="text" class="form-control" value="{{ $user->role }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Статус</label>
                            <input type="text" class="form-control" value="{{ $user->status }}" disabled>
                        </div>
                        <!-- <div class="form-group">
                            <label>Роль</label>

                            <select class="form-control" name="role">
                                <option value="admin">Админ</option>
                                <option value="teacher">Учитель</option>
                                <option value="student">Студент</option>
                            </select>
                        </div> -->
                        <hr>
                        @if($student_info != '')
                        <div class="form-group">
                            <label>ФИО</label>
                            <input type="text" class="form-control" name="full_name" value="{{ $student_info->full_name }}">
                        </div>
                        <div class="form-group">
                            <label>Название университета</label>
                            <input type="text" class="form-control" name="university_name" value="{{ $student_info->university_name }}">
                        </div>
                        <div class="form-group">
                            <label>Номер курса</label>
                            <input type="number" class="form-control" name="course_number" value="{{ $student_info->course_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер группы</label>
                            <input type="number" class="form-control" name="group_number" value="{{ $student_info->group_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер студенчиского билета</label>
                            <input type="number" class="form-control" name="student_number" value="{{ $student_info->student_number }}">
                        </div>
                        @endif
                        <br>
                        <button type="submit" class="btn btn-success">Применить</button>
                    </form>

                        @if($user->status != 'confirmed')
                        <a href="{{ route('teacher_apply', ['user_id' => $user->id]) }}">
                            <button class="btn btn-primary">Подтвердить</button>
                        </a>
                        @endif
                        <a href="{{ route('users_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>

<body>

    <!-- Burger-menu (begin)-->
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

                    <div class="deleteMenu-topImg">
                        <img src="assets/img/basket.png" alt="icon">
                    </div>
                    <div class="deleteMenu-text">
                        Ви дійсно бажаєте видалити <br> студента зі списку?
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

    <!-- show students modal start -->
    <!-- deleteBtn modal-page (begin) -->

    <!-- deleteBtn modal-page (end) -->

    <!-- show students modal end -->
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            <!-- sidebar-menu (start) -->

            <div class="sidebar">

                <div class="sidebar-sticky">

                    <div class="sidebar-top_wrapper">
                        <div class="sidebar-top_burger-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <!-- changeling block mobile-btn (start) -->
                        <div class="sidebar-top_mobile-btn uge__top-mobile-btn">
                            <div class="sidebar-top_mobile-img">
                                <img src="assets/img/007-web-traffic.png" alt="icon">
                            </div>
                            <div class="sidebar-top_mobile-name uge__top_mobile-name">
                                Управління користувачами </div>
                        </div>
                        <!-- changeling block mobile-btn (end) -->

                    </div>
                    @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => __('Редагування користувача')])

                </div>

            </div>
            <!-- sidebar-menu (end) -->

            <div class="groups-control_edit-block">
                <form action="{{ route('user_edit_apply',['user_id' => $user->id]) }}" method="POST">
                    @csrf
                    <h1 class='groups-head__title uge__title uge__title_first-child'>Редагування користувача {{ $user->name }}</h1>
                    <div class="groups-edit__group uge__row">
                        <p class="groups-edit__group-name uge_row_text-style">Логін </p>
                        <input class='eg-input uge__input_style' type="text" name="name" value="{{ $user->name }}" id="getLogin"
                            placeholder="Логін">
                    </div>
                    <div class="groups-edit__group uge__row">
                        <p class="groups-edit__group-name uge_row_text-style">Email</span></p>
                        <input class='eg-input uge__input_style' type="text" name="email" value="{{ $user->email }}" id="getEmail"
                            placeholder="admin@mail.com">
                    </div>
                    <div class="groups-edit__group uge__row">
                        <p class="groups-edit__group-name uge_row_text-style">Роль</p>
                        <input type="hidden" class="form-control" name="role" value="{{ $user->role }}">
                        <!--<input type="text" class="form-control" value="{{ $user->role }}" disabled>-->
                        <div class="select uge__select_block">
                            <select name="select-teacher"
                                class="select-teacher select-teacher_sce_restyle uge__select_style" id="selectTeacher">
                                <option value="role-1">Адмiн</option>
                                <option value="role-2">Викладач</option>
                                <option value="role-3">Студент</option>
                            </select>
                        </div>
                    </div>

                    <h1 class='groups-head__title uge__title uge__title_second-child'>Змінити пароль</h1>
                    <div class="groups-edit__group uge__row">
                        <p class="groups-edit__group-name uge_row_text-style">Пароль</p>
                        <input class='eg-input uge__input_style' type="password" name="current_pass" id="enterPassword"
                            placeholder="⚹⚹⚹⚹⚹⚹⚹⚹⚹⚹⚹">
                    </div>
                    <div class="sce__course-number">
                        <div class="groups-edit__group uge__row uge__equal-width">
                            <p class="groups-edit__group-name uge_row_text-style">Новий пароль</p>
                            <input class='eg-input uge__input_style' type="password" name="new_pass" id="newPassword"
                                placeholder="⚹⚹⚹⚹⚹⚹⚹⚹⚹⚹⚹">
                        </div>
                        <div class="groups-edit__group uge__row uge__equal-width">
                            <p class="groups-edit__group-name uge_row_text-style">Повторити пароль</p>
                            <input class='eg-input uge__input_style' type="password" name="confirm_new_pass" id="passwordRepeat"
                                placeholder="⚹⚹⚹⚹⚹⚹⚹⚹⚹⚹⚹">
                        </div>
                    </div>
                    @if($student_info != '')
                    <h1 class='groups-head__title uge__title uge__title_third-child'>Редагування даних </h1>
                    <div class="groups-edit__group uge__row">
                        <p class="groups-edit__group-name uge_row_text-style">ПІБ: <span id="studentName">Іванов Іван
                                Іванович</span></p>
                        <input class='eg-input uge__input_style' type="text" name="full_name" value="{{ $student_info->full_name }}" id="getNames"
                            placeholder="Іванов Іван Іванович">
                    </div>
                    <div class="groups-edit__group uge__row">
                        <p class="groups-edit__group-name uge_row_text-style">Назва ВУЗу</p>
                        <input class='eg-input uge__input_style' type="text" name="university_name" value="{{ $student_info->university_name }}" id="getUniversityName"
                            placeholder="Повна назва ВУЗу">
                    </div>
                    <div class="sce__course-number">
                        <div class="groups-edit__group uge__row sce_width-55">
                            <p class="groups-edit__group-name uge_row_text-style">Назва курсу</p>
                            <input class='eg-input uge__input_style' type="text" name="course_number" value="{{ $student_info->course_number }}" id="getCourseName"
                                placeholder="Повна назва курсу студента">
                        </div>
                        <div class="groups-edit__group uge__row sce_width-40">
                            <p class="groups-edit__group-name uge_row_text-style">Номер групи</p>
                            <input class='eg-input uge__input_style' type="text" name="group_number" value="{{ $student_info->group_number }}" id="getGroupName"
                                placeholder="2">
                        </div>
                    </div>
                    <div class="groups-edit__group uge__row uge__mb_30">
                        <p class="groups-edit__group-name uge_row_text-style">Номер телефону</p>
                        <input class='eg-input uge__input_style uge__row uge__mb-0' type="text" name="course-name"
                            id="getPhoneNumber" placeholder="+38 (097) 123 - 45 - 67">
                    </div>
                    @endif
                    <div class="groups-edit__buttons-block uge__mb_30">
                        <button type="submit" class="groups-edit__create-group sce__buttons-restyle uge__buttons-style"
                            id="saveUser">Зберегти </button>
                        <button class="groups-edit__back-to-groups sce__buttons-restyle uge__buttons-style"
                            id="backToUsers">Назад </button>

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

    <script>

        $('#backToUsers').click(function(e){
            e.preventDefault();
            window.location.href = "/admin/users_control";
        });

    </script>
</body> --}}
