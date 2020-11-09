@extends('layouts.front.front_child')

@section('title')
    Обліковий запис
@endsection

@section('content')
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
@endsection
