@extends('layouts.front.front_child')

@section('content')
@if(session()->has('message_success'))
    <div class="alert alert-success">
        {{ session()->get('message_success') }}
    </div>
@endif
<section class="courseControl">
    <div class="courseControl-separator direction-separator">
    </div>
    <div class="courseControl-container sticky-container container container-height">

        @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління студентами', 'imgPath' => 'img/teacher-mobileMenu-4.png'])

        {{-- @if(Auth::user()->role == "admin")
            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-4.png'])
        @elseif(Auth::user()->role == "teacher")
            @include('layouts.front.includes.teacher_sidebar_vrst', ['headTitle' => 'Управління групами', 'imgPath' => 'img/teacher-mobileMenu-4.png'])
        @endif --}}

        <h3 class="sc__main-title">Управління студентами</h3>
        <div class="sc-header">
            <p class="sc-header__desc .order-1">Додати базу студентів</p>
            <div class="groups-edit__group groups-edit__group_restyle  order-3 margin-0">
                <div class="groups-edit__student-add-form base-upload-block">
                    <form action="{{ route('import_students_apply') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="custom-upload-form" for="baseUpload">
                            <input class='eg-input add-style base-upload' type="file" id="baseUpload" name="import_file">
                            <p id="upld_file_name">Назва файлу.xlsx</p>
                        </label>
                        <button type="submit" class="add-student add-student_restyle" id="egAddStudent">Додати</button>
                    </form>

                </div>
            </div>
            <p class="sc-header__desc sc-header__desc_restyle .order-2">
                Файли з розширенням xlsx або xlsx. <br> Максимальний розмір - 5 Мб.
            </p>
        </div>

        <div class="flexTable-wrapper">
            <div class="flexTable-scrollContainer">
                <div class="sc-scrollInner">

                    <div class="sc-topTitle">
                        <div class="sc-topTitle_inner">№</div>
                        <div class="sc-topTitle_inner">ПІБ студента</div>
                        <div class="sc-topTitle_inner">Назва ВУЗа</div>
                        <div class="sc-topTitle_inner">Назва курсу</div>
                        <div class="sc-topTitle_inner">Номер групи</div>
                        <div class="sc-topTitle_inner">Номер телефону</div>
                        <div class="sc-topTitle_inner">ПІБ викладача</div>
                        <div class="sc-topTitle_inner">Управління</div>
                    </div>
                    @foreach($students as $student)
                        <div class="sc-string">
                            <div class="sc-string_inner">{{ $loop->iteration }}.</div>
                            <div class="sc-string_inner">
                                @if(empty($student->full_name))
                                    Пусто
                                @else
                                    {{ $student->full_name }}
                                @endif
                            </div>
                            <div class="sc-string_inner">
                                @if(empty($student->university_name))
                                    Пусто
                                @else
                                    {{ $student->university_name }}
                                @endif
                            </div>
                            <div class="sc-string_inner">
                                @if(empty($student->course_number))
                                    Пусто
                                @else
                                    {{ $student->course_number }}
                                @endif
                            </div>
                            <div class="sc-string_inner">
                                @if(empty($student->group_number))
                                    Пусто
                                @else
                                    {{ $student->group_number }}
                                @endif
                            </div>
                            <div class="sc-string_inner">
                                @if(empty($student->student_phone_number))
                                    Пусто
                                @else
                                    {{ $student->student_phone_number }}
                                @endif
                            </div>
                            <div class="sc-string_inner">
                                @if(empty($student->assigned_teacher_id))
                                    Пусто
                                @else
                                    {{ $student->assigned_teacher_id }}
                                @endif
                            </div>
                            <div class="sc-string_inner">
                                <a class="flexTable-btn_edit sc__student-success-btn" id="stSuccess">Успішність </a>
                                <a class="flexTable-btn_edit groups-edit__back-to-groups sc__student-edit"
                                    href="{{ route('students_controll_edit',['student_id' => $student->user_id]) }}">
                                    <span>Редагувати</span>
                                </a>
                                <a class="flexTable-btn_delete" href="##" data-toggle="modal"
                                    data-target="#deleteModal"><span>Видалити</span></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="flexMobile-wrapper sc-wrapper_restyle">
            @foreach($students as $student)
                <div class="flexMobile-block sc-mobile-block_restyle">
                    <div class="flexMobile-string">
                        <div class="flexMobile-string_inner blackFont  sc-mobile-string_restyle">№</div>
                        <div class="flexMobile-string_inner grayFont  sc-mobile-string_restyle">{{ $student->user_id }}.</div>
                    </div>
                    <div class="flexMobile-string blackFont">ПІБ студента
                    </div>
                    <div class="flexMobile-string grayFont">
                        <div class="text-limiter">
                            @if(empty($student->full_name))
                                Пусто
                            @else
                                {{ $student->full_name }}
                            @endif
                        </div>
                    </div>
                    <div class="flexMobile-string blackFont">Назва ВУЗа
                    </div>
                    <div class="flexMobile-string grayFont">
                        <div class="text-limiter">
                            @if(empty($student->university_name))
                                Пусто
                            @else
                                {{ $student->university_name }}
                            @endif
                        </div>
                    </div>
                    <div class="flexMobile-string blackFont">Назва курсу
                    </div>
                    <div class="flexMobile-string grayFont">
                        <div class="text-limiter">
                            @if(empty($student->course_number))
                                Пусто
                            @else
                                {{ $student->course_number }}
                            @endif
                        </div>
                    </div>
                    <div class="flexMobile-string blackFont">Номер групи
                    </div>
                    <div class="flexMobile-string grayFont">
                        <div class="text-limiter">
                            @if(empty($student->group_number))
                                Пусто
                            @else
                                {{ $student->group_number }}
                            @endif
                        </div>
                    </div>
                    <div class="flexMobile-string blackFont sc-margin-b-5">Номер телефону
                    </div>
                    <div class="flexMobile-string grayFont sc-margin-b-15">
                        <div class="text-limiter">
                            @if(empty($student->student_number))
                                Пусто
                            @else
                                {{ $student->student_number }}
                            @endif
                        </div>
                    </div>
                    <div class="flexMobile-string blackFont sc-margin-b-5">ПІБ викладача
                    </div>
                    <div class="flexMobile-string grayFont sc-margin-b-15">
                        <div class="text-limiter">
                            @if(empty($student->assigned_teacher_id))
                                Пусто
                            @else
                                {{ $student->assigned_teacher_id }}
                            @endif
                        </div>
                    </div>
                    <div class="flexMobile-string flex-btns_restyle sc__m-flex-btns">
                        <a class="flexTable-btn_edit sc__student-success-btn" id="stSuccess">Успішність студента</a>
                        <a class="flexTable-btn_edit groups-edit__back-to-groups sc__student-edit"
                            href="{{ route('students_controll_edit', ['student_id' => $student->user_id]) }}">
                            <span>Редагувати</span>
                        </a>
                        <a class="flexTable-btn_delete groups-btn-edit-restyle sc-btn-edit-restyle" href="##"
                            data-toggle="modal" data-target="#deleteModal"><span>Видалити</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="groups-footer groups-footer_style sc-footer-pagination_restyle">
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

        </div> --}}
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
                <div class="card-header">{{ __('Управлене студентами') }}
                    <a href="{{ route('import_students') }}" class="btn btn-success">Загрузить Студентов</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ФИО</th>
                                <th>Название ВУЗа</th>
                                <th>Номер Курса</th>
                                <th>Номер Группы</th>
                                <th>Номер студенческого</th>
                                <th>Назначеный Препод.</th>
                                <th>Статус</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>
                                    {{ $student->user_id }}
                                </td>
                                <td>
                                @if(empty($student->full_name))
                                    Пусто
                                @else
                                    {{ $student->full_name }}
                                @endif
                                </td>
                                <td>
                                    @if(empty($student->university_name))
                                        Пусто
                                    @else
                                        {{ $student->university_name }}
                                    @endif
                                </td>
                                <td>
                                    @if(empty($student->course_number))
                                        Пусто
                                    @else
                                    {{ $student->course_number }}
                                    @endif
                                </td>
                                <td>
                                    @if(empty($student->group_number))
                                        Пусто
                                    @else
                                        {{ $student->group_number }}
                                    @endif
                                </td>
                                <td>
                                    @if(empty($student->student_number))
                                        Пусто
                                    @else
                                        {{ $student->student_number }}
                                    @endif
                                </td>
                                <td>
                                    @if(empty($student->assigned_teacher_id))
                                        Пусто
                                    @else
                                        {{ $student->assigned_teacher_id }}
                                    @endif
                                </td>
                                <td>{{ $student->status }} </td>
                                <td>
                                    <a href="{{ route('students_controll_edit',['student_id' => $student->user_id]) }}">
                                        <button class="btn btn-success">Изменить</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

        $(document).ready(function() {
            $('input[type="file"]').change(function(e) {
                var geekss = e.target.files[0].name;
                //alert(geekss);
                $("#upld_file_name").text(geekss);

            });
        });

</script>
@endsection
