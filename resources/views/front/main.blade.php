@extends('layouts.front.front')

@section('title')
    Головна
@endsection

@section('header')
<div class="header-text">
    <div class="header-text-top">
        Virtual education
    </div>
    <div class="header-text-middle">
        Пізнай світ по-новому
    </div>
    <a class="header-btn" href="##">
        <span>перейти до курсів</span>
    </a>
</div>
@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>Тематичні напрямки</span></div>
    </div>
    <div class="container">
        <div class="direction-wrapper">
            <div class="direction-inner">
                <div class="direction-inner_top">
                    <img class="direction-inner_img" src="{{ asset('img/direction_1.jpg') }}" alt="img">
                    <a class="image-btn" href="##">
                        <span>Підкатегорії</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="direction-inner_bottom">
                    <div class="direction-inner_bottom--title">
                        <h4>Вивчення іноземних мов</h4>
                    </div>
                    <div class="direction-inner_bottom--text">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printerLorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer
                    </div>
                </div>
            </div>
            <div class="direction-inner">
                <div class="direction-inner_top">
                    <img class="direction-inner_img" src="{{ asset('img/direction_2.jpg') }}" alt="img">
                    <a class="image-btn" href="##">
                        <span>Підкатегорії</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="direction-inner_bottom">
                    <div class="direction-inner_bottom--title">
                        <h4>Симулятор слідчих <br> дій</h4>
                    </div>
                    <div class="direction-inner_bottom--text">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printerLorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer
                    </div>
                </div>
            </div>
            <div class="direction-inner">
                <div class="direction-inner_top">
                    <img class="direction-inner_img" src="{{ asset('img/direction_3.jpg') }}" alt="img">
                    <a class="image-btn" href="##">
                        <span>Підкатегорії</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="direction-inner_bottom">
                    <div class="direction-inner_bottom--title">
                        <h4>Назва розділу підрозділу</h4>
                    </div>
                    <div class="direction-inner_bottom--text">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printerLorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="popular">
    <div class="direction-separator popular-separator">
        <div class="direction-separator_badge"><span>Найпопулярніші курси</span></div>
    </div>
    <div class="container">
        <div class="popular-wrapper">
            <div class="popular-inner">
                <div class="popular-inner_top">
                    <img class="popular-inner_img" src="{{ asset('img/popular_1.jpg') }}" alt="img">
                    <a class="image-btn popular-btn" href="##">
                        <span>перейти до курсів</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="popular-inner_bottom">
                    <div class="popular-inner_bottom--title">
                        <h4>Довга назва найпопулярнішого курсу</h4>
                    </div>
                </div>
            </div>
            <div class="popular-inner">
                <div class="popular-inner_top">
                    <img class="popular-inner_img" src="{{ asset('img/popular_2.jpg') }}" alt="img">
                    <a class="image-btn popular-btn" href="##">
                        <span>перейти до курсів</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="popular-inner_bottom">
                    <div class="popular-inner_bottom--title">
                        <h4>Довга назва найпопулярнішого курсу</h4>
                    </div>
                </div>
            </div>
            <div class="popular-inner">
                <div class="popular-inner_top">
                    <img class="popular-inner_img" src="{{ asset('img/popular_3.jpg') }}" alt="img">
                    <a class="image-btn popular-btn" href="##">
                        <span>перейти до курсів</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="popular-inner_bottom">
                    <div class="popular-inner_bottom--title">
                        <h4>Довга назва найпопулярнішого курсу</h4>
                    </div>
                </div>
            </div>
            <div class="popular-inner">
                <div class="popular-inner_top">
                    <img class="popular-inner_img" src="{{ asset('img/popular_4.jpg') }}" alt="img">
                    <a class="image-btn popular-btn" href="##">
                        <span>перейти до курсів</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="popular-inner_bottom">
                    <div class="popular-inner_bottom--title">
                        <h4>Довга назва найпопулярнішого курсу</h4>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<section class="main">
    <div class="container">
        <h3 class="main-title_top">Назва розділу</h3>

        <div class="main-menu">
            <div class="main-menu_inner active">
                <a class="main-menu_btn" href="#anchor_course"><span>Про курс</span></a>
            </div>
            <div class="main-menu_inner ">
                <a class="main-menu_btn" href="#anchor_teachers"><span>Викладачі</span></a>
            </div>
            <div class="main-menu_inner">
                <a class="main-menu_btn" href="#anchor_program"><span>Програма курсу</span></a>
            </div>
            <div class="main-menu_inner">
                <a class="main-menu_btn" href="#anchor_faq"><span>Поширені запитання</span></a>
            </div>
            <div class="main-menu_inner">
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/facebook.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/instagram.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/linkedin.pn') }}g" alt="img"></a></div>
            </div>
        </div>
        <h4 class="main-title_middle" id="anchor_course">Про цей курс</h4>
        <div class="main-textblock">
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
            printerLorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
            printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
            printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
            printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
            printer Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
            printerLorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
            printer
        </div>
        <div class="main-learn">
            <h4 class="main-learn_title">Чого ви навчитесь</h4>
            <div class="main-learn_wrapper">
                <div class="main-learn_inner">
                    <div class="main-learn_inner--icon"></div>
                    <div class="main-learn_inner--text">Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an</div>
                </div>
                <div class="main-learn_inner">
                    <div class="main-learn_inner--icon"></div>
                    <div class="main-learn_inner--text">Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an</div>
                </div>
                <div class="main-learn_inner">
                    <div class="main-learn_inner--icon"></div>
                    <div class="main-learn_inner--text">Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an</div>
                </div>
                <div class="main-learn_inner">
                    <div class="main-learn_inner--icon"></div>
                    <div class="main-learn_inner--text">Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an</div>
                </div>
            </div>
        </div>
        <div class="separator"></div>

        <div class="main-teachers">
            <h3 class="main-teachers_title" id="anchor_teachers">Викладачі</h3>
            <div class="teachers-grid_wrapper">
                <div class="teachers-grid_item">
                    <div class="teachers-item_photo">
                    </div>
                </div>
                <div class="teachers-grid_item">
                    <div class="teachers-item_name">Іванов Іван Іванович </div>
                    <div class="teachers-item_position">Професор наук</div>
                    <div class="teachers-item_students"><span>12645</span> &nbspучнів</div>
                    <div class="teachers-item_course"><span>25</span> &nbspкурсів</div>
                </div>
                <div class="teachers-grid_item">
                    <div class="teachers-item_text">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy
                        text ever since the 1500s, when an unknown printerLorem Ipsum has been the industry's
                        standard dummy text ever since the
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="main-programs">
            <h3 class="main-teachers_title" id="anchor_program">Програма курсу: що ви вивчите</h3>
            <div class="programs-grid_wrapper">
                <div class="programs-grid_item">
                    <div class="programs-item_lesson--number">01</div>
                    <div class="programs-item_lesson--text">Заняття</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_chapter">Глава шоста: Струни</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_text">У цьому класі ми дізнаємося, з чого ми зупинилися в попередньому
                        класі, починаючи з глави 6 підручника і розглядаючи рядки і переходячи до структур даних.
                        Другий тиждень цього уроку присвячена установці Python, якщо ви дійсно хочете запускати
                        додатки на своєму комп'ютері або ноутбуці. Якщо ви вирішите не встановлювати Python, ви
                        можете просто перейти на третій тиждень і отримати перевагу.</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_hours"><a href="##">4 години на завершення</a> </div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_video"><a href="##">7 відео ( всього 57 хв.), 7 матеріалів для
                            самостійного вивчення, 2 тести</a></div>
                </div>
                <div class="programs-grid_item">
                    <a class="programs-item_btn btn-watch" href="##"><span class="btn-watch_inner">переглянути
                            все</span></a>
                </div>
                <div class="programs-grid_item hidden_item ">
                    <div class="gray-separator"></div>
                    <div class="programs-item_video">5 відео</div>
                    <table class="hidden-menu">
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">8 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">4 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                    </table>
                    <div class="gray-separator"></div>
                    <div class="programs-item_book">2 матеріалів для самостійного вивчення</div>
                    <table class="hidden-menu">
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">10 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">10 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                    </table>
                    <div class="gray-separator"></div>
                </div>
            </div>

            <div class="programs-grid_wrapper">
                <div class="programs-grid_item">
                    <div class="programs-item_lesson--number">02</div>
                    <div class="programs-item_lesson--text">Заняття</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_chapter">Модуль: Установка і використання Python</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви могли писати
                        програми на Python. Ми не вимагаємо установки Python для цього класу. Ви можете писати і
                        тестувати програми на Python в браузері, використовуючи "Python Code Playground" в цьому
                        уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі" для деталей.
                    </div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_hours"><a href="##">3 години на завершення</a></div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_video"><a href="##">5 відео (всього 23 хв.), 2 матеріалів для
                            самостійного вивчення, 2 тести</a></div>
                </div>
                <div class="programs-grid_item">
                    <a class="programs-item_btn btn-watch active" href="##"><span
                            class="btn-watch_inner">Згорнути</span></a>
                </div>
                <div class="programs-grid_item hidden_item show">
                    <div class="gray-separator"></div>
                    <div class="programs-item_video">5 відео</div>
                    <table class="hidden-menu">
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">8 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">4 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                    </table>
                    <div class="gray-separator"></div>
                    <div class="programs-item_book">2 матеріалів для самостійного вивчення</div>
                    <table class="hidden-menu">
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">10 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">10 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                    </table>
                    <div class="gray-separator"></div>
                </div>
            </div>

            <div class="programs-grid_wrapper">
                <div class="programs-grid_item">
                    <div class="programs-item_lesson--number">03</div>
                    <div class="programs-item_lesson--text">Заняття</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_chapter">Глава шоста: Струни</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_text">У цьому класі ми дізнаємося, з чого ми зупинилися в попередньому
                        класі, починаючи з глави 6 підручника і розглядаючи рядки і переходячи до структур даних.
                        Другий тиждень цього уроку присвячена установці Python, якщо ви дійсно хочете запускати
                        додатки на своєму комп'ютері або ноутбуці. Якщо ви вирішите не встановлювати Python, ви
                        можете просто перейти на третій тиждень і отримати перевагу.</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_hours"><a href="##">4 години на завершення</a></div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_video"><a href="##">7 відео ( всього 57 хв.), 7 матеріалів для
                            самостійного вивчення, 2 тести</a></div>
                </div>
                <div class="programs-grid_item">
                    <a class="programs-item_btn btn-watch" href="##"><span class="btn-watch_inner">переглянути
                            все</span></a>
                </div>
                <div class="programs-grid_item hidden_item ">
                    <div class="gray-separator"></div>
                    <div class="programs-item_video">5 відео</div>
                    <table class="hidden-menu">
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">8 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">4 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                    </table>
                    <div class="gray-separator"></div>
                    <div class="programs-item_book">2 матеріалів для самостійного вивчення</div>
                    <table class="hidden-menu">
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">10 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">10 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                    </table>
                    <div class="gray-separator"></div>
                </div>
            </div>

            <div class="programs-grid_wrapper">
                <div class="programs-grid_item">
                    <div class="programs-item_lesson--number">04</div>
                    <div class="programs-item_lesson--text">Заняття</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_chapter">Глава шоста: Струни</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_text">У цьому класі ми дізнаємося, з чого ми зупинилися в попередньому
                        класі, починаючи з глави 6 підручника і розглядаючи рядки і переходячи до структур даних.
                        Другий тиждень цього уроку присвячена установці Python, якщо ви дійсно хочете запускати
                        додатки на своєму комп'ютері або ноутбуці. Якщо ви вирішите не встановлювати Python, ви
                        можете просто перейти на третій тиждень і отримати перевагу.</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_hours"><a href="##">4 години на завершення</a></div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_video"><a href="##">7 відео ( всього 57 хв.), 7 матеріалів для
                            самостійного вивчення, 2 тести</a></div>
                </div>
                <div class="programs-grid_item">
                    <a class="programs-item_btn btn-watch" href="##"><span class="btn-watch_inner">переглянути
                            все</span></a>
                </div>
                <div class="programs-grid_item hidden_item ">
                    <div class="gray-separator"></div>
                    <div class="programs-item_video">5 відео</div>
                    <table class="hidden-menu">
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">8 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">4 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">3 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                    </table>
                    <div class="gray-separator"></div>
                    <div class="programs-item_book">2 матеріалів для самостійного вивчення</div>
                    <table class="hidden-menu">
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">10 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column">10 хв.</td>
                            <td class="hidden-menu_column">
                                <div class="hidden-menu_dot"></div>
                            </td>
                            <td class="hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown printer</a></td>
                        </tr>
                    </table>
                    <div class="gray-separator"></div>
                </div>
            </div>

            <a class="btn-watch--more" href="##"><span>Переглянути більше</span></a>
        </div>

        <div class="separator"></div>

        <div class="main-faq">
            <h3 class="main-teachers_title" id="anchor_faq">Поширені запитання</h3>
            <div class="main-faq_panel active">Коли я отримаю доступ до лекцій і завдань?</div>
            <div class="main-faq_panel--inner show">
                <p>Доступ до лекцій і завдань надається в залежності від типу реєстрації. Якщо ви проходите курс в
                    режимі слухача, то отримаєте безкоштовний доступ до більшості матеріалів курсу. Щоб відкрити
                    оцінювані завдання і можливість отримати сертифікат, необхідно буде придбати проходження з
                    сертифікатом. Це можна зробити під час проходження в режимі слухача або після нього. Якщо ви не
                    бачите варіанти 'Режим слухача'.</p>
                <p>- Курс може не пропонуватися в режимі слухача. Спробуйте безкоштовну пробну версію або подайте
                    заявку на фінансову допомогу.</p>
                <p>- Курс пропонуватися в режимі 'Повний курс, без сертифіката'. У ньому можна переглядати всі
                    матеріали, виконувати обов'язкові завдання і отримати підсумкову оцінку. Придбати додатково
                    проходження з сертифікатом в такому випадку не можна.</p>
            </div>
            <div class="main-faq_panel ">Коли я отримаю доступ до лекцій і завдань?</div>
            <div class="main-faq_panel--inner">
                <p>Доступ до лекцій і завдань надається в залежності від типу реєстрації. Якщо ви проходите курс в
                    режимі слухача, то отримаєте безкоштовний доступ до більшості матеріалів курсу. Щоб відкрити
                    оцінювані завдання і можливість отримати сертифікат, необхідно буде придбати проходження з
                    сертифікатом. Це можна зробити під час проходження в режимі слухача або після нього. Якщо ви не
                    бачите варіанти 'Режим слухача'.</p>
                <p>- Курс може не пропонуватися в режимі слухача. Спробуйте безкоштовну пробну версію або подайте
                    заявку на фінансову допомогу.</p>
                <p>- Курс пропонуватися в режимі 'Повний курс, без сертифіката'. У ньому можна переглядати всі
                    матеріали, виконувати обов'язкові завдання і отримати підсумкову оцінку. Придбати додатково
                    проходження з сертифікатом в такому випадку не можна.</p>
            </div>
            <div class="main-faq_panel ">Коли я отримаю доступ до лекцій і завдань?</div>
            <div class="main-faq_panel--inner">
                <p>Доступ до лекцій і завдань надається в залежності від типу реєстрації. Якщо ви проходите курс в
                    режимі слухача, то отримаєте безкоштовний доступ до більшості матеріалів курсу. Щоб відкрити
                    оцінювані завдання і можливість отримати сертифікат, необхідно буде придбати проходження з
                    сертифікатом. Це можна зробити під час проходження в режимі слухача або після нього. Якщо ви не
                    бачите варіанти 'Режим слухача'.</p>
                <p>- Курс може не пропонуватися в режимі слухача. Спробуйте безкоштовну пробну версію або подайте
                    заявку на фінансову допомогу.</p>
                <p>- Курс пропонуватися в режимі 'Повний курс, без сертифіката'. У ньому можна переглядати всі
                    матеріали, виконувати обов'язкові завдання і отримати підсумкову оцінку. Придбати додатково
                    проходження з сертифікатом в такому випадку не можна.</p>
            </div>
            <div class="main-faq_panel ">Коли я отримаю доступ до лекцій і завдань?</div>
            <div class="main-faq_panel--inner">
                <p>Доступ до лекцій і завдань надається в залежності від типу реєстрації. Якщо ви проходите курс в
                    режимі слухача, то отримаєте безкоштовний доступ до більшості матеріалів курсу. Щоб відкрити
                    оцінювані завдання і можливість отримати сертифікат, необхідно буде придбати проходження з
                    сертифікатом. Це можна зробити під час проходження в режимі слухача або після нього. Якщо ви не
                    бачите варіанти 'Режим слухача'.</p>
                <p>- Курс може не пропонуватися в режимі слухача. Спробуйте безкоштовну пробну версію або подайте
                    заявку на фінансову допомогу.</p>
                <p>- Курс пропонуватися в режимі 'Повний курс, без сертифіката'. У ньому можна переглядати всі
                    матеріали, виконувати обов'язкові завдання і отримати підсумкову оцінку. Придбати додатково
                    проходження з сертифікатом в такому випадку не можна.</p>
            </div>
        </div>
    </div>
