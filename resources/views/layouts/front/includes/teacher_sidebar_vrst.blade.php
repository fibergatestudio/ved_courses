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
                    <img src="@if(isset($headTitle)) {{ asset($imgPath) }} @endif" alt="icon">
                </div>
                <div class="sidebar-top_mobile-name ug__top-name">
                    @if(isset($headTitle))
                        {{ $headTitle }}
                    @endif
                </div>
            </div>
            <!-- changeling block mobile-btn (end) -->

        </div>
        <div class="sidebar-menu_wrapper">
            <nav class="sidebar-menu_navigation">
                <ul class="sidebar_title-wrapper">
                    <li class="sidebar_title-inner">
                        <div class="sidebar_title-imgBox">
                            <a href="{{ route('teacher_panel') }}"><img class="sidebar_title-image" src="/img/teacher-menu-1.png" alt="icon"></a>
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
    </div>
</div>
