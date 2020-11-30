@extends('layouts.front.front_child')

@section('content')
<section class="courseControl">
    <div class="courseControl-separator direction-separator">
    </div>
    <div class="courseControl-container sticky-container container">

        @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-4.png'])

        <form action="{{ route('students_controll_apply',['student_id' => $student->user_id]) }}" method="POST"
            class="groups-control_edit-block">
        @csrf

            <h1 class='groups-head__title sce-title'>Редагування даних студента</h1>
            <div class="groups-edit__group groups-edit__group_sce-restyle">
                <p class="groups-edit__group-name eg-text-style">ПІБ студента: <span id="studentName">Іванов Іван
                        Іванович</span></p>
                <input class='eg-input' type="text" name="full_name" id="getStudentName"
                    placeholder="Іванов Іван Іванович" value="{{ $student->full_name }}">
            </div>
            <div class="groups-edit__group groups-edit__group_sce-restyle">
                <p class="groups-edit__group-name eg-text-style">Назва ВУЗу</p>
                <input class='eg-input' type="text" name="university_name" id="getUniversityName"
                    placeholder="Повна назва ВУЗу" value="{{ $student->university_name }}">
            </div>
            <div class="sce__course-number">
                <div class="groups-edit__group groups-edit__group_sce-restyle sce_width-55">
                    <p class="groups-edit__group-name eg-text-style">Назва курсу</p>
                    <input class='eg-input' type="text" name="course_number" id="getCourseName"
                        placeholder="Повна назва курсу студента"  value="{{ $student->course_number }}">
                </div>
                <div class="groups-edit__group groups-edit__group_sce-restyle sce_width-40">
                    <p class="groups-edit__group-name eg-text-style">Номер групи</p>
                    <input class='eg-input sce-b-margin_restyle' type="text" name="group_number" id="getGroupName"
                        placeholder="2" value="{{ $student->group_number }}">
                </div>
            </div>
            <div class="groups-edit__group groups-edit__group_sce-restyle">
                <p class="groups-edit__group-name eg-text-style">Номер студентського квитка</p>
                <input class='eg-input groups-edit__group_sce-restyle' type="text" name="student_number"
                    id="getStudentNumber" placeholder="1234567" value="{{ $student->student_number }}">
            </div>
            <div class="groups-edit__group groups-edit__group_sce-restyle">
                <p class="groups-edit__group-name eg-text-style">Номер телефону</p>
                <input class='eg-input groups-edit__group_sce-restyle' type="text" name="student_phone_number"
                    id="getPhoneNumber" placeholder="+XX (XXX) XXX-XX-XX" value=""
                    pattern="\+38\s?[\(]{0,1}[0-9]{3}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}">
            </div>
            <div class="groups-edit__group groups-edit__group_sce-restyle select-teacher_sce__block_restyle">
                <p class="groups-edit__current-teacher eg-text-style">ПІБ викладача</p>
                <div class="select">
                    <select name="assigned_teacher_id" class="select-teacher select-teacher_sce_restyle"
                        id="selectTeacher">
                        <option value="Ivanov">Немає</option>
                        @foreach($teachers as $teacher)
                            @if($teacher->id == $student->assigned_teacher_id)
                                <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                            @else
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="groups-edit__buttons-block sce-b-margin_restyle">
                <button class="groups-edit__create-group sce__buttons-restyle" id="createGroup" type="submit">Зберегти </button>
                <button class="groups-edit__back-to-groups sce__buttons-restyle" id="backToGroups"
                        onClick="event.preventDefault(); window.location.href='{{ redirect()->back()->getTargetUrl() }}'">Назад</button>
            </div>
        </form>
    </div>
</section>
{{-- <div class="container">
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
                <div class="card-header">{{ __('Редактирование студента ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('students_controll_apply',['student_id' => $student->user_id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>ФИО</label>
                            <input type="text" class="form-control" name="full_name" value="{{ $student->full_name }}">
                        </div>
                        <div class="form-group">
                            <label>Название университета</label>
                            <input type="text" class="form-control" name="university_name" value="{{ $student->university_name }}">
                        </div>
                        <div class="form-group">
                            <label>Номер курса</label>
                            <input type="number" class="form-control" name="course_number" value="{{ $student->course_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер группы</label>
                            <input type="number" class="form-control" name="group_number" value="{{ $student->group_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер студенчиского билета</label>
                            <input type="number" class="form-control" name="student_number" value="{{ $student->student_number }}">
                        </div>
                        <div class="form-group">
                            <label>Номер телефона</label>
                            <input type="number" class="form-control" name="student_phone_number" value="">
                        </div>
                        <div class="form-group">
                            <label>Назначенный преподаватель</label>
                            <select class="form-control" name="assigned_teacher_id">
                                    <option value="">Нет</option>
                                @foreach($teachers as $teacher)

                                    @if($teacher->id == $student->assigned_teacher_id)
                                        <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                                    @else
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endif


                                @endforeach
                            </select>
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-success">Применить</button>
                    </form>
                        <a href="{{ route('users_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
