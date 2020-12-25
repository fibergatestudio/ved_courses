@extends('layouts.front.front_child')

@section('title')
    Як це працює
@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>{{ $lesson->course_name ?? 'Без назви' }}</span></div>
    </div>
    <div class="container">

        <ul class="breadcrumbs_list">
            <li class="breadcrumbs_item">
                <a href="{{ route('main') }}" class="breadcrumbs_link">Головна</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ route('view_course', $course->id) }}" class="breadcrumbs_link">{{ $course->name }}</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ route('view_lesson', [$course->id, $lesson->id]) }}" class="breadcrumbs_link breadcrumbs_active">{{ $lesson->course_name ?? 'Без назви' }}</a>
            </li>

        </ul>

        <div class="string-menu_wrapper">
            <div class="string-menu_inner">
                <a class="string-menu_btn active" href="{{ route('view_lesson', [$course->id, $lesson->id]) }}"><span>Як це працює</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'video']) }}"><span>Відеолекція</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'model']) }}"><span>3D модель</span></a>
            </div>
            @if (isset($lesson->show_protocol) && $lesson->show_protocol == 1)
                <div class="string-menu_inner">
                    <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'protocol']) }}"><span>Протокол</span></a>
                </div>
            @endif
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'test']) }}"><span>Завдання</span></a>
            </div>

            @include('layouts.front.includes.nextprevlesson')

        </div>


        <div class="string-text">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }} 
            </div>
            @endif
            @if (session('test_results'))
                <div class="bootstrap-restylingStudent modal fade" id="showResultModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog_restyle">
                        <div class="modal-content">
                            <div class="deleteMenu-wrapper">

                                <div class="deleteMenu-topImg ge_deleteImg">
                                    <img src="/img/writing.png" alt="icon">
                                </div>
                                <div class="deleteMenu-text">
                                    Результати тесту.
                                    <?php $results = json_decode(session('test_results')); ?>
                                        Ваша оцінка {{ $results->final_score }} балів. У вас є ще {{ $results->tries_left}} спроб.
                                </div>
                                <div class="deleteMenu-btn">
                                    <a class="flexTable-btn_delete" href="##"
                                        id="discardGroupNameChanges" data-dismiss="modal"><span>Закрити</span></a>
                                </div>
                            </div>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                <script type="text/javascript">
                    $(window).on('load',function(){
                        $('#showResultModal').modal('show');
                    });
                </script>
            @endif
        {!! $lesson->course_description ?? 'Немає опису' !!}

      </div>
    </div>
</section>
@endsection
