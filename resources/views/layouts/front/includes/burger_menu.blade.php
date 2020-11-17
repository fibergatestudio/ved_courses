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
        <a class="menu_title-link" href="#direction-separator_badge">Тематичні напрями</a>
    </li>
    @guest
        <li class="menu_title-inner">
            <a class="menu_title-link" href="##">Студент</a>
        </li>
        <li class="menu_title-inner">
            <a class="menu_title-link" href="##">Викладач</a>
        </li>
        <!--<li class="menu_title-inner">
            <a class="menu_title-link" href="##" data-toggle="modal" data-target="#exampleModal">Увійти</a>
        </li>-->
        <li class="menu_title-inner">
            <a class="menu_title-link" href="{{ route('login') }}">Увійти</a>
        </li>
    @endguest
    @auth
        @if( Auth::user()->role == "admin")
            <li class="menu_title-inner menu_title-innerStudent">
                <a class="menu_title-link menu_title-linkStudent" href="##">{{ auth()->user()->name }}</a>
            </li>
            <li class="menu_title-inner">
            <a class="menu_title-link" href="{{ route('admin_panel') }}">Панель управління</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="{{ route('admin_panel') }}">Управління</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="##">Налаштування</a>
            </li>
        @endif
        @if( Auth::user()->role == "teacher")
            <li class="menu_title-inner">
                <a class="menu_title-link" href="##">Студент</a>
            </li>
            <li class="menu_title-inner menu_title-innerStudent">
                <a class="menu_title-link menu_title-linkStudent" href="##">{{ auth()->user()->name }}</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="{{ route('teacher_panel') }}">Панель управління</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="##">Профіль</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="##">Налаштування</a>
            </li>
        @endif
        @if( Auth::user()->role == "student")
            <li class="menu_title-inner">
                <a class="menu_title-link" href="##">Викладач</a>
            </li>
            <li class="menu_title-inner menu_title-innerStudent">
                <a class="menu_title-link menu_title-linkStudent" href="##">{{ auth()->user()->name }}</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="{{ route('home') }}">Панель управління</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="##">Профіль</a>
            </li>
            <li class="menu_title-inner">
                <a class="menu_title-link" href="##">Налаштування</a>
            </li>
        @endif
        <li class="menu_title-inner">
            <a class="menu_title-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Вийти</a>
        </li>
    @endauth
</ul>
