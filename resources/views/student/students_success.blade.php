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

            <div class="direction ss">
                <div class="container ss__container-resize">
                    <div class="ss__student-datas">
                        <div class="ss__photo-block"></div>
                        <div class="ss__data-block">
                            <p class="student-name">{{ $student->full_name }}</p>
                            <p class="student-state">Студент</p>
                            <p class="students-group-name">{{ ($student->course_number)?$student->course_number:'Назва курсу та групи' }}. {{ ($student->group_number)?$student->group_number:'' }}</p>
                            <p class="students-email">{{ $student->email }}</p>
                            <p class="students-phone">{{ ($student->student_phone_number)?$student->student_phone_number:'Не надано' }}</p>
                        </div>
                    </div>

                    @if(count((array)$course_lessons) && $lesson_count)

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

                            @foreach($course_lessons as $lesson)

                            {{--<div class="courseEdit-block">

                                <div class="courseEdit-grid_wrapper">
                                    <div class="courseEdit-grid_item">
                                        <div class="programs-item_lesson--number">0{{ $course_num }}</div>
                                        <div class="programs-item_lesson--text">Заняття {{ $course_num }}</div>
                                    </div>
                                    <div class="courseEdit-grid_item">
                                        <div class="courseEdit-item_chapter programs-item_chapter">{{ strip_tags($lesson->course_name) }}
                                            <picture>
                                                <source srcset="/img/pencil-edit-small.png" media="(max-width:592px)">
                                                    <a href="{{ route('edit_lesson', ['course_id' => $course_info->id , 'lesson_id' =>$lesson->id ]) }}"><img class="courseEdit-item_image" src="/img/pencil-edit.png" alt="pencil-image"></a>
                                                </picture>
                                            </div>

                                        </div>
                                        <div class="courseEdit-grid_item">
                                            <?php $clear_descr = str_replace("&nbsp;", '', $lesson->course_description); ?>
                                            <div class="programs-item_text">{{ strip_tags($clear_descr) }}</div>
                                        </div>
                                        <div class="courseEdit-grid_item">
                                            <div class="programs-item_hours"><a href="##">{{ $lesson->learning_time }} години на завершення</a> </div>
                                        </div>
                                        <div class="courseEdit-grid_item">

                                            <div class="courseEdit-item_faq courseEdit-item_button">
                                                <a href="##">Як це працює</a>
                                            </div>
                                            <div class="courseEdit-hidden">
                                                <div class="courseEdit-underline"></div>
                                                {{ $lesson->course_description }}

                                            </table>
                                        </div>

                                        <div class="courseEdit-item_book courseEdit-item_button">
                                            <a href="##">Протокол</a>
                                        </div>
                                        <div class="courseEdit-hidden">
                                            <div class="courseEdit-underline"></div>
                                            @if($lesson->show_protocol == 1)
                                            Є протокол
                                            @else
                                            Нема протоколу
                                            @endif

                                        </div>

                                        <div class="courseEdit-item_video courseEdit-item_button">
                                            <a href="##">Відеолекція</a>
                                        </div>
                                        <div class="courseEdit-hidden">
                                            <div class="courseEdit-underline"></div>
                                            <div class="courseEdit_video">{{ $lesson->video_count }} відео</div>

                                            <table class="hidden-menu">
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="courseEdit-item_test courseEdit-item_button">
                                            @if(isset($lesson->test_id))
                                            <a href="{{ route('view_test_info_questions', ['test_info_id' => $lesson->test_id ]) }}">Тест
                                                <img class="courseEdit-item_image" src="/img/pencil-edit-small.png" alt="pencil-image">
                                            </a>
                                            @endif
                                        </div>
                                        <div class="courseEdit-hidden">
                                            <div class="courseEdit-underline"></div>
                                            <table class="hidden-menu">
                                                <tbody >
                                                    <tr class="hidden-menu_string">
                                                        <td class="courseEdit-hidden_column hidden-menu_column">20 хв.</td>
                                                        <td class="courseEdit-hidden_column hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                                                        <td class="courseEdit-hidden_column hidden-menu_column"> <a href="##">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>--}}

                            <div class="main-programs">
                                <div class="ss__grid_wrapper">
                                    <div class="ss__grid_item">
                                        <div class="programs-item_lesson--number program-wwl_mr-50">{{ sprintf("%02d", $loop->iteration) }}</div>
                                        <div class="programs-item_lesson--text">Заняття</div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_chapter programs-item_chapter-m">
                                            <div class="programs-item_chapter programs-item_chapter-m">
                                                <a href="{{ route('view_lesson', [$course_info->id, $lesson->id]) }}">{{ $lesson->course_name ?? 'Без назви' }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss__grid_item">
                                        <div class="programs-item_text">
                                            {!! $lesson->course_description !!}
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

                                                @if ($course_protocols[$loop->index])
                                                <p class="text-p">
                                                    <a href="{{ route('protocol.show', ['course_id' => $course_info->id, 'lesson_id' => $lesson->id, 'user_id' => auth()->user()->id]) }}">Протокол</a>
                                                    @if ($course_protocols[$loop->index]->raiting)
                                                    <p class="is-result">
                                                        <span class="ss__test-decoration">Бали за протокол</span>
                                                        <span>{{$course_protocols[$loop->index]->raiting}}</span>
                                                    </p>
                                                    @else
                                                        <p class="no-result">Немає балів за виконання у цьому розділі</p>
                                                    @endif
                                                </p>
                                                @else
                                                    <p>Протокол в уроці відсутній</p>
                                                @endif

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

                            @endforeach
                        </div>
                    </div>
                    @else
                        <div class="ss__parent-section">
                            <h3 class="main-teachers_title ss__block-title" id="anchor_program">Програма курсу відсутня</h3>
                        </div>
                        {{--<div class="ss__parent-section">
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
                    </div>--}}
                    @endif



                </div>


                <div class="ss__change-student-btns">
                    <a class="btn-watch--more ss__back-btn" href="{{ route('students_controll') }}"><span>назад</span></a>
                    <a class="btn-watch ss__next-student-btn" href="{{ route('students_success',['student_id' => $next_student ]) }}">Наступний студент
                    </a>
                </div>
            </div>



        </div>
        </div>

        </div>


    </section>

@endsection
