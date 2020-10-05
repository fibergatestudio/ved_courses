<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Меню</h3>
        </div>
        <ul class="list-unstyled components">
            <li class="p-1">
                <a href="{{ route('student_panel') }}"><button class="btn btn-success w-100 p-3">Главная</button></a>
            </li>
            <li class="p-1">
                <a href="#"><button class="btn btn-success w-100 p-3" disabled>Мои Курсы</button></a>
            </li>
            <li class="p-1">
                <a href="{{ route('student_tests') }}"><button class="btn btn-success w-100 p-3">Мои Тесты</button></a>
            </li>
            <li class="p-1">
                <a href="{{ route('student_information') }}"><button class="btn btn-success w-100 p-3">Личная информация</button></a>
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