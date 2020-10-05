@extends('layouts.app')

@section('content')
<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/> -->
<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-3">
            @if(Auth::user()->role == "admin")
                @include('layouts.admin_sidebar')
            @elseif(Auth::user()->role == "teacher")
               @include('layouts.teacher_sidebar', ['status' => Auth::user()->status] )
            @elseif(Auth::user()->role == "student")
                @include('layouts.student_sidebar')
            @endif
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><div class="row">{{ __('Просмотр теста') }} № {{ $test_info->id }} | Просмотров: {{ $test_info->views }} | Пройдено: {{ $test_info->finished_count }}</div></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="mainform" action="{{ route('test_submit', ['test_id' => $test_info->id]) }}" method="POST">
                    @csrf
                    <!-- <?php $i = 1; ?>
                    @foreach($test_qa as $question)
                    <div class="row col-md-12 pb-5">
                            <div class="col-md-7">
                                <div class="col-sm">

                                    <input type="hidden" id="true_answer{{ $question->id }}" name="answer{{ $question->id }}" value="">

                                    <div style="display: inline;">
                                        <p style="display: inline;">{{ $i }}. {{ $question->question }}</p>
                                        <div id="answer{{ $question->id }}" class="test-text-style"></div>
                                        <p style="display: inline;">{{ $question->question_end }}. </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-5">
                                <p>Ответы на {{ $i }}й вопрос </p>
                                <div id="answers{{ $question->id }}" class="list-group">
                                    @foreach($question->answer as $answer)
                                        <div class="list-group-item" data-val>
                                            <input type="hidden" name="answers[]" value="<?php echo $answer; ?>">
                                            {{ $answer }} 
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                    </div>
                    <script type="text/javascript">

                    $(document).ready(function(){
                        $('#true_answer0').val('any value');
                    });
                    </script>
                    <script>
                        //
                        //
                        var id = {{ json_encode($question->id) }};
                        var answer = 'answer' + id;
                        var answers = 'answers' + id;

                        var answers_el = document.getElementById(answers);
                        var sortable = Sortable.create(answers_el, {
                        group: {
                            name: answers,
                            put: answer,
                            pull: function (to, from) {
                                if(to.el.children.length = 0){
                                    return;
                                } 
                            }
                        },
                        animation: 100
                        });

                        var answer_el = document.getElementById(answer);
                        Sortable.create(answer_el, {
                        group: {
                            name: answer,
                            //put: answers,
                            put: function(to, from){
                                //console.log("FROM: " + from.el.id + "TO: " + to.el.id);
                                var from_id = from.el.id.replace(/\D+/g, '');
                                var to_id = to.el.id.replace(/\D+/g, '');
                                if(from_id == to_id){

                                    var true_answer = '#true_answer' + to_id;
                                    $(true_answer).val("test");

                                    console.log(to.el);
                                    return to.el.children.length < 1;
                                }
                            }
                        },
                        animation: 100
                        });


                    </script>
                    <?php $i++; ?>
                    @endforeach -->

                    <?php $n = 1; ?>
                    <?php $q = 1; ?>
                    <script>

                    var testresponse = []; 
                        
                    </script>

                    <div class="row col-md-12 pb-5">
                    @foreach($test_qa as $question)
                        
                                <input type="hidden" id="true_answer{{ $question->id }}" name="answer{{ $question->id }}" value="">
                                <p style="display: inline;">{{ $question->question }}</p>
                                <div id="answer{{ $question->id }}" class="test-text-style text-center"></div>
                                <p style="display: inline;">{{ $question->question_end }}. </p>

                        <!-- <div class="col-md-5"></div> -->
                    <?php $q++; ?>
                    @endforeach
                    @foreach($test_qa as $question)
                            <div class="col-md-7"></div>
                            <div class="col-md-5">
                                <p>Ответы на {{ $n }}й вопрос </p>
                                <div id="answers{{ $question->id }}" class="row">
                                    @foreach($question->answer as $answer)
                                        <div style="background-color: bisque;" class="col-md p-0">
                                            <input type="hidden" name="answers[]" value="<?php echo $answer; ?>">
                                            {{ $answer }} 
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                    <?php $n++; ?>

                    <script>
                        //
                        //
                        var id = {{ json_encode($question->id) }};
                        var answer = 'answer' + id;
                        var answers = 'answers' + id;

                        var answers_el = document.getElementById(answers);
                        var sortable = Sortable.create(answers_el, {
                        group: {
                            name: answers,
                            put: answer,
                            pull: function (to, from) {
                                if(to.el.children.length = 0){
                                    return;
                                } 
                            }
                        },
                        animation: 100
                        });

                        var answer_el = document.getElementById(answer);
                        Sortable.create(answer_el, {
                        group: {
                            name: answer,
                            //put: answers,
                            put: function(to, from){
                                //console.log("FROM: " + from.el.id + "TO: " + to.el.id);
                                var from_id = from.el.id.replace(/\D+/g, '');
                                var to_id = to.el.id.replace(/\D+/g, '');
                                if(from_id == to_id){

                                    var true_answer = '#true_answer' + to_id;
                                    $(true_answer).val("test");

                                    console.log(to.el);
                                    return to.el.children.length < 1;
                                }
                            }
                        },
                        animation: 100
                        });


                    </script>
                    
                    <script>

                    var id = {{ json_encode($question->id) }};
                    var answer = 'answer' + id;
                    testresponse.push(answer);

                    //var ttasnwer = '#answer' + id + ':not(:empty)';

                    </script>
                    @endforeach
                    </div>

                        <button type="submit" class="btn btn-success">Отправить</button>
                    </form>
                    
                    <a href="{{ route('tests_controll') }}">
                            <button class="btn btn-danger">Назад</button>
                        </a>

                </div>
            </div>
        </div>
    </div>
    </div>


<div class="container">
    <div class="row justify-content-center">
        <!-- <div id="A" class="list-group">
            <div class="list-group-item">foo</div>
            <div class="list-group-item">bar</div>
            <div class="list-group-item">baz</div>
        </div>
        
        
        <div id="B" class="list-group">
            <div class="list-group-item">qux</div>
            <div class="list-group-item">quux</div>
        </div> -->
    </div>
</div>
@section('scripts')
<!-- Latest Sortable -->
<!-- <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script> -->


<script>

    var ttasnwer = '#answer' + id + ':not(:empty)';

    //  Bind the event handler to the "submit" JavaScript event
    $('#mainform').submit(function (event) {

    console.log( testresponse );

        $.each(testresponse, function(index){

            var nameid = '#answer' + index + ':not(:empty)';
            console.log("INDEX: " + nameid );
            var completename = $(nameid).length;
            console.log(completename);

            if(completename === 0){
                event.preventDefault(); 
                alert('Выбраны не все ответы!');
                console.log("Has empty field")
                return false;
            }
        });

    });

</script>


@endsection

@endsection
