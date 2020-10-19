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
</div>