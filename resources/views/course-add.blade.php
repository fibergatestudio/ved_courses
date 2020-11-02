<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

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
    <div class="bootstrap-restylingStudent modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <ul class="student-menu-wrapper">
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Панель курсів</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Профіль</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Налаштування</a>
                    </li>
                    <li class="student-menu-inner">
                        <a class="student-menu-link" href="##">Вийти</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- student modal-page (end) -->

    <!-- deleteBtn modal-page (begin) -->
    <div class="bootstrap-restylingStudent modal fade" id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="deleteMenu-wrapper">

                    <div class="deleteMenu-topImg">
                        <img src="assets/img/basket.png" alt="icon">
                    </div>
                    <div class="deleteMenu-text">
                        Ви точно бажаєте видалити <br> Курс ?
                    </div>
                    <div class="deleteMenu-btn">
                        <a class="flexTable-btn_delete" href="##"><span>Видалити</span></a>
                    </div>
                </div>
                </ul>
            </div>
        </div>
    </div>


    <!-- deleteBtn modal-page (end) -->

    <header class="header header-narrowStudent">


        <div class="topWhite-layer topWhite-layer-narrowStudent">
            <div class="container">
                <div class="header-menu header-menu-narrowStudent">
                    <div class="header-menu_inner">
                        <nav class="header-menu_left">
                            <ul>
                                <li><a class="top-btn" href="##"><span>Про ресурс</span></a></li>
                                <li><a class="top-btn" href="##"><span>Тематичні напрямки</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-menu_inner">
                        <div class="header-menu_center header-menu_center--narrowStudent">
                            <img class="header-menu_logo" src="assets/img/logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="header-menu_inner">
                        <nav class="header-menu_right">
                            <ul>
                                <li><a class="top-btn" href="##"><span>Студент</span></a></li>
                                <li><a class="top-btn top-btn--user" href="##" data-toggle="modal"
                                        data-target="#exampleModal"><span class="student--user">Ім'я
                                            викладача</span></a></li>
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

            </div>
        </div>
    </header>
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

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
                    <div class="sidebar-menu_wrapper">
                        <nav class="sidebar-menu_navigation">
                            <ul class="sidebar_title-wrapper">
                                <li class="sidebar_title-inner">
                                    <div class="sidebar_title-imgBox">
                                        <img class="sidebar_title-image" src="assets/img/teacher-menu-1.png" alt="icon">
                                    </div>
                                    <a class="sidebar_title-link" href="##">Головна</a>
                                </li>
                                <li class="sidebar_title-inner">
                                    <div class="sidebar_title-imgBox">
                                        <img class="sidebar_title-image" src="assets/img/teacher-menu-2.png" alt="icon">
                                    </div>
                                    <a class="sidebar_title-link" href="##">Управління Курсами</a>
                                </li>
                                <li class="sidebar_title-inner">
                                    <div class="sidebar_title-imgBox">
                                        <img class="sidebar_title-image" src="assets/img/teacher-menu-3.png" alt="icon">
                                    </div>
                                    <a class="sidebar_title-link" href="##">Управління Групами</a>
                                </li>
                                <li class="sidebar_title-inner">
                                    <div class="sidebar_title-imgBox">
                                        <img class="sidebar_title-image" src="assets/img/teacher-menu-4.png" alt="icon">
                                    </div>
                                    <a class="sidebar_title-link" href="##">Управління Студентами</a>
                                </li>
                                <li class="sidebar_title-inner">
                                    <div class="sidebar_title-imgBox">
                                        <img class="sidebar_title-image" src="assets/img/teacher-menu-5.png" alt="icon">
                                    </div>
                                    <a class="sidebar_title-link" href="##">Управління Користувачами</a>
                                </li>
                                <li class="sidebar_title-inner">
                                    <div class="sidebar_title-imgBox">
                                        <img class="sidebar_title-image" src="assets/img/teacher-menu-6.png" alt="icon">
                                    </div>
                                    <a class="sidebar_title-link" href="##">Вихід</a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                </div>

            </div>
            <!-- sidebar-menu (end) -->

            <div class="cource-container--mobile">
                <h3 class="courseEdit-title courseControl-title">Інформація про курс</h3>
                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Про цей курс
                    </div>
                    <div class="courseAdd-wrapper">
                        <div class="courseAdd-inner">
                            <div class="courseAdd-inner_left">
                                <div class="courseAdd_left--name">
                                    Опис<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdd-inner_right">
                                <form action="post">
                                    <textarea class="tinyMCE-area"></textarea>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="courseEdit-block">
                    <div class="courseEdit-top">
                        Чого ви навчитесь
                    </div>
                    <div class="courseAdd-wrapper no-padding-bottom">
                        <div class="courseAdd-top-text">Додайте <span>4</span> обов'язкових  пунктів</div>
                        <div class="courseAdd-inner courseAdd-inner_margbottom">
                            <div class="courseAdd-inner_left">
                                <div class="courseAdd_left--name">
                                    Пункт 1<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdd-inner_right">
                                <form action="post">
                                    <textarea class="tinyMCE-area"></textarea>
                                </form>
                            </div>
                        </div>

                        <div class="courseAdd-inner courseAdd-inner_margbottom">
                            <div class="courseAdd-inner_left">
                                <div class="courseAdd_left--name">
                                    Пункт 2<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdd-inner_right">
                                <form action="post">
                                    <textarea class="tinyMCE-area"></textarea>
                                </form>
                            </div>
                        </div>

                        <div class="courseAdd-inner courseAdd-inner_margbottom">
                            <div class="courseAdd-inner_left">
                                <div class="courseAdd_left--name">
                                    Пункт 3<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdd-inner_right">
                                <form action="post">
                                    <textarea class="tinyMCE-area"></textarea>
                                </form>
                            </div>
                        </div>

                        <div class="courseAdd-inner courseAdd-inner_margbottom">
                            <div class="courseAdd-inner_left">
                                <div class="courseAdd_left--name">
                                    Пункт 4<sup>*</sup>
                                </div>
                            </div>
                            <div class="courseAdd-inner_right">
                                <form action="post">
                                    <textarea class="tinyMCE-area"></textarea>
                                </form>
                            </div>
                        </div>

                        <div class="courseEdit-btn_wrapper">
                            <a href="##" class="courseEdit-btn courseEdit-btn-add">
                                <span>Додати пункт</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="courseEdit-btn-watch_wrapper">
                    <a class="courseEdit-btn-watch btn-watch--more courseAdd-btn" href="##"><span>Зберегти</span></a>
                     </div>

    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-wrapper">
                <ul class="footer-inner">
                    <li>
                        <a href="##">Про ресурс</a>
                    </li>
                    <li>
                        <a href="##">Тематичні напрями</a>
                    </li>
                    <li>
                        <a href="##">Кабінет</a>
                    </li>
                    <li>
                        <a href="##">Викладач</a>
                    </li>
                    <li>
                        <a href="##">Вхід</a>
                    </li>
                </ul>
                <ul class="footer-inner">
                    <li>
                        <a href="##">Серйозна та організована злочинності</a>
                    </li>
                    <li>
                        <a href="##">Кібер-злочинність</a>
                    </li>
                    <li>
                        <a href="##">Боротьба з тероризмом</a>
                    </li>
                    <li>
                        <a href="##">Основні права</a>
                    </li>
                    <li>
                        <a href="##">Співпраця між правоохоронними органами, обмін інформацією та сумісність</a>
                    </li>
                    <li>
                        <a href="##">Лідерство та інші навички</a>
                    </li>
                </ul>
                <ul class="footer-inner">
                    <li>
                        <a href="##">Вища освіта та дослідження</a>
                    </li>
                    <li>
                        <a href="##">Громадський порядок та профілактика</a>
                    </li>
                    <li>
                        <a href="##">Правоохоронні технології, криміналістика і конкретні області</a>
                    </li>
                    <li>
                        <a href="##">Союзні місії (СSDP)</a>
                    </li>
                    <li>
                        <a href="##">Програма обміну СEPOL</a>
                    </li>
                    <li>
                        <a href="##">Віртуальний навчальний центр з прав інтелектуальної власності</a>
                    </li>
                </ul>
                <ul class="footer-inner">
                    <li>
                        <a class="footer-phone" href="##">Завжди на зв'язку <br> <span>(098) 123 45 67</span></a>
                    </li>
                    <li>
                        <a class="footer-mail" href="##">Напишіть нам <br> <span>mail@gmail.com</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </footer>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script type="text/javascript" src="libs/tinymce/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: '.tinyMCE-area',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist | ' + 
                'insertfile link image media pageembed template ' ,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>