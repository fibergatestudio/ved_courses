@extends('layouts.front.front')

@section('title')
    Налаштування облікового запису
@endsection

@section('header')
    <header class="header header-narrowStudent">
        <div class="topWhite-layer topWhite-layer-narrowStudent">
            <div class="container">
                @include('layouts.front.includes.header_menu')
            </div>
        </div>
    </header>
@endsection

@section('content')
    <section class="studentSettings">
        <div class="studentSettings-separator">
            <div class="studentSettings-separator_badge"><span>Налаштування облікового запису</span></div>
        </div>
        <div class="container">
        @if(session()->has('message_success'))
            <div class="alert alert-success">
                {{ session()->get('message_success') }}
            </div>
        @endif
        @if(session()->has('message_error'))
            <div class="alert alert-warning">
                {{ session()->get('message_error') }}
            </div>
        @endif
        <form action="{{ route('teacher_information_apply') }}" method="POST" enctype="multipart/form-data" id="form-stud">
            @csrf
            <input type="hidden" name="teacher_id" value="{{ $teacher_info->id }}">
            <div class="studentSettings-grid-top">
                <div class="grid-top_item">
                    <div class="grid-top_name">Ім'я користувача<sup>*</sup></div>
                    <div class="grid-top_example">Приклад: Іванов Іван Іванович</div>
                    <input class="studentSettings-input" type="text" placeholder="Прізвище" name="surname" value="{{ $teacher_info->surname }}" required disabled>
                    <input class="studentSettings-input" type="text" placeholder="Ім'я" name="name" value="{{ $teacher_info->name }}" required disabled>
                    <input class="studentSettings-input" type="text" placeholder="По батькові" name="patronymic" value="{{ $teacher_info->patronymic }}" required disabled>
                </div>
                <div class="grid-top_item">
                    <div class="grid-top_prometheus">Ім’я для ідентифікації на Ved. Ви не зможете змінити ім’я
                        користувача.</div>
                </div>
                <div class="grid-top_item">
                    <div class="grid-top_name">Фото профілю</div>
                    <div class="photo-wrapper">
                        <div class="photo-photo"></div>
                        <div class="photo-text">
                            <p>Файли з розширенням JPG, GIF або PNG. </p>
                            <p>Максимальний розмір - 5 Мб. </p>
                            <a class="photo-btn" href="javascript: void();">
                                <span>Відправити фото</span>
                                <input class="photo-btn_input" type="file" name="photo" onchange="document.getElementById('form-stud').submit();">
                            </a>
                        </div>

                    @if( Auth::user()->getMedia('photos')->last())
                        <style>
                            .photo-photo:before { content: url({{ Auth::user()->getMedia('photos')->last()->getUrl('thumb_medium') }}) !important; }
                            .photo-photo { background: none !important; }
                        </style>
                    @endif
                    </div>
                </div>
                @if (!Auth::user()->provider_id)
                <div class="grid-top_item">
                    <div class="grid-top_name">Поштова скринька<sup>*</sup></div>
                    <input class="studentSettings-input studentSettings-email" type="email" placeholder="mail@gmail.com" name="email" value="{{ $teacher_info->email }}" required>
                </div>
                <div class="grid-top_item">
                    <div class="grid-top_email">Адреса електронної пошти, яку ви використовуєте, щоб увійти на сайт.
                        Повідомлення з Ved і ваших курсів будуть відправлятися на цю адресу.</div>
                </div>
                @endif
            </div>

            @if (!Auth::user()->provider_id)
            <div class="separator settings-separator"></div>
                <div class="studentSettings-grid-middle">
                    <div class="grid-middle_item">
                        <div class="middle-wrapper">
                            <label class="middle-studentSettings_label">Пароль</label>
                            <input class="middle-studentSettings_password" type="password" placeholder="******" name="oldpass" id="oldpass" required>
                        </div>
                        <div class="middle-wrapper">
                            <label class="middle-studentSettings_label">Новий пароль</label>
                            <input class="middle-studentSettings_password" type="password" placeholder="******" name="password" id="password" required>
                        </div>
                        <div class="middle-wrapper">
                            <label class="middle-studentSettings_label">Повторити пароль</label>
                            <input class="middle-studentSettings_password" type="password" placeholder="******" name="password_confirmation" id="password_confirmation" required>
                        </div>
                    </div>
                    <div class="grid-middle_item">
                        <div class="middle-btn_wrapper">
                        <a class="middle-btn" href="javascript: void();" onclick="change_password();"><span>Зберегти</span></a></div>
                    </div>
                </div>
            @endif

            <div class="separator settings-separator"></div>
            <a class="studentSettings-bottom-btn btn-watch--more" href="javascript: void();" onclick="document.getElementById('form-stud').submit();"><span>Зберегти</span></a>
        </form>
        </div>
    </section>

    <script>
        function change_password() {
            var oldpass = document.getElementById('oldpass').value;
            var password = document.getElementById('password').value;
            var password_confirmation = document.getElementById('password_confirmation').value;
            var form = document.createElement('form');
            form.action = '{{ route('teacher_information_change_password') }}';
            form.method = 'POST';
            form.innerHTML = '@csrf<input name="oldpass" value="' + oldpass + '"><input name="password" value="' + password + '"><input name="password_confirmation" value="' + password_confirmation + '">';
            document.body.append(form);
            form.submit();
        }
    </script>
@endsection
