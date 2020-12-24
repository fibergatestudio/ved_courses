@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container container-height">

            @include('layouts.front.includes.admin_sidebar_vrst', [
                'headTitle' => 'Управління групами',
                'imgPath' => 'img/teacher-mobileMenu-3.png'
            ])

            <div class="groups-control">
                <div class="groups-head">
                    <h1 class="groups-head__title">Управління Групами </h1>
                    <a href="{{ route('add_group') }}" class="groups-head__add-group-btn">Додати групу</a>
                </div>
                @if(session()->has('message_error'))
                    <div class="alert alert-danger groups-edit__group-name uge_row_text-style uge__row">
                        {{ session()->get('message_error') }}
                    </div>
                @endif
                <div class="groups-body">
                    <div class="groups-title">
                        <div class="groups-title__elem groups-title__elem_style">№</div>
                        <div class="groups-title__elem groups-title__elem_style">Назва групи</div>
                        <div class="groups-title__elem groups-title__elem_style">ПІБ Студентов</div>
                        <div class="groups-title__elem groups-title__elem_style">Ім'я викладача</div>
                        <div class="groups-title__elem groups-title__elem_style">Управління </div>
                    </div>

                    @foreach($groups as $group)
                        <div class="groups-content">
                            <div class="groups-row groups-row_style">
                                <div class="groups__elem groups__elem_style">{{ $loop->iteration }}.</div>
                                <div class="groups__elem groups__elem_style">{{ $group->name ?? '' }}</div>
                                <div class="groups__elem groups__elem_style">
                                    <a class="flexTable-btn_edit groups-btn-edit-restyle elem-bgc-white" href="##"
                                        data-toggle="modal" data-target="#showStudents{{ $group->id }}">
                                        <span>Студенти</span>
                                    </a>

                                    <div class="bootstrap-restylingStudent modal fade" id="showStudents{{ $group->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog_restyle">
                                            <div class="modal-content">
                                                <div class="deleteMenu-wrapper">
                                                    <div class="deleteMenu-text">
                                                        <h3 class="modal-students-title">ПІБ Студентів групи {{ $group->name ?? '' }}</h3>
                                                        @foreach($group->students_array as $student)
                                                            @if($student == null)
                                                                <div class="groups__elem student-data">Немає</div>
                                                                @break
                                                            @else
                                                                <div class="groups__elem student-data">
                                                                    <span>{{ $loop->iteration }}. &nbsp;</span>
                                                                    {{ $student->full_name ?? 'Немає' }}
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="groups__elem groups__elem_style">{{ $group->assigned_teacher_name ?? 'Немає' }}</div>
                                <div class="groups__elem groups__elem_style">
                                    <a class="flexTable-btn_edit groups-btn-edit-restyle"
                                        href="{{ route('edit_group',['group_id' => $group->id]) }}">
                                        <span>Редагувати</span>
                                    </a>
                                    <a class="flexTable-btn_delete" data-toggle="modal" href=""
                                        data-target="#deleteGroup{{ $group->id }}">
                                        <span>Видалити</span>
                                    </a>

                                    <div class="bootstrap-restylingStudent modal fade" id="deleteGroup{{ $group->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog_restyle">
                                            <div class="modal-content">
                                                <div class="deleteMenu-wrapper">
                                                    <div class="deleteMenu-topImg">
                                                        <img src="{{ asset('img/basket.png') }}" alt="icon">
                                                    </div>
                                                    <div class="deleteMenu-text">Ви точно бажаєте видалити <br> групу?</div>
                                                    <div class="deleteMenu-btn">
                                                        <a class="flexTable-btn_delete"
                                                            href="{{ route('delete_group',['group_id' => $group->id]) }}">
                                                            <span>Видалити</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="groups-control-mobile">
                <div class="groups-head">
                    <h1 class="groups-head__title">Управління Групами</h1>
                    <a href="{{ route('add_group') }}" class="groups-head__add-group-btn">Додати групу</a>
                </div>
                <div class="groups-body">
                    @foreach($groups as $group)
                        <div class="groups-content">
                            <div class="groups-row groups-row_style">
                                <div class="groups-row__elem">
                                    <div class="groups-title__elem groups-title__elem_style groups-row__elem_restyle">№
                                    </div>
                                    <div class="groups__elem groups__elem_style groups-row__elem_restyle">{{ $loop->iteration }}.</div>
                                </div>
                                <div class="groups-row__elem">
                                    <div class="groups-title__elem groups-title__elem_style">Назва групи</div>
                                    <div class="groups__elem groups__elem_style">{{ $group->name ?? 'Немає' }}</div>
                                </div>
                                <div class="groups-row__elem">
                                    <div class="groups-title__elem groups-title__elem_style">ПІБ Студентов</div>
                                    <div class="groups__elem groups__elem_style groups__elem-last-child">
                                        <a class="flexTable-btn_edit groups-btn-edit-restyle elem-bgc-white" href="##"
                                            data-toggle="modal" data-target="#showStudentsMob{{ $group->id }}">
                                            <span>Студенти</span>
                                        </a>

                                        <div class="bootstrap-restylingStudent modal fade" id="showStudentsMob{{ $group->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog_restyle">
                                                <div class="modal-content">
                                                    <div class="deleteMenu-wrapper">
                                                        <div class="deleteMenu-text">
                                                            <h3 class="modal-students-title">ПІБ Студентів групи {{ $group->name ?? '' }}</h3>
                                                            @foreach($group->students_array as $student)
                                                                @if($student == null)
                                                                    <div class="groups__elem student-data">Немає</div>
                                                                    @break
                                                                @else
                                                                    <div class="groups__elem student-data">
                                                                        <span>{{ $loop->iteration }}. &nbsp;</span>
                                                                        {{ $student->full_name ?? 'Немає' }}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="groups-row__elem">
                                    <div class="groups-title__elem groups-title__elem_style">Ім'я викладача</div>
                                    <div class="groups__elem groups__elem_style">{{ $group->assigned_teacher_name ?? 'Немає' }}</div>
                                </div>
                                <div class="groups-row__elem">
                                    <div class="groups__elem groups__elem-last-child groups__elem_style">
                                        <a class="flexTable-btn_edit groups-btn-edit-restyle"
                                            href="{{ route('edit_group',['group_id' => $group->id]) }}">
                                            <span>Редагувати</span>
                                        </a>
                                        <a class="flexTable-btn_delete groups-btn-edit-restyle"
                                            href="{{ route('delete_group',['group_id' => $group->id]) }}"
                                            ><span>Видалити</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
