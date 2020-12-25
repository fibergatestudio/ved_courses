@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])

            <div class="cource-container--mobile">
                <h3 class="courseEdit-title courseControl-title">Поширені запитання</h3>

                <form action="{{ route('edit_question_apply', ['course_id' => $course_info->id ]) }}" id="add_question_form" method="POST" >
                    @csrf

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">Створити питання - відповідь</div>
                        <div class="courseAdd-wrapper no-padding-bottom">
                            <input type="hidden" id="questions_counter" name="questions_counter" value="{{ count($faq_info) }}">
                            <div id="app1">
                                <div v-for="(id,index) in ids" >
                                    <div v-if="index === 0">

                                    </div>
                                    <div v-else>
                                        <input type="hidden" :id="'qa_id'+index" :name="'qa_id'+index" value="">
                                        <div class="courseAdd-inner courseAdd-inner_margbottom">
                                            <div class="courseAdd-inner_left">
                                                <div class="courseAdd_left--name">Питання @{{ index }}<sup>*</sup></div>
                                            </div>
                                            <div class="courseAdd-inner_right">
                                                <input class="course-faq--input courseAdditional--input" :id="'course_question'+index" :name="'course_question'+index" type="text">
                                            </div>
                                        </div>

                                        <div class="courseAdd-inner courseAdd-inner_margbottom">
                                            <div class="courseAdd-inner_left">
                                                <div class="courseAdd_left--name">Відповідь<sup>*</sup></div>
                                            </div>
                                            <div class="courseAdd-inner_right">
                                                    <textarea class="tinyMCE-area" :id="'question_text'+index" :name="'course_answer'+index"></textarea>
                                            </div>
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
            </div>
        </div>
    </section>
@endsection

 

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        $( document ).ready(function() {
            var q_count = $('#questions_counter').val();
            var i;

            const faqQuArr = [];
            const faqAnArr = [];
            const faqIdArr = [];

            @foreach($faq_info as $faq_q)
                faqQuArr.push('{!! $faq_q->course_question !!}');
                faqAnArr.push('{!! $faq_q->course_answer !!}');
                faqIdArr.push('{!! $faq_q->id !!}');
            @endforeach


            for (i = 0; i < q_count; i++) {
                app1.addNewEntryWithText(faqQuArr[i], faqAnArr[i], faqIdArr[i]);
            }

        });
    </script>

    <script>
        var currentCounter = 1;
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
                    var id_t = '#question_text' + (currentCounter);

                    setTimeout(function(){  tinymce.init({ 
                        selector: id_t,
                        menubar: false,
                            placeholder: "memes",
                            plugins: [
                                'advlist autolink lists link image charmap print preview anchor',
                                'searchreplace visualblocks code fullscreen',
                                'insertdatetime media table paste code help wordcount'
                            ],
                            toolbar:
                                'bold italic backcolor | alignleft aligncenter ' +
                                'alignright alignjustify | bullist numlist | ' +
                                'insertfile link image media pageembed template ' ,
                            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }', }); }, 100);

                    currentCounter = currentCounter + 1;
                    this.ids.push({id: currentCounter});
                    document.getElementById("counter").value = currentCounter;


                },
                addNewEntryWithText(question, answer, id){
                    var question_id = '#course_question' + currentCounter;
                    var answer_id = '#question_text' + currentCounter;
                    var qa_id = '#qa_id' + currentCounter;

                    setTimeout(function(){ 
                        $(question_id).val(question);
                        $(qa_id).val(id);
                        tinymce.init({  
                            selector: answer_id,
                            menubar: false,
                            placeholder: "memes",
                            plugins: [
                                'advlist autolink lists link image charmap print preview anchor',
                                'searchreplace visualblocks code fullscreen',
                                'insertdatetime media table paste code help wordcount'
                            ],
                            toolbar:
                                'bold italic backcolor | alignleft aligncenter ' +
                                'alignright alignjustify | bullist numlist | ' +
                                'insertfile link image media pageembed template ' ,
                            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
                            setup: function (editor) {
                                editor.on('init', function () {
                                    editor.setContent(answer);
                                    tinymce.triggerSave();
                                })
                            }, 
                        });

                    }, 100);

                    currentCounter = currentCounter + 1;
                    this.ids.push({id: currentCounter});
                    $('#questions_counter').val(currentCounter);
                }
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
@endsection
