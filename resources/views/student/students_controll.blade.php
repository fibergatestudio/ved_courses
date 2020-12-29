@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container container-height">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління студентами', 'imgPath' => 'img/teacher-mobileMenu-4.png'])

            <h3 class="sc__main-title">Управління студентами</h3>
            {{-- @if(session()->has('message_success'))
                <div class="alert alert-success">
                    {{ session()->get('message_success') }}
                </div>
            @endif
            @if(session()->has('message_error'))
                <div class="alert alert-danger">
                    {{ session()->get('message_error') }}
                </div>
            @endif --}}
            <div class="sc-header">
                <p class="sc-header__desc .order-1">Додати базу студентів</p>
                <div class="groups-edit__group groups-edit__group_restyle  order-3 margin-0">
                    <div class="groups-edit__student-add-form base-upload-block">
                        <form action="{{ route('import_students_apply') }}" method="POST" id="students_upload_form" enctype="multipart/form-data">
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
            <p><a href="##" data-toggle="modal" data-target="#showUploadedStud">Текущие загруженные студенты</a></p>
                        <div class="bootstrap-restylingStudent modal fade" id="showUploadedStud" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog_restyle">
                                <div class="modal-content">
                                    <div class="deleteMenu-wrapper">
                                        <div class="deleteMenu-text">
                                            <h3 class="modal-students-title">Текущие студенты</h3>
                                                <?php $cr_st_num = 1; ?>
                                                @foreach($upld_students as $student)
                                                <div class="groups__elem student-data"><span>{{$cr_st_num}}. &nbsp;</span> {{ $student->status_from }} {{ $student->recipient }} {{ $student->birthday }}</div>
                                                <?php $cr_st_num++; ?>
                                                @endforeach
                                        </div>
                                    </div>
                                    </ul>
                                </div>
                            </div>
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
                                <div class="sc-string_inner">{{ $student->full_name ?? 'Немає' }}</div>
                                <div class="sc-string_inner">{{ $student->university_name ?? 'Немає' }}</div>
                                <div class="sc-string_inner">{{ $student->course_number ?? 'Немає' }}</div>
                                <div class="sc-string_inner">{{ $student->group_number  ?? 'Немає' }}</div>
                                <div class="sc-string_inner">{{ $student->student_phone_number  ?? 'Немає' }}</div>
                                <div class="sc-string_inner">{{ $student->assigned_teacher_id  ?? 'Немає' }}</div>
                                <div class="sc-string_inner">
                                    <a class="flexTable-btn_edit sc__student-success-btn" id="stSuccess"
                                        href="{{ route('students_success',['student_id' => $student->user_id]) }}">Успішність</a>
                                    <a class="flexTable-btn_edit groups-edit__back-to-groups sc__student-edit"
                                        href="{{ route('students_controll_edit',['student_id' => $student->user_id]) }}">
                                        <span>Редагувати</span>
                                    </a>
                                    <a class="flexTable-btn_delete" href="##" data-toggle="modal"
                                        data-target="#deleteModal{{ $loop->iteration }}">
                                        <span>Видалити</span>
                                    </a>
                                    @include('layouts.front.includes.modals.delete_student', [
                                        'modalId' => 'deleteModal',
                                        'secondId' => $loop->iteration,
                                        'target' => $student->full_name,
                                        'modalPath' => route('students_controll_delete', ['student_id' =>  $student->user_id ]),
                                    ])
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
                            <div class="flexMobile-string_inner grayFont  sc-mobile-string_restyle">{{ $loop->iteration }}.</div>
                        </div>
                        <div class="flexMobile-string blackFont">ПІБ студента</div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">{{ $student->full_name  ?? 'Немає' }}</div>
                        </div>
                        <div class="flexMobile-string blackFont">Назва ВУЗа</div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">{{ $student->university_name  ?? 'Немає' }}</div>
                        </div>
                        <div class="flexMobile-string blackFont">Назва курсу</div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">{{ $student->course_number  ?? 'Немає' }}</div>
                        </div>
                        <div class="flexMobile-string blackFont">Номер групи</div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">{{ $student->group_number  ?? 'Немає' }}</div>
                        </div>
                        <div class="flexMobile-string blackFont sc-margin-b-5">Номер телефону</div>
                        <div class="flexMobile-string grayFont sc-margin-b-15">
                            <div class="text-limiter">{{ $student->student_number  ?? 'Немає' }}</div>
                        </div>
                        <div class="flexMobile-string blackFont sc-margin-b-5">ПІБ викладача</div>
                        <div class="flexMobile-string grayFont sc-margin-b-15">
                            <div class="text-limiter">{{ $student->assigned_teacher_id  ?? 'Немає' }}</div>
                        </div>
                        <div class="flexMobile-string flex-btns_restyle sc__m-flex-btns">
                            <a class="flexTable-btn_edit sc__student-success-btn" id="stSuccess"
                                href="{{ route('students_success',['student_id' => $student->user_id]) }}">Успішність студента</a>
                            <a class="flexTable-btn_edit groups-edit__back-to-groups sc__student-edit"
                                href="{{ route('students_controll_edit', ['student_id' => $student->user_id]) }}">
                                <span>Редагувати</span>
                            </a>
                            <a class="flexTable-btn_delete groups-btn-edit-restyle sc-btn-edit-restyle" href="##"
                                data-toggle="modal" data-target="#deleteModalm{{ $loop->iteration }}">
                                <span>Видалити</span>
                            </a>
                            @include('layouts.front.includes.modals.delete_student', [
                                'modalId' => 'deleteModalm',
                                'secondId' => $loop->iteration,
                                'target' => $student->full_name,
                                'modalPath' => route('students_controll_delete', ['student_id' =>  $student->user_id ]),
                            ])
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
@endsection

@section('js')

            @if(session()->has('message_success'))
                <script>
                $( document ).ready(function() {
                    alert( "Імпорт успішний!" );
                });
                </script>
            @elseif(session()->has('message_error'))
                <script>
                $( document ).ready(function() {
                    alert( "Неправильний формат файлу! Вірний формат - XLSX!" );
                });
                </script>
            @endif
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

        $( "#students_upload_form" ).submit(function( event ) {
            if( document.getElementById("baseUpload").files.length == 0 ){
                alert( "Додайте файл імпорту!" );
                event.preventDefault();
            }
            //event.preventDefault();
        });

        $(document).ready(function() {
           $('input[type="file"]').change(function(e) {
                var geekss = e.target.files[0].name;
                //alert(geekss);
                $("#upld_file_name").text(geekss);

            });
        });

    </script>
@endsection
