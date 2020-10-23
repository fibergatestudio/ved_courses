@extends('layouts.front.front_child')

@section('title')
    Поширені запитання
@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>Назва розділу підрозділу</span></div>
    </div>
    <div class="container">
        <!--<a class="breadcrumbs" href="#">Головна сторінка / Курс назва</a> -->
        <ul class="breadcrumbs_list">
            <li class="breadcrumbs_item">
                <a href="http://ved.com.ua/" class="breadcrumbs_link">Головна</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="" class="breadcrumbs_link breadcrumbs_active">Назва курсу</a>
            </li>
        </ul>

        <div class="main-menu">
            <div class="main-menu_inner">
                <a class="main-menu_btn" href="about-course.html"><span>Про курс</span></a>
            </div>
            <div class="main-menu_inner ">
                <a class="main-menu_btn" href="teachers.html"><span>Викладачі</span></a>
            </div>
            <div class="main-menu_inner">
                <a class="main-menu_btn" href="program.html"><span>Програма курсу</span></a>
            </div>
            <div class="main-menu_inner active">
                <a class="main-menu_btn" href="questions.html"><span>Поширені запитання</span></a>
            </div>
            <div class="main-menu_inner">
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/facebook.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/instagram.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/linkedin.png') }}" alt="img"></a></div>
            </div>
        </div>


        <div class="questions-wrapper main-faq">
            <h3 class="main-teachers_title" id="anchor_faq">Поширені запитання</h3>
        <div class="main-faq_panel active">Коли я отримаю доступ до лекцій і завдань?</div>
        <div class="main-faq_panel--inner show">
            <p>Доступ до лекцій і завдань надається в залежності від типу реєстрації. Якщо ви проходите курс в режимі слухача, то отримаєте безкоштовний доступ до більшості матеріалів курсу. Щоб відкрити оцінювані завдання і можливість отримати сертифікат, необхідно буде придбати проходження з сертифікатом. Це можна зробити під час проходження в режимі слухача або після нього. Якщо ви не бачите варіанти 'Режим слухача'.</p>
            <p>- Курс може не пропонуватися в режимі слухача. Спробуйте безкоштовну пробну версію або подайте заявку на фінансову допомогу.</p>
            <p>- Курс пропонуватися в режимі 'Повний курс, без сертифіката'. У ньому можна переглядати всі матеріали, виконувати обов'язкові завдання і отримати підсумкову оцінку. Придбати додатково проходження з сертифікатом в такому випадку не можна.</p>
        </div>
        <div class="main-faq_panel ">Коли я отримаю доступ до лекцій і завдань?</div>
        <div class="main-faq_panel--inner">
            <p>Доступ до лекцій і завдань надається в залежності від типу реєстрації. Якщо ви проходите курс в режимі слухача, то отримаєте безкоштовний доступ до більшості матеріалів курсу. Щоб відкрити оцінювані завдання і можливість отримати сертифікат, необхідно буде придбати проходження з сертифікатом. Це можна зробити під час проходження в режимі слухача або після нього. Якщо ви не бачите варіанти 'Режим слухача'.</p>
            <p>- Курс може не пропонуватися в режимі слухача. Спробуйте безкоштовну пробну версію або подайте заявку на фінансову допомогу.</p>
            <p>- Курс пропонуватися в режимі 'Повний курс, без сертифіката'. У ньому можна переглядати всі матеріали, виконувати обов'язкові завдання і отримати підсумкову оцінку. Придбати додатково проходження з сертифікатом в такому випадку не можна.</p>
        </div>
        <div class="main-faq_panel ">Коли я отримаю доступ до лекцій і завдань?</div>
        <div class="main-faq_panel--inner">
            <p>Доступ до лекцій і завдань надається в залежності від типу реєстрації. Якщо ви проходите курс в режимі слухача, то отримаєте безкоштовний доступ до більшості матеріалів курсу. Щоб відкрити оцінювані завдання і можливість отримати сертифікат, необхідно буде придбати проходження з сертифікатом. Це можна зробити під час проходження в режимі слухача або після нього. Якщо ви не бачите варіанти 'Режим слухача'.</p>
            <p>- Курс може не пропонуватися в режимі слухача. Спробуйте безкоштовну пробну версію або подайте заявку на фінансову допомогу.</p>
            <p>- Курс пропонуватися в режимі 'Повний курс, без сертифіката'. У ньому можна переглядати всі матеріали, виконувати обов'язкові завдання і отримати підсумкову оцінку. Придбати додатково проходження з сертифікатом в такому випадку не можна.</p>
        </div>
        <div class="main-faq_panel ">Коли я отримаю доступ до лекцій і завдань?</div>
        <div class="main-faq_panel--inner">
            <p>Доступ до лекцій і завдань надається в залежності від типу реєстрації. Якщо ви проходите курс в режимі слухача, то отримаєте безкоштовний доступ до більшості матеріалів курсу. Щоб відкрити оцінювані завдання і можливість отримати сертифікат, необхідно буде придбати проходження з сертифікатом. Це можна зробити під час проходження в режимі слухача або після нього. Якщо ви не бачите варіанти 'Режим слухача'.</p>
            <p>- Курс може не пропонуватися в режимі слухача. Спробуйте безкоштовну пробну версію або подайте заявку на фінансову допомогу.</p>
            <p>- Курс пропонуватися в режимі 'Повний курс, без сертифіката'. У ньому можна переглядати всі матеріали, виконувати обов'язкові завдання і отримати підсумкову оцінку. Придбати додатково проходження з сертифікатом в такому випадку не можна.</p>
        </div>
    </div>


    </div>
</section>
@endsection
