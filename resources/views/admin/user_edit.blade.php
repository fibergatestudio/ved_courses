@extends('layouts.front.front_child')

@section('content')
<section class="courseControl">
    <div class="courseControl-separator direction-separator">
    </div>
    <div class="courseControl-container sticky-container container">

        @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Редагування користувача', 'imgPath' => 'img/teacher-mobileMenu-5.png'])

            <form class="groups-control_edit-block" action="{{ route('user_edit_apply', ['user_id' => $user->id]) }}" method="POST">
            @csrf
            <h1 class='groups-head__title uge__title uge__title_first-child'>Редагування користувача {{ $user->name }}</h1>
            @if(session()->has('message_success'))
                <div class="alert alert-success groups-edit__group-name uge_row_text-style uge__row">
                    {{ session()->get('message_success') }}
                </div>
            @endif
            <div class="groups-edit__group uge__row">
                <p class="groups-edit__group-name uge_row_text-style">Логін (Ім'я)</p>
                <input class='eg-input uge__input_style' type="text" name="name" value="{{ $user->name }}" id="getLogin"
                    placeholder="Логін">
            </div>
            <div class="groups-edit__group uge__row">
                <p class="groups-edit__group-name uge_row_text-style">Прізвище </p>
                <input class='eg-input uge__input_style' type="text" name="surname" value="{{ $user->surname }}" id="getSurname"
                    placeholder="Прізвище">
            </div>
            <div class="groups-edit__group uge__row">
                <p class="groups-edit__group-name uge_row_text-style">По батькові</p>
                <input class='eg-input uge__input_style' type="text" name="patronymic" value="{{ $user->patronymic }}" id="getPatronymic"
                    placeholder="По батькові">
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
                    <p class="groups-edit__group-name uge_row_text-style">Номер студентського квитка</p>
                    <input class='eg-input uge__input_style' type="text" name="student_number" value="{{ $student_info->student_number }}" id="getStudentName"
                            placeholder="2">
                </div>
                <div class="groups-edit__group uge__row uge__mb_30">
                    <p class="groups-edit__group-name uge_row_text-style">Номер телефону</p>
                    <input class='eg-input uge__input_style uge__row uge__mb-0' type="text" name="course-name"
                        id="getPhoneNumber" placeholder="+XX (XXX) XXX-XX-XX" value=""
                        pattern="\+38\s?[\(]{0,1}[0-9]{3}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}">
                </div>
            @endif
            <div class="groups-edit__buttons-block uge__mb_30">
                <button type="submit" class="groups-edit__create-group sce__buttons-restyle uge__buttons-style"
                        id="saveUser">Зберегти </button>
                <button class="groups-edit__back-to-groups sce__buttons-restyle uge__buttons-style"
                        id="backToUsers"
                        onClick="event.preventDefault(); window.location.href='{{ redirect()->back()->getTargetUrl() }}'">Назад</button>
            </div>
        </form>
    </div>
</section>
@endsection
