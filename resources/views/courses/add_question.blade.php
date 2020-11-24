@extends('layouts.front.front_child')

@section('content')
<div class="container" style="display:none;">
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-3">
            @if(Auth::user()->role == "admin")
                @include('layouts.admin_sidebar')
            @elseif(Auth::user()->role == "teacher")
               @include('layouts.teacher_sidebar', ['status' => Auth::user()->status] )
            @endif
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Добавить вопросы') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('add_question_apply', ['course_id' => $course_info->id ]) }}" id="test_form" method="POST" >
                        @csrf
                        <input type="hidden" id="counter2" name="questions_counter2" value="">
                        <div id="app2">
                            <div v-for="(id,index) in ids" >
                                <div class="form-group">
                                    <label>Вопрос @{{ index + 1}}</label>
                                    <input type="text" class="form-control" :name="'course_question'+index" value="">
                                </div>

                                <div class="form-group">
                                    <label>Ответ</label>
                                    <textarea :id="'question_text'+index" class="question_text" :name="'course_answer'+index"></textarea>
                                </div>
                                <!-- <input type="hidden" :id="'answer_counter'+index" :name="'answer_counter'+index" value="0"> -->
                            </div>
                            <div onclick="app2.addNewEntry()" class="btn btn-success">Добавить Вопрос</div>
                        </div>

                        <button type="submit" class="btn btn-success">Применить</button>
                    </form>

                        <a href="{{ route('courses_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>


<body>

    {{-- <!-- Burger-menu (begin)-->
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


    <!-- deleteBtn modal-page (end) --> --}}
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            <!-- sidebar-menu (start) -->

            {{-- <div class="sidebar">

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

                    </div> --}}

                    @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])

                {{-- </div>

            </div> --}}
            <!-- sidebar-menu (end) -->

            <div class="cource-container--mobile">
                <h3 class="courseEdit-title courseControl-title">Поширені запитання</h3>

                <form action="{{ route('add_question_apply', ['course_id' => $course_info->id ]) }}" id="add_question_form" method="POST" >
                    @csrf

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">
                            Створити питання - відповідь
                        </div>
                        <div class="courseAdd-wrapper no-padding-bottom">
                            <input type="hidden" id="counter" name="questions_counter" value="">
                            <div id="app1">
                                <div v-for="(id,index) in ids" >
                                    <div class="courseAdd-inner courseAdd-inner_margbottom">
                                        <div class="courseAdd-inner_left">
                                            <div class="courseAdd_left--name">
                                                Питання @{{ index + 1}} <sup>*</sup>
                                            </div>
                                        </div>
                                        <div class="courseAdd-inner_right">
                                            <input class="course-faq--input courseAdditional--input" :name="'course_question'+index" type="text">
                                        </div>
                                    </div>

                                    <div class="courseAdd-inner courseAdd-inner_margbottom">
                                        <div class="courseAdd-inner_left">
                                            <div class="courseAdd_left--name">
                                                Відповідь<sup>*</sup>
                                            </div>
                                        </div>
                                        <div class="courseAdd-inner_right">
                                                <textarea class="tinyMCE-area" :id="'question_text'+index" :name="'course_answer'+index"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="courseEdit-btn_wrapper">
                                <a href="##" class="courseEdit-btn courseEdit-btn-add" onclick="app1.addNewEntry()">
                                    <span>Додати питання</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="courseEdit-btn-watch_wrapper">
                        <a onclick="document.getElementById('add_question_form').submit();" class="courseEdit-btn-watch btn-watch--more courseAdd-btn"><span style="color:white;">Зберегти</span></a>
                    </div>

                </form>

    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        var currentCounter = 0;
        var app1 = new Vue({
            el: '#app1',
            data: {
                ids: [
                    { id: currentCounter},
                ],
                answers: [
                ],
            },
            methods: {
                addNewEntry: function(){
                    currentCounter = currentCounter + 1;
                    var id_t = '#question_text' + (currentCounter);

                    setTimeout(function(){  tinymce.init({ selector: id_t }); }, 100);

                    this.ids.push({id: currentCounter});
                    document.getElementById("counter").value = currentCounter;


                },
            }
        });
    </script>
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

</body>


@section('scripts')



@endsection


@endsection
