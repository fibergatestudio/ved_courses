<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Меню</h3>
        </div>
        <ul class="list-unstyled components">
            <li class="p-1">
                <a href="{{ route('teacher_panel') }}"><button class="btn btn-success w-100 p-3">Главная</button></a>
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
                <a href="{{ route('teacher_information') }}"><button class="btn btn-success w-100 p-3">Личная информация</button></a>
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