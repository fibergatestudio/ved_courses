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
            <a class="menu_title-link" href="##">Викладач</a>
        </li>
        <li class="menu_title-inner menu_title-innerStudent">
            <a class="menu_title-link menu_title-linkStudent" href="##">Ім'я студента</a>
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
                                <li><a class="top-btn" href="##"><span>Викладач</span></a></li>
                                <li><a class="top-btn top-btn--user" href="##" data-toggle="modal"
                                        data-target="#exampleModal"><span class="student--user">Ім'я студента</span></a>
                                </li>
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
    <section class="studentSettings">
        <div class="studentSettings-separator">
            <div class="studentSettings-separator_badge"><span>Налаштування облікового запису</span></div>
        </div>
        <div class="container">
            <div class="studentSettings-grid-top">
                <div class="grid-top_item">
                    <div class="grid-top_name">Ім'я користувача<sup>*</sup></div>
                    <div class="grid-top_example">Приклад: Іванов Іван Іванович</div>
                    <input class="studentSettings-input" type="text" placeholder="Прізвище" required>
                    <input class="studentSettings-input" type="text" placeholder="Ім'я" required>
                    <input class="studentSettings-input" type="text" placeholder="По батькові" required>
                </div>
                <div class="grid-top_item">
                    <div class="grid-top_prometheus">Ім’я для ідентифікації на Prometheus. Ви не зможете змінити ім’я
                        користувача.</div>
                </div>
                <div class="grid-top_item">
                    <div class="grid-top_name">Фото профілю</div>
                    <div class="photo-wrapper">
                        <div class="photo-photo"></div>
                        <div class="photo-text">
                            <p>Файли з розширенням JPG, GIF або PNG. </p>
                            <p>Максимальний розмір - 1 Мб. </p>
                            <a class="photo-btn" href="##">
                                <span>Відправити фото </span>
                                <input class="photo-btn_input" type="file">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grid-top_item">
                    <div class="grid-top_name">Поштова скринька<sup>*</sup></div>
                    <input class="studentSettings-input studentSettings-email" type="email" placeholder="mail@gmail.com"
                        required>
                </div>
                <div class="grid-top_item">
                    <div class="grid-top_email">Адреса електронної пошти, яку ви використовуєте, щоб увійти на сайт.
                        Повідомлення з Ved і ваших курсів будуть відправлятися на цю адресу.</div>
                </div>
            </div>
            <div class="separator settings-separator"></div>

            <div class="studentSettings-grid-middle">
                <div class="grid-middle_item">
                    <div class="middle-wrapper">
                        <label class="middle-studentSettings_label">Пароль</label>
                        <input class="middle-studentSettings_password" type="password" placeholder="******" required>
                    </div>
                    <div class="middle-wrapper">
                        <label class="middle-studentSettings_label">Новий пароль</label>
                        <input class="middle-studentSettings_password" type="password" placeholder="******" required>
                    </div>
                    <div class="middle-wrapper">
                        <label class="middle-studentSettings_label">Повторити пароль</label>
                        <input class="middle-studentSettings_password" type="password" placeholder="******" required>
                    </div>
                </div>
                <div class="grid-middle_item">
                    <div class="middle-btn_wrapper">
                    <a class="middle-btn" href="##"><span>Зберегти</span></a></div>
                </div>
            </div>
            <div class="separator settings-separator"></div>
            <div class="studentSettings-flex-bottom">
                <div class="grid-top_name">Назва ВУЗа</div>
                <div class="studentSettings-bottom_wrapper">
                <input class="studentSettings-bottom-input studentSettings-input" type="text" placeholder="Повна назва закладу" required>
                <div class="studentSettings-bottom_text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard</div>
                </div>

                <div class="grid-top_name">Номер курсу та групи</div>
                <div class="studentSettings-bottom_wrapper">
                <input class="studentSettings-bottom-input studentSettings-input" type="text" placeholder="Повна назва закладу" required>
                <div class="studentSettings-bottom_text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard</div>
                </div>

                <div class="grid-top_name">Номер студентського квитка</div>
                <div class="studentSettings-bottom_wrapper">
                <input class="studentSettings-bottom-input studentSettings-input" type="text" placeholder="Повна назва закладу" required>
                <div class="studentSettings-bottom_text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard</div>
                </div>

                <a class="studentSettings-bottom-btn btn-watch--more" href="##"><span>Зберегти</span></a>

            </div>

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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>