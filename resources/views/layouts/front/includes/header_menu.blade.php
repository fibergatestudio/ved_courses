<div class="header-menu">
    <div class="header-menu_inner">
        <nav class="header-menu_left">
            <ul>
                <li><a class="top-btn" href="##"><span>Про ресурс</span></a></li>
                <li><a class="top-btn" href="##"><span>Тематичні напрямки</span></a></li>
            </ul>
        </nav>
    </div>
    <div class="header-menu_inner">
        <div class="header-menu_center">
            <img class="header-menu_logo" src="{{ asset('img/logo.png') }}" alt="logo">
        </div>
    </div>
    <div class="header-menu_inner">
        <nav class="header-menu_right">
            <ul>
                <li><a class="top-btn" href="##"><span>Студент</span></a></li>
                <li><a class="top-btn" href="##"><span>Викладач</span></a></li>
                <!--<li><a class="top-btn" href="##" data-toggle="modal"
                        data-target="#exampleModal"><span>Увійти</span></a></li>-->
                <li><a class="top-btn" href="{{ route('login') }}">Увійти</a></li>
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
