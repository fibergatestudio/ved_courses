<div class="header-menu header-menu-narrow">
    <div class="header-menu_inner">
        <nav class="header-menu_left">
            <ul>
                <li><a class="top-btn" href="{{route('about')}}"><span>Про ресурс</span></a></li>
                <li><a class="top-btn" href="{{ URL::to('/') }}/#direction-separator_badge"><span>Тематичні напрямки</span></a></li>
            </ul>
        </nav>
    </div>
    <div class="header-menu_inner">
        <div class="header-menu_center header-menu_center--narrow">
            <a href="{{route('main')}}"><img class="header-menu_logo" src="{{ asset('img/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="header-menu_inner">
        <nav class="header-menu_right">
            <ul>
                @guest
                    <li><a class="top-btn" href="##"><span>Студент</span></a></li>
                    <li><a class="top-btn" href="##"><span>Викладач</span></a></li>
                    <!--<li><a class="top-btn" href="##" data-toggle="modal"
                            data-target="#exampleModal"><span>Увійти</span></a></li>-->
                    <li><a class="top-btn" href="{{ route('login') }}">Увійти</a></li>
                @endguest
                @auth
                    @if( Auth::user()->role == "admin")
                    <li><a class="top-btn top-btn--user" href="##" data-toggle="modal" data-target="#adminPanelModal"><span class="student--user">{{ auth()->user()->name }}</span></a></li>
                    @endif
                    @if( Auth::user()->role == "teacher")
                        <!--<li><a class="top-btn" href="##"><span>Студент</span></a></li>-->
                        <li><a class="top-btn top-btn--user" href="##" data-toggle="modal" data-target="#teacherPanelModal"><span class="student--user">{{ auth()->user()->name }}</span></a></li>
                    @endif
                    @if( Auth::user()->role == "student")
                        <!--<li><a class="top-btn" href="##"><span>Викладач</span></a></li>-->
                        <li><a class="top-btn top-btn--user ml-auto" href="##" data-toggle="modal" data-target="#studentPanelModal"><span class="student--user">{{ auth()->user()->name }}</span></a></li>
                    @endif
                    @if( Auth::user()->getMedia('photos')->last())
                        <style>.student--user:after { background-image: url({{ Auth::user()->getMedia('photos')->last()->getUrl('thumb') }}) !important; }</style>
                    @endif
                @endauth
            </ul>
        </nav>

        <!-- Burger-btn (begin) -->
        <div class="menu_burger">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- Burger-btn (end) -->

    </div>
</div>

@auth
    @if( Auth::user()->role == "admin")
        @include('layouts.front.includes.modals.admin_panel')
    @endif
    @if( Auth::user()->role == "teacher")
        @include('layouts.front.includes.modals.teacher_panel')
    @endif
    @if( Auth::user()->role == "student")
        @include('layouts.front.includes.modals.student_panel')
    @endif
@endauth
