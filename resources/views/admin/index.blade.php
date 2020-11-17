@extends('layouts.front.front_child')

@section('content')
<div style="display:none;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.admin_sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Панель') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->role == "admin")
                        Для управления используйте меню слева.
                    @elseif(Auth::user()->role == "teacher")
                        is Teacher
                    @elseif(Auth::user()->role == "student")
                        is student
                    @else
                        no ROLE or WRONG role
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<body>

    <!-- Burger-menu (begin)-->
    <ul class="menu_title-wrapper">

        <li class="menu_title-inner">
            <div class="menu_burger-clone">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Про ресурс</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Тематичні напрями</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Студент</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link menu_title-linkStudent" href="##">Ім'я викладача</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Панель курсів</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Профіль</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Налаштування</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link" href="##">Вийти</a>
        </li>

    </ul>
    <!-- Burger-menu (end)-->

    <!-- student modal-page (begin) -->

    <!-- student modal-page (end) -->

    <!-- deleteBtn modal-page (begin) -->

    <!-- deleteBtn modal-page (end) -->

    <!-- questionType modal-page (begin) -->
    <!-- questionType modal-page (end) -->

    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container container-height">
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
                        <div class="sidebar-top_mobile-btn">
                            <div class="sidebar-top_mobile-img">
                                <img src="assets/img/teacher-mobileMenu-2.png" alt="icon">
                            </div>
                            <div class="sidebar-top_mobile-name">
                                Управління курсами
                            </div>
                        </div>
                        <!-- changeling block mobile-btn (end) -->

                    </div>
                    @include('layouts.front.includes.admin_sidebar_vrst')

                </div>
            </div>
            <!-- sidebar-menu (end) -->
            <div class="cource-container--mobile">
               
                    <div class="multipleChoice-top-title">
                        <h3 class="multipleChoice-title">Панель Адміна</h3>
                    </div>

                    <div class="multipleChoice-block newTest-block active">
                        
                    </div>

                    <div class="multipleChoice-block newTest-block active">
                        <div class="newTest-top active">
                            Вітаю!
                        </div>
                        <div class="newTest-wrapper show">
                            Для управління використовуйте панель зліва.
                        </div>
                    </div>

                </div>
            </form>

    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

</body>

@endsection
