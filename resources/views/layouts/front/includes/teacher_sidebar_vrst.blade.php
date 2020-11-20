<div class="sidebar-menu_wrapper">
    <nav class="sidebar-menu_navigation">
        <ul class="sidebar_title-wrapper">
            <li class="sidebar_title-inner">
                <div class="sidebar_title-imgBox">
                    <a href="{{ route('admin_panel') }}"><img class="sidebar_title-image" src="/img/teacher-menu-1.png" alt="icon"></a>
                </div>
                <a class="sidebar_title-link" href="{{ route('teacher_panel') }}">Головна</a>
            </li>
            <li class="sidebar_title-inner">
                <div class="sidebar_title-imgBox">
                    <a href="{{ route('groups_controll') }}"><img class="sidebar_title-image" src="/img/teacher-menu-3.png" alt="icon"></a>
                </div>
                <a class="sidebar_title-link" href="{{ route('groups_controll') }}">Управління Групами</a>
            </li>
            <li class="sidebar_title-inner">
                <div class="sidebar_title-imgBox">
                    <a href="{{ route('students_controll') }}"><img class="sidebar_title-image" src="/img/teacher-menu-4.png" alt="icon"></a>
                </div>
                <a class="sidebar_title-link" href="{{ route('students_controll') }}">Управління Студентами</a>
            </li>
            <li class="sidebar_title-inner">
                <div class="sidebar_title-imgBox">
                    <a href="{{ route('logout') }}"><img class="sidebar_title-image" src="/img/teacher-menu-6.png" alt="icon"></a>
                </div>
                <a class="sidebar_title-link" href="{{ route('logout') }}">Вихід</a>
            </li>
        </ul>
    </nav>

</div>
