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
                    <img src="{{ asset('img/007-web-traffic.png') }}" alt="icon">
                </div>
                <div class="sidebar-top_mobile-name ug__top-name">
                    {{ $headTitle }}
                </div>
            </div>
            <!-- changeling block mobile-btn (end) -->

        </div>
        <div class="sidebar-menu_wrapper">
            <nav class="sidebar-menu_navigation">
                <ul class="sidebar_title-wrapper">
                    <li class="sidebar_title-inner">
                        <div class="sidebar_title-imgBox">
                            <a href="{{ route('admin_panel') }}">
                                <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-1.png') }}" alt="icon">
                            </a>
                        </div>
                        <a class="sidebar_title-link" href="{{ route('admin_panel') }}">{{ __('Головна') }}</a>
                    </li>
                    @if( Auth::user()->role == "student" || "teacher" || "admin")
                        <li class="sidebar_title-inner">
                            <div class="sidebar_title-imgBox">
                                <a href="{{ route('courses_controll') }}">
                                    <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-2.png') }}" alt="icon">
                                </a>
                            </div>
                            <a class="sidebar_title-link" href="{{ route('courses_controll') }}">{{ __('Управління Курсами') }}</a>
                        </li>
                    @endif
                    @if( Auth::user()->role == "teacher" || "admin")
                        <li class="sidebar_title-inner">
                            <div class="sidebar_title-imgBox">
                                <a href="{{ route('groups_controll') }}">
                                    <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-3.png') }}" alt="icon">
                                </a>
                            </div>
                            <a class="sidebar_title-link" href="{{ route('groups_controll') }}">{{ __('Управління Групами') }}</a>
                        </li>
                        <li class="sidebar_title-inner">
                            <div class="sidebar_title-imgBox">
                                <a href="{{ route('students_controll') }}">
                                    <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-4.png') }}" alt="icon">
                                </a>
                            </div>
                            <a class="sidebar_title-link" href="{{ route('students_controll') }}">{{ __('Управління Студентами') }}</a>
                        </li>
                    @endif
                    @if( Auth::user()->role == "admin")
                        <li class="sidebar_title-inner">
                            <div class="sidebar_title-imgBox">
                                <a href="{{ route('users_controll') }}">
                                    <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-5.png') }}" alt="icon">
                                </a>
                            </div>
                            <a class="sidebar_title-link" href="{{ route('users_controll') }}">{{ __('Управління Користувачами') }}</a>
                        </li>
                    @endif
                    <li class="sidebar_title-inner">
                        <div class="sidebar_title-imgBox">
                            <a href="{{ route('logout') }}">
                                <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-6.png') }}" alt="icon">
                            </a>
                        </div>
                        <a class="sidebar_title-link" href="{{ route('logout') }}">Вихід</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar-menu (end) -->
