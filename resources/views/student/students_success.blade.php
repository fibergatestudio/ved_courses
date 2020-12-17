@extends('layouts.front.front_child')

@section('content')
@if(session()->has('message_success'))
    <div class="alert alert-success">
        {{ session()->get('message_success') }}
    </div>
@endif
@if(session()->has('message_error'))
    <div class="alert alert-danger">
        {{ session()->get('message_error') }}
    </div>
@endif

<section class="courseControl ss__bgc-change">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container ss__bgc-change">

        	@include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління студентами', 'imgPath' => 'img/teacher-mobileMenu-4.png'])

            <h1 class="ss__main-title">Профіль студента</h1>

            @php
            echo '<pre>'.print_r($student,true).'</pre>';
            @endphp
            <div class="direction ss">
                <div class="container ss__container-resize">
                    <div class="ss__student-datas">
                        <div class="ss__photo-block"></div>
                        <div class="ss__data-block">
                            <p class="student-name">{{ $student->full_name }}</p>
                            <p class="student-state">Студент</p>
                            <p class="students-group-name">Назва курсу та групи</p>
                            <p class="students-email">{{ $student->email }}</p>
                            <p class="students-phone">{{ $student->student_phone_number }}</p>
                        </div>
                    </div>
                    <div class="ss__parent-section">
                        <div class="ss__course-title-wrapper">
                            <h3 class="main-teachers_title ss__block-title" id="anchor_program">Програма курсу: що
                                ви
                                вивчите</h3>
                            <a class="ss__hide-btn-style active">Згорнути все
                            </a>
                        </div>
                        <div class="purple-separator"></div>
                        <div class="toggle-section active">
                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">01</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m"><a
                                                    href="#">Модуль:
                                                    Установка і
                                                    використання
                                                    Python</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">02</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m"><a href="#">Модуль:
                                                Установка і
                                                використання
                                                Python</a>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">03</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m"><a
                                                    href="#">Модуль:
                                                    Установка і
                                                    використання
                                                    Python</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">04</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m"><a
                                                    href="#">Модуль:
                                                    Установка і
                                                    використання
                                                    Python</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ss__parent-section">
                        <div class="ss__course-title-wrapper">
                            <h3 class="main-teachers_title ss__block-title" id="anchor_program">Програма курсу: що
                                ви
                                вивчите</h3>
                            <a class="ss__hide-btn-style" href="##">Переглянути все
                            </a>
                        </div>
                        <div class="purple-separator"></div>
                        <div class="toggle-section hide">
                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">01</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m"><a
                                                    href="#">Модуль:
                                                    Установка і
                                                    використання
                                                    Python</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">02</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m"><a href="#">Модуль:
                                                Установка і
                                                використання
                                                Python</a>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">03</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m"><a
                                                    href="#">Модуль:
                                                    Установка і
                                                    використання
                                                    Python</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">04</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m"><a
                                                    href="#">Модуль:
                                                    Установка і
                                                    використання
                                                    Python</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ss__parent-section">
                        <div class="ss__course-title-wrapper">
                            <h3 class="main-teachers_title ss__block-title" id="anchor_program">Програма курсу: що
                                ви
                                вивчите</h3>
                            <a class="ss__hide-btn-style" href="##">Переглянути все
                            </a>
                        </div>
                        <div class="purple-separator"></div>
                        <div class="toggle-section hide">
                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">01</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m"><a
                                                    href="#">Модуль:
                                                    Установка і
                                                    використання
                                                    Python</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">02</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m"><a href="#">Модуль:
                                                Установка і
                                                використання
                                                Python</a>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">03</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m"><a
                                                    href="#">Модуль:
                                                    Установка і
                                                    використання
                                                    Python</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">04</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m"><a
                                                    href="#">Модуль:
                                                    Установка і
                                                    використання
                                                    Python</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">У цьому модулі ви все налаштуєте так, щоб ви
                                            могли
                                            писати
                                            програми на Python. Ми не вимагаємо установки Python для цього класу. Ви
                                            можете
                                            писати і
                                            тестувати програми на Python в браузері, використовуючи "Python Code
                                            Playground"
                                            в
                                            цьому
                                            уроці. Будь ласка, прочитайте матеріал "Використання Python в цьому класі"
                                            для
                                            деталей.
                                        </div>
                                    </div>
                                    <div class="ss__protocol direction-change">
                                        <a href="##">Протокол </a>
                                        <div class="gray-separator gray-separator_restyle ss__gray-septr"></div>
                                        <p class="program_wwl-protocol ">Теоретичний матеріал</p>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="text-p"><a href="#">Протокол</a>
                                            </p>
                                            <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result hide">Тест
                                                (<span id="correctAnswers">0</span>/<span
                                                    id="totalAnswers">20</span>)&nbsp;
                                                <span id="percentComplete">0%</span>
                                                <br>
                                                Бали за завдання <span id="testScore">0</span>/<span
                                                    id="testScore">20</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ss__test direction-change">
                                        <a href="##">Тест</a>
                                        <div class="gray-separator gray-separator_restyle"></div>
                                        <div class="time-and-reslts">
                                            <div class="time">2 хв.</div>
                                            <div class="wwl__circle-mark"></div>
                                            <div class="description">
                                                <p class="descr descr_rest">
                                                    <a href="#">Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="results ss__results">
                                            <p class="no-result  hide">Немає балів за виконання у цьому розділі</p>
                                            <p class="is-result"><span class="ss__test-decoration">Тест</span>
                                                (<span id="correctAnswers">13.3</span>/<span
                                                    id="totalAnswers">16</span>)&nbsp;
                                                <span id="percentComplete">83%</span>
                                                <br>
                                                <span class="ss__test-decoration">Бали за завдання </span><span
                                                    id="testScore">13.3</span>/<span id="testScore">16</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>




                <div class="ss__change-student-btns">
                    <a class="btn-watch--more ss__back-btn" href="{{ route('students_controll') }}"><span>назад</span></a>
                    <a class="btn-watch ss__next-student-btn" href="##">Наступний студент
                    </a>
                </div>
            </div>



        </div>
        </div>

        </div>


    </section>

@endsection