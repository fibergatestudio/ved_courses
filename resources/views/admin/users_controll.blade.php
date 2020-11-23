@extends('layouts.front.front_child')

@section('content')

<section class="courseControl">
    <div class="courseControl-separator direction-separator">
    </div>
    <div class="courseControl-container sticky-container container">
        {{-- @if(session()->has('message_success'))
            <div class="alert alert-success">
                {{ session()->get('message_success') }}
            </div>
        @endif --}}

        @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління користувачами'])

        <div class="groups-control ug__group">
            <div class="groups-head">
                <h1 class="groups-head__title ug__head-title">Управління користувачами</h1>
            </div>
            <div class="groups-body ug__body">
                {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif --}}
                <div class="groups-title ug__content">
                    <div class="groups-title__elem groups-title__elem_style ug__title-elem">№'</div>
                    <div class="groups-title__elem groups-title__elem_style ug__title-elem">Логін</div>
                    <div class="groups-title__elem groups-title__elem_style ug__title-elem">Email</div>
                    <div class="groups-title__elem groups-title__elem_style ug__title-elem">Роль</div>
                    <div class="groups-title__elem groups-title__elem_style ug__title-elem">Управління</div>
                </div>
                <div class="groups-content ug__content">
                    @foreach($users as $user)
                    <div class="groups-row ug__row">
                        <div class="groups__elem ug__elem">{{ $user->id }}.</div>
                        <div class="groups__elem ug__elem">{{ $user->name }}</div>
                        <div class="groups__elem ug__elem">{{ $user->email }}</div>
                        <div class="groups__elem ug__elem">{{ $user->role }}</div>
                        <div class="groups__elem ug__elem">
                            <a class="flexTable-btn_edit groups-btn-edit-restyle ug_btn-edit"
                                href="{{ route('user_edit', ['user_id' => $user->id]) }}"><span>Редагувати</span></a>
                            @if($user->role != 'admin')
                                <a class="flexTable-btn_delete ug__btn-delete" href="##" data-toggle="modal"
                                    data-target="#deleteModal{{ $user->id }}"><span>Видалити</span></a>
                                @include('layouts.front.includes.modals.delete_user', ['modalId' => 'deleteModal'])
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="groups-control-mobile">
            <div class="groups-head">
                <h1 class="groups-head__title ug_m-head-title">Управління користувачами</h1>
            </div>
            <div class="groups-body">
                @foreach($users as $user)
                <div class="groups-content">
                    <div class="groups-row groups-row_style">
                        <div class="groups-row__elem">
                            <div
                                class="groups-title__elem  groups-row__elem_restyle ug__m-row-title ug__mt-bl-reset">№</div>
                            <div
                                class="groups__elem groups-row__elem_restyle ug__m-row-title ug__mobile-row-elem ug__mt-bl-reset">
                                {{ $user->id }}.
                            </div>
                        </div>
                        <div class="groups-row__elem">
                            <div class="groups-title__elem  ug__m-row-title">Логін</div>
                            <div class="groups__elem ug__m-row-title ug__mobile-row-elem">{{ $user->name }}</div>
                        </div>
                        <div class="groups-row__elem">
                            <div class="groups-title__elem  ug__m-row-title">Email</div>
                            <div class="groups__elem ug__m-row-title ug__mobile-row-elem">{{ $user->email }}</div>
                        </div>
                        <div class="groups-row__elem">
                            <div class="groups-title__elem  ug__m-row-title">Роль</div>
                            <div class="groups__elem ug__m-row-title ug__mobile-row-elem">{{ $user->role }}</div>
                        </div>
                        <div class="groups-row__elem">
                            <div class="groups__elem groups__elem-last-child groups__elem_style pl-0">
                                <a class="flexTable-btn_edit groups-btn-edit-restyle ug_btn-edit"
                                    href="{{ route('user_edit', ['user_id' => $user->id]) }}#"><span>Редагувати</span>
                                </a>
                                @if($user->role != 'admin')
                                    <a class="flexTable-btn_delete ug__btn-delete" href="##" data-toggle="modal"
                                        data-target="#deleteModalm{{ $user->id }}"><span>Видалити</span></a>
                                    @include('layouts.front.includes.modals.delete_user', ['modalId' => 'deleteModalm'])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        {{ $users->links('vendor.pagination.vrst_pagination') }}
    </div>
</section>
@endsection

