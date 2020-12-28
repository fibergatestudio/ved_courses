<ul class="menu_title-wrapper">
    <li class="menu_title-inner">
        <div class="menu_burger-clone">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </li>
    <li class="menu_title-inner">
        <a class="menu_title-link" href="{{ route('about')}}">Про ресурс</a>
    </li>
    <li class="menu_title-inner">
        <a class="menu_title-link" href="{{ URL::to('/') }}/#direction-separator_badge"
            onclick="$('.menu_title-wrapper').hide();"
            >Тематичні напрями</a>
    </li>
    @guest
        <li class="menu_title-inner">
            <a class="menu_title-link" href="{{ route('login') }}">Студент</a>
        </li>
        <li class="menu_title-inner">
            <a class="menu_title-link" href="{{ route('login') }}">Викладач</a>
        </li>
        <li class="menu_title-inner">
            <a class="menu_title-link" href="{{ route('login') }}">Увійти</a>
        </li>
    @endguest
    @auth
        @if( Auth::user()->role == "admin")
            <li class="menu_title-inner menu_title-innerStudent">
                <a class="menu_title-link menu_title-linkStudent" href="">{{ auth()->user()->name }}</a>
            </li>
            <li class="menu_title-inner">
            <a class="menu_title-link" href="{{ route('courses_controll') }}">Панель курсів</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="{{ route('admin_panel') }}">Панель управління</a>
            </li>
        @endif
        @if( Auth::user()->role == "teacher")
            <li class="menu_title-inner menu_title-innerStudent">
                <a class="menu_title-link menu_title-linkStudent" href="{{ route('teacher.profile') }}">{{ auth()->user()->name }}</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="{{ route('teacher_panel') }}">Панель управління</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="{{ route('teacher.profile') }}">Профіль</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="{{ route('teacher.setting' )}}">Налаштування</a>
            </li>
        @endif
        @if( Auth::user()->role == "student")
            <li class="menu_title-inner menu_title-innerStudent">
                <a class="menu_title-link menu_title-linkStudent" href="{{ route('student_profile') }}">{{ auth()->user()->name }}</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="{{ route('student_courses') }}">Панель управління</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="{{ route('student_profile') }}">Профіль</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="{{ route('student_information') }}">Налаштування</a>
            </li>
        @endif
        <li class="menu_title-inner">
            <a class="menu_title-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Вийти</a>
        </li>
    @endauth
</ul>