</section>
<section class="partners">
    <div class="direction-separator popular-separator">
        <div class="direction-separator_badge"><span>Наші партнери</span></div>
    </div>

    <div class="container">
        <div class="partners-wrapper">
            <div class="partners-inner">
                <div class="partners-inner_top"> <img src="{{ asset('img/partners-img.jpg') }}" alt="img"><a href="##"></a>
                </div>
                <div class="partners-inner_title">Lorem Ipsum has been</div>
                <div class="partners-inner_text">Lorem Ipsum has been the industry's standard dummy text ever since
                    the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever
                    since the</div>
            </div>
            <div class="partners-inner">
                <div class="partners-inner_top"> <img src="{{ asset('img/partners-img.jpg') }}" alt="img"><a href="##"></a>
                </div>
                <div class="partners-inner_title">Lorem Ipsum has been</div>
                <div class="partners-inner_text">Lorem Ipsum has been the industry's standard dummy text ever since
                    the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever
                    since the</div>
            </div>
            <div class="partners-inner">
                <div class="partners-inner_top"> <img src="{{ asset('img/partners-img.jpg') }}" alt="img"><a href="##"></a>
                </div>
                <div class="partners-inner_title">Lorem Ipsum has been</div>
                <div class="partners-inner_text">Lorem Ipsum has been the industry's standard dummy text ever since
                    the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy text ever
                    since the</div>
            </div>
        </div>

        <!-- hidden-slider-here (begin)-->
        <div class="partners-slider-wrapper">
            <div class="partners-slider-inner">
                <div class="partners-inner">
                    <div class="partners-inner_top"> <img src="{{ asset('img/partners-img.jpg') }}" alt="img"><a
                            href="##"></a></div>
                    <div class="partners-inner_title">Lorem Ipsum has been</div>
                    <div class="partners-inner_text">Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy
                        text ever since the</div>
                </div>
                <div class="partners-inner">
                    <div class="partners-inner_top"> <img src="{{ asset('img/partners-img.jpg') }}" alt="img"><a
                            href="##"></a></div>
                    <div class="partners-inner_title">Lorem Ipsum has been</div>
                    <div class="partners-inner_text">Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy
                        text ever since the</div>
                </div>
                <div class="partners-inner">
                    <div class="partners-inner_top"> <img src="{{ asset('img/partners-img.jpg') }}" alt="img"><a
                            href="##"></a></div>
                    <div class="partners-inner_title">Lorem Ipsum has been</div>
                    <div class="partners-inner_text">Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s, when an unknown printer Lorem Ipsum has been the industry's standard dummy
                        text ever since the</div>
                </div>

            </div>
        </div>

        <!-- hidden-slider-here (end)-->
    </div>

</section>
@endsection
