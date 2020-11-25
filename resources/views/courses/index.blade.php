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
                <div class="card-header">{{ __('Управление Курсами') }} <a href="{{ route('new_course') }}"><button class="btn btn-success">Создать Курс</button></a></div>

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
                                <th>Название теста</th>
                                <th>Картинка</th>
                                <th>Просмотров</th>
                                <th>Пройден (раз)</th>
                                <th>Содздатель (id,name)</th>
                                <th>Видимость</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->name }}</td>
                                <td>
                                    @if($course->course_image_path != "")
                                    <img src="{{url('/images/' . $course->course_image_path)}}" height="50" width="80" alt="Image"/>
                                    @endif
                                </td>   
                                <td></td>
                                <td></td>
                                <td>{{ $course->creator_id }} {{ $course->creator_name }}</td>
                                <td>
                                    @if( $course->visibility == "all")
                                        Для всех
                                    @else
                                        Только для зарегистрированных
                                    @endif
                                
                                </td>
                                <td>
                                    <a href="{{ route('edit_course', ['course_id' => $course->id ]) }}">
                                        <button class="btn btn-success">Изменить</button>
                                    </a>
                                    <a href="">
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


    <!-- deleteBtn modal-page (end) -->

    <section class="courseControl" style="min-height: 420px;">
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
                                Управління курсами
                            </div>
                        </div>
                        <!-- changeling block mobile-btn (end) -->

                    </div>
                    
                    
                    @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління користувачами'])

                </div>

            </div>
            <!-- sidebar-menu (end) -->

            <h3 class="courseControl-title">Управління курсами<a href="{{ route('new_course') }}"><button style="display: initial; margin-left:5px;" class="flexTable-btn_edit">Створити курс</button></a></h3>

            <div class="flexTable-wrapper">
                <div class="flexTable-scrollContainer">
                    <div class="flexTable-scrollInner">

                        <div class="flexTable-topTitle">
                            <div class="flexTable-topTitle_inner">№</div>
                            <div class="flexTable-topTitle_inner">Назва курсу</div>
                            <div class="flexTable-topTitle_inner">Опис</div>
                            <div class="flexTable-topTitle_inner">Перегляів</div>
                            <div class="flexTable-topTitle_inner">Пройдено разів</div>
                            <div class="flexTable-topTitle_inner">Творець (id)</div>
                            <div class="flexTable-topTitle_inner">Управління</div>
                        </div>
                        @foreach($courses as $course)
                        <div class="flexTable-string">
                            <div class="flexTable-string_inner">{{ $course->id }}.</div>
                            <div class="flexTable-string_inner">{{ $course->name }}</div>
                            <div class="flexTable-string_inner">{{ $course->description }}</div>
                            <div class="flexTable-string_inner">{{ $course->views }}</div>
                            <div class="flexTable-string_inner">{{ $course->finished_count }}</div>
                            <div class="flexTable-string_inner">{{ $course->creator_id }} {{ $course->creator_name }}</div>
                            <div class="flexTable-string_inner">
                                <a class="flexTable-btn_edit" href="{{ route('edit_course', ['course_id' => $course->id ]) }}"><span>Редагувати</span></a>
                                <a class="flexTable-btn_delete" href="##" data-toggle="modal"
                                    data-target="#deleteModal{{ $course->id }}"><span>Видалити</span></a>
                                    <div class="bootstrap-restylingStudent modal fade" id="deleteModal{{ $course->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog_restyle">
                                            <div class="modal-content">
                                                <div class="deleteMenu-wrapper">

                                                    <div class="deleteMenu-topImg">
                                                        <img src="/img/basket.png" alt="icon">
                                                    </div>
                                                    <div class="deleteMenu-text">
                                                        Ви точно бажаєте видалити <br> Курс {{ $course->name }} ?
                                                    </div>
                                                    <div class="deleteMenu-btn">
                                                        <a class="flexTable-btn_delete" href="{{ route('delete_course', ['course_id' => $course->id ]) }}"><span>Видалити</span></a>
                                                    </div>
                                                </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="flexMobile-wrapper">

                @foreach($courses as $course)
                <div class="flexMobile-block">
                    <div class="flexMobile-string">
                        <div class="flexMobile-string_inner blackFont">№</div>
                        <div class="flexMobile-string_inner grayFont">{{ $course->id }}.</div>
                    </div>
                    <div class="flexMobile-string blackFont">Назва курсу
                    </div>
                    <div class="flexMobile-string grayFont">
                        <div class="text-limiter"> {{ $course->name }}</div>
                    </div>
                    <div class="flexMobile-string blackFont">Опис
                    </div>
                    <div class="flexMobile-string grayFont">
                        <div class="text-limiter">{{ $course->description }}</div>
                    </div>
                    <div class="flexMobile-string">
                        <div class="flexMobile-string_inner blackFont">Переглядів</div>
                        <div class="flexMobile-string_inner grayFont">{{ $course->views }}</div>
                    </div>
                    <div class="flexMobile-string">
                        <div class="flexMobile-string_inner blackFont">Пройдено разів</div>
                        <div class="flexMobile-string_inner grayFont">{{ $course->finished_count }}</div>
                    </div>
                    <div class="flexMobile-string blackFont">Творець (id)
                    </div>
                    <div class="flexMobile-string grayFont">
                        <div class="text-limiter">{{ $course->creator_id }} {{ $course->creator_name }}</div>
                    </div>
                    <div class="flexMobile-string btns-string">
                        <a class="flexMobile-btn_edit" href="{{ route('edit_course', ['course_id' => $course->id ]) }}"><span>Редагувати</span></a>
                        <a class="flexMobile-btn_delete" href="##" data-toggle="modal"
                            data-target="#deleteModal"><span>Видалити</span></a>
                    </div>
                </div>
                @endforeach

            </div>


        </div>


    </section>


</body>



@endsection