{{-- <body>

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
                        <div class="sidebar-top_mobile-btn ug__mobile-top-block">
                            <div class="sidebar-top_mobile-img">
                                <img src="assets/img/007-web-traffic.png" alt="icon">
                            </div>
                            <div class="sidebar-top_mobile-name ug__top-name">
                                Управління користувачами
                            </div>
                        </div>
                        <!-- changeling block mobile-btn (end) -->

                    </div>
                    @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => __('Управління користувачами')])

                </div>

            </div>
            <!-- sidebar-menu (end) -->

            <div class="groups-control ug__group">
                <div class="groups-head">
                    <h1 class="groups-head__title ug__head-title"> Управління користувачами </h1>
                </div>
                <div class="groups-body ug__body">
                    <div class="groups-title ug__content">
                        <div class="groups-title__elem groups-title__elem_style ug__title-elem">№</div>
                        <div class="groups-title__elem groups-title__elem_style ug__title-elem">Логін</div>
                        <div class="groups-title__elem groups-title__elem_style ug__title-elem">Email</div>
                        <div class="groups-title__elem groups-title__elem_style ug__title-elem">Роль</div>
                        <div class="groups-title__elem groups-title__elem_style ug__title-elem">Управління </div>
                    </div>
                    @foreach($users as $user)
                        <div class="groups-content ug__content">
                            <div class="groups-row ug__row">
                                <div class="groups__elem ug__elem">{{ $user->id }}.</div>
                                <div class="groups__elem ug__elem">{{ $user->name }}</div>
                                <div class="groups__elem ug__elem">
                                {{ $user->email }}
                                </div>
                                <div class="groups__elem ug__elem">{{ $user->role }}</div>
                                <div class="groups__elem ug__elem">
                                    <a class="flexTable-btn_edit groups-btn-edit-restyle ug_btn-edit"
                                        href="{{ route('user_edit', ['user_id' => $user->id]) }}"><span>Редагувати</span></a>
                                    @if($user->role != 'admin')
                                    <a class="flexTable-btn_delete ug__btn-delete" href="##" data-toggle="modal"
                                    data-target="#deleteModal{{ $user->id }}"><span>Видалити</span></a>
                                        <div class="bootstrap-restylingStudent modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog_restyle">
                                                <div class="modal-content">
                                                    <div class="deleteMenu-wrapper">

                                                        <div class="deleteMenu-topImg">
                                                            <img src="/img/basket.png" alt="icon">
                                                        </div>
                                                        <div class="deleteMenu-text">
                                                            Ви точно бажаєте видалити <br> користувача?
                                                        </div>
                                                        <div class="deleteMenu-btn">
                                                            <a class="flexTable-btn_delete" href="{{ route('user_delete', ['user_id' => $user->id]) }}"><span>Видалити</span></a>
                                                        </div>
                                                    </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $users->links('vendor.pagination.vrst_pagination') }}
            </div>

            <div class="groups-control-mobile">
                <div class="groups-head">
                    <h1 class="groups-head__title ug_m-head-title"> Управління користувачами</h1>
                </div>
                <div class="groups-body">
                    <div class="groups-content">
                    @foreach($users as $user)
                        <div class="groups-row groups-row_style">
                            <div class="groups-row__elem">
                                <div
                                    class="groups-title__elem  groups-row__elem_restyle ug__m-row-title ug__mt-bl-reset">
                                    №
                                </div>
                                <div
                                    class="groups__elem groups-row__elem_restyle ug__m-row-title ug__mobile-row-elem ug__mt-bl-reset">
                                    1.
                                </div>
                            </div>
                            <div class="groups-row__elem">
                                <div class="groups-title__elem  ug__m-row-title">Логін</div>
                                <div class="groups__elem ug__m-row-title ug__mobile-row-elem">{{ $user->name }}
                                </div>
                            </div>
                            <div class="groups-row__elem">
                                <div class="groups-title__elem  ug__m-row-title">Email</div>
                                <div class="groups__elem ug__m-row-title ug__mobile-row-elem">
                                {{ $user->email }}</div>
                            </div>
                            <div class="groups-row__elem">
                                <div class="groups-title__elem  ug__m-row-title">Роль</div>
                                <div class="groups__elem ug__m-row-title ug__mobile-row-elem">{{ $user->role }}
                                </div>
                            </div>
                            <div class="groups-row__elem">
                                <div class="groups__elem groups__elem-last-child groups__elem_style pl-0">
                                    <a class="flexTable-btn_edit groups-btn-edit-restyle ug_btn-edit"
                                        href="{{ route('user_edit', ['user_id' => $user->id]) }}"><span>Редагувати</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                    {{ $users->links('vendor.pagination.vrst_pagination') }}
                </div>

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
</body> --}}
