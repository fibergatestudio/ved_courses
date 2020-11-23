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
                    <img src="{{ asset('img/007-web-traffic.png') }}" alt="icon">
                </div>
                <div class="sidebar-top_mobile-name ug__top-name">
                    Управління користувачами
                </div>
            </div>
            <!-- changeling block mobile-btn (end) -->

        </div>
        <div class="sidebar-menu_wrapper">
            <nav class="sidebar-menu_navigation">
                <ul class="sidebar_title-wrapper">
                    <li class="sidebar_title-inner">
                        <div class="sidebar_title-imgBox">
                            <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-1.png') }}" alt="icon">
                        </div>
                        <a class="sidebar_title-link" href="{{ route('admin_panel') }}">Головна</a>
                    </li>
                    <li class="sidebar_title-inner">
                        <div class="sidebar_title-imgBox">
                            <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-2.png') }}" alt="icon">
                        </div>
                        <a class="sidebar_title-link" href="{{ route('courses_controll') }}">Управління Курсами</a>
                    </li>
                    <li class="sidebar_title-inner">
                        <div class="sidebar_title-imgBox">
                            <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-3.png') }}" alt="icon">
                        </div>
                        <a class="sidebar_title-link" href="{{ route('groups_controll') }}">Управління Групами</a>
                    </li>
                    <li class="sidebar_title-inner">
                        <div class="sidebar_title-imgBox">
                            <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-4.png') }}" alt="icon">
                        </div>
                        <a class="sidebar_title-link" href="{{ route('students_controll') }}">Управління Студентами</a>
                    </li>
                    <li class="sidebar_title-inner">
                        <div class="sidebar_title-imgBox">
                            <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-5.png') }}" alt="icon">
                        </div>
                        <a class="sidebar_title-link" href="{{ route('users_controll') }}">Управління Користувачами</a>
                    </li>
                    <li class="sidebar_title-inner">
                        <div class="sidebar_title-imgBox">
                            <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-6.png') }}" alt="icon">
                        </div>
                        <a class="sidebar_title-link" href="{{ route('logout') }}">Вихід</a>
                    </li>
                </ul>
            </nav>

        </div>

    </div>

</div>
<!-- sidebar-menu (end) -->
{{--
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Меню</h3>
        </div>
        <ul class="list-unstyled components">
            <!-- <p>Меню</p> -->
            <!-- <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li> -->
            <li class="p-1">
                <a href="{{ route('admin_panel') }}"><button class="btn btn-success w-100 p-3">Главная</button></a>
            </li>
            <li class="p-1">
                <a href="{{ route('courses_controll') }}"><button class="btn btn-success w-100 p-3">Управление Курсами</button></a>
            </li>
            <li class="p-1">
                <a href="{{ route('tests_controll') }}"><button class="btn btn-success w-100 p-3">Управление Тестами</button></a>
            </li>
            <li class="p-1">
                <a href="{{ route('groups_controll') }}"><button class="btn btn-success w-100 p-3">Управление Групами</button></a>
            </li>
            <li class="p-1">
                <a href="{{ route('students_controll') }}"><button class="btn btn-success w-100 p-3">Управление Студентами</button></a>
            </li>
            <li class="p-1">
                <a href="{{ route('users_controll') }}"><button class="btn btn-success w-100 p-3">Управление пользователями</button></a>
            </li>
            <li class="p-1">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button class="btn btn-success w-100 p-3">Выход</button></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div> --}}
