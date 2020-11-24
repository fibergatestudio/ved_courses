<div class="bootstrap-restylingQuestionType modal fade" id="questionType" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="questionType-top"> <span>Виберіть тип питання</span> </div>
                <div class="questionType-wrapper">
                    <form action="{{ route('question_type_submit',['test_info_id' => $test_info_id]) }}" id="course_type" method="POST" >
                        @csrf
                            <input type="hidden" id="question_type" name="question_type" value="">
                            <div class="questionType-inner">
                                <div id="multiply_choice" class="questionType-inner_left questionType-js">
                                    <div class="questionType-inner_left--dot">
                                        <div class="questionType-menu_dot">
                                        </div>
                                    </div>
                                    <div class="questionType-inner_left--icon">
                                        <img src="/img/choice-1.png" alt="icon">
                                    </div>
                                    <div class="questionType-inner_left--title">Множинний вибір</div>
                                </div>
                                <div class="questionType-inner_right show">Дозволяє вибирати одну або декілька відповідей з заданого списку.</div>
                            </div>

                            <div class="questionType-inner">
                                <div id="true_false" class="questionType-inner_left questionType-js active">
                                    <div class="questionType-inner_left--dot">
                                        <div class="questionType-menu_dot">
                                        </div>
                                    </div>
                                    <div class="questionType-inner_left--icon">
                                        <img src="/img/choice-2.png" alt="icon">
                                    </div>
                                    <div class="questionType-inner_left--title">Правильно/неправильно</div>
                                </div>
                                <div class="questionType-inner_right show">Проста форма з множинним вибором тільки з двома варіантами вибору "Правильно" і "Неправильно".</div>
                            </div>

                            <div class="questionType-inner">
                                <div id="drag_drop" class="questionType-inner_left questionType-js">
                                    <div class="questionType-inner_left--dot">
                                        <div class="questionType-menu_dot">
                                        </div>
                                    </div>
                                    <div class="questionType-inner_left--icon">
                                        <img src="/img/choice-3.png" alt="icon">
                                    </div>
                                    <div class="questionType-inner_left--title">Перетягування в тексті</div>
                                </div>
                                <div class="questionType-inner_right">Пропущені слова в тексті заповнюються перетягуванням правильних значень з доступних варіантів.</div>
                            </div>

                            <div class="questionType-innerFalse">
                                <div class="questionType-innerFalse_left"></div>
                                <div class="questionType-innerFalse_right">
                                    <a href="##" class="questionType-btn-add" onclick="document.getElementById('course_type').submit();"><span>Додати</span></a> 
                                    <a href="##" data-dismiss="modal" class="questionType-btn-delete"><span>Скасувати</span></a>
                                </div>
                            </div>
                    </form>
                </div>
             
            </div>
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>


    $( document ).ready(function() {
        //console.log( "ready!" );
        $('#question_type').val("Правильно/неправильно");
    });

    $( "#multiply_choice" ).click(function() {
        //alert( "Handler for .click() called." );
        $('#question_type').val("Множинний вибір");
    });
    $( "#true_false" ).click(function() {
        //alert( "Handler for .click() called." );
        $('#question_type').val("Правильно/неправильно");
    });
    $( "#drag_drop" ).click(function() {
        //alert( "Handler for .click() called." );
        $('#question_type').val("Перетягування в тексті");
    });


</script>