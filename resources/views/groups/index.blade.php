@extends('layouts.front.front_child')

@section('content')
<div style="display:none;" class="container">
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
                <div class="card-header">{{ __('Управление Группами') }} <a href="{{ route('add_group') }}"><button class="btn btn-success">Добавить</button></a></div>

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
                                <th>Название группы</th>
                                <th>Студенты</th>
                                <th>Имя учителя</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->name }}</td>
                                <td>
                                    @foreach($group->students_array as $student)
                                        <button class="btn btn-success m-1" disabled>{{ $student->full_name }}</button>
                                    @endforeach

                                </td>
                                <td>{{ $group->assigned_teacher_name }}</td>
                                <td>
                                    <a href="{{ route('edit_group',['group_id' => $group->id]) }}">
                                        <button class="btn btn-success">Изменить</button>
                                    </a>
                                    <a href="{{ route('delete_group',['group_id' => $group->id]) }}">
                                        <button class="btn btn-danger">Удалить</button>
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
                        Ви точно бажаєте видалити <br> групу?
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
    <div class="bootstrap-restylingStudent modal fade" id="showStudents" tabindex="-1" role="dialog"
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
    </div>


    <!-- deleteBtn modal-page (end) -->

    <!-- show students modal end -->
    <section class="courseControl" style="min-height: 400px;">
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
                        <div class="sidebar-top_mobile-btn">
                            <div class="sidebar-top_mobile-img">
                                <img src="/img/teacher-mobileMenu-2.png" alt="icon">
                            </div>
                            <div class="sidebar-top_mobile-name">
                                Управління групами
                            </div>
                        </div>
                        <!-- changeling block mobile-btn (end) -->

                    </div>
                    @include('layouts.front.includes.admin_sidebar_vrst')

                </div>

            </div>
            <!-- sidebar-menu (end) -->

            <div class="groups-control">
                <div class="groups-head">
                    <h1 class="groups-head__title">Управління Групами </h1>
                    <a href="{{ route('add_group') }}" class="groups-head__add-group-btn">Додати групу</a>
                </div>
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
                            <div class="groups__elem groups__elem_style">{{ $group->id }}.</div>
                            <div class="groups__elem groups__elem_style">{{ $group->name }}</div>
                            <div class="groups__elem groups__elem_style">
                                <a class="flexTable-btn_edit groups-btn-edit-restyle elem-bgc-white" href="##"
                                    data-toggle="modal" data-target="#showStudents{{ $group->id }}"><span>Студенти</span></a>

                                    <div class="bootstrap-restylingStudent modal fade" id="showStudents{{ $group->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog_restyle">
                                            <div class="modal-content">
                                                <div class="deleteMenu-wrapper">
                                                    <div class="deleteMenu-text">
                                                        <h3 class="modal-students-title">ПІБ Студента {{ $group->id }}</h3>
                                                        @foreach($group->students_array as $student)
                                                        <div class="groups__elem student-data"><span>1. &nbsp;</span>{{ $student->full_name }}</div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="groups__elem groups__elem_style">{{ $group->assigned_teacher_name }}</div>
                            <div class="groups__elem groups__elem_style">
                                <a class="flexTable-btn_edit groups-btn-edit-restyle"
                                href="{{ route('edit_group',['group_id' => $group->id]) }}"><span>Редагувати</span></a>
                                <a class="flexTable-btn_delete" href="{{ route('delete_group',['group_id' => $group->id]) }}" data-toggle="modal"
                                    data-target="#deleteModal"><span>Видалити</span></a>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- pagination -->
                <!-- <div class="groups-footer groups-footer_style">
                    <div class="groops-pagination">
                        <div class="groops-pagination__btn-previous"><a
                                class="groops-pagination__btn-previous_not-active" href="#">Назад</a>
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
            </div>

            <div class="groups-control-mobile">
                <div class="groups-head">
                    <h1 class="groups-head__title">Управління Групами </h1>
                    <a href="#" class="groups-head__add-group-btn">Додати групу</a>
                </div>
                <div class="groups-body">
                @foreach($groups as $group)
                    <div class="groups-content">
                        <div class="groups-row groups-row_style">
                            <div class="groups-row__elem">
                                <div class="groups-title__elem groups-title__elem_style groups-row__elem_restyle">№
                                </div>
                                <div class="groups__elem groups__elem_style groups-row__elem_restyle">{{ $group->id }}.</div>
                            </div>
                            <div class="groups-row__elem">
                                <div class="groups-title__elem groups-title__elem_style">Назва групи</div>
                                <div class="groups__elem groups__elem_style">{{ $group->name }}</div>
                            </div>
                            <div class="groups-row__elem">
                                <div class="groups-title__elem groups-title__elem_style">ПІБ Студентов</div>
                                <div class="groups__elem groups__elem_style groups__elem-last-child">
                                    <a class="flexTable-btn_edit groups-btn-edit-restyle elem-bgc-white" href="##"
                                        data-toggle="modal" data-target="#showStudentsMob{{ $group->id }}"><span>Студенти</span></a>

                                
                                </div>
                            </div>
                            <div class="groups-row__elem">
                                <div class="groups-title__elem groups-title__elem_style">Ім'я викладача</div>
                                <div class="groups__elem groups__elem_style">{{ $group->assigned_teacher_name }}</div>
                            </div>
                            <div class="groups-row__elem">
                                <div class="groups__elem groups__elem-last-child groups__elem_style">
                                    <a class="flexTable-btn_edit groups-btn-edit-restyle"
                                    href="{{ route('edit_group',['group_id' => $group->id]) }}"><span>Редагувати</span></a>
                                    <a class="flexTable-btn_delete groups-btn-edit-restyle" hhref="{{ route('delete_group',['group_id' => $group->id]) }}"
                                        data-toggle="modal" data-target="#deleteModal"><span>Видалити</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bootstrap-restylingStudent modal fade" id="showStudentsMob{{ $group->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog_restyle">
                            <div class="modal-content">
                                <div class="deleteMenu-wrapper">
                                    <div class="deleteMenu-text">
                                        <h3 class="modal-students-title">ПІБ Студента {{ $group->id }}</h3>
                                            @foreach($group->students_array as $student)
                                            <div class="groups__elem student-data"><span>1. &nbsp;</span>{{ $student->full_name }}</div>
                                            @endforeach
                                    </div>
                                </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <!-- <div class="groups-footer groups-footer_style">
                    <div class="groops-pagination">
                        <div class="groops-pagination__btn-previous"><a
                                class="groops-pagination__btn-previous_not-active" href="#">Назад</a>
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

            </div>
        </div>
        </div>
    </section>


</body>

@endsection
