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
                    @if(Route::current()->getName() == 'admin_panel' || Route::current()->getName() == 'teacher_panel')
                        <li class="sidebar_title-inner bg-curent-menu">
                            <div class="sidebar_title-imgBox">
                                <a href="@if(Auth::user()->role == "admin") {{ route('admin_panel') }}
                                        @else {{ route('teacher_panel') }}
                                        @endif">
                                    <img class="sidebar_title-image" src="{{ asset('img/teacher-mobileMenu-1.png') }}" alt="icon">
                                </a>
                            </div>
                            <a class="sidebar_title-link bg-curent-menu" href="{{ isset($curentPath) ? $curentPath : '' }}">{{ __('Головна') }}</a>
                        </li>
                    @else
                        <li class="sidebar_title-inner">
                            <div class="sidebar_title-imgBox">
                                <a href="@if(Auth::user()->role == "admin") {{ route('admin_panel') }}
                                    @else {{ route('teacher_panel') }}
                                    @endif">
                                    <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-1.png') }}" alt="icon">
                                </a>
                            </div>
                            <a class="sidebar_title-link" href="{{ isset($curentPath) ? $curentPath : '' }}">{{ __('Головна') }}</a>
                        </li>
                    @endif
                    @if( Auth::user()->role == "admin")
                        @if(Request::is('courses_controll*'))
                            <li class="sidebar_title-inner bg-curent-menu">
                                <div class="sidebar_title-imgBox">
                                    <a href="{{ route('courses_controll') }}">
                                        <img class="sidebar_title-image" src="{{ asset('img/teacher-mobileMenu-2.png') }}" alt="icon">
                                    </a>
                                </div>
                                <a class="sidebar_title-link bg-curent-menu" href="{{ route('courses_controll') }}">{{ __('Управління Курсами') }}</a>
                            </li>
                        @else
                            <li class="sidebar_title-inner">
                                <div class="sidebar_title-imgBox">
                                    <a href="{{ route('courses_controll') }}">
                                        <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-2.png') }}" alt="icon">
                                    </a>
                                </div>
                                <a class="sidebar_title-link" href="{{ route('courses_controll') }}">{{ __('Управління Курсами') }}</a>
                            </li>
                        @endif
                    @endif
                    @if(Request::is('groups*'))
                        <li class="sidebar_title-inner bg-curent-menu">
                            <div class="sidebar_title-imgBox">
                                <a href="{{ route('groups_controll') }}">
                                    <img class="sidebar_title-image" src="{{ asset('img/teacher-mobileMenu-3.png') }}" alt="icon">
                                </a>
                            </div>
                            <a class="sidebar_title-link bg-curent-menu" href="{{ route('groups_controll') }}">{{ __('Управління Групами') }}</a>
                        </li>
                    @else
                        <li class="sidebar_title-inner">
                            <div class="sidebar_title-imgBox">
                                <a href="{{ route('groups_controll') }}">
                                    <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-3.png') }}" alt="icon">
                                </a>
                            </div>
                            <a class="sidebar_title-link" href="{{ route('groups_controll') }}">{{ __('Управління Групами') }}</a>
                        </li>
                    @endif
                    @if(Request::is('students_controll*'))
                        <li class="sidebar_title-inner bg-curent-menu">
                            <div class="sidebar_title-imgBox">
                                <a href="{{ route('students_controll') }}">
                                    <img class="sidebar_title-image" src="{{ asset('img/teacher-mobileMenu-4.png') }}" alt="icon">
                                </a>
                            </div>
                            <a class="sidebar_title-link bg-curent-menu" href="{{ route('students_controll') }}">{{ __('Управління Студентами') }}</a>
                        </li>
                    @else
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
                        @if(Request::is('admin/users_control*'))
                            <li class="sidebar_title-inner bg-curent-menu">
                                <div class="sidebar_title-imgBox">
                                    <a href="{{ route('users_controll') }}">
                                        <img class="sidebar_title-image" src="{{ asset('img/teacher-mobileMenu-5.png') }}" alt="icon">
                                    </a>
                                </div>
                                <a class="sidebar_title-link bg-curent-menu" href="{{ route('users_controll') }}">{{ __('Управління Користувачами') }}</a>
                            </li>
                        @else
                            <li class="sidebar_title-inner">
                                <div class="sidebar_title-imgBox">
                                    <a href="{{ route('users_controll') }}">
                                        <img class="sidebar_title-image" src="{{ asset('img/teacher-menu-5.png') }}" alt="icon">
                                    </a>
                                </div>
                                <a class="sidebar_title-link" href="{{ route('users_controll') }}">{{ __('Управління Користувачами') }}</a>
                            </li>
                        @endif
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
