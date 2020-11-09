@extends('layouts.front.front_child')

@section('title')
    Як це працює
@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>Глава шоста: Струни</span></div>
    </div>
    <div class="container">

        <ul class="breadcrumbs_list">
            <li class="breadcrumbs_item">
                <a href="{{ route('home') }}" class="breadcrumbs_link">Головна</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ route('view_course', $course->id) }}" class="breadcrumbs_link">{{ $course->name }}</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ route('view_lesson', [$course->id, $lesson->id]) }}" class="breadcrumbs_link breadcrumbs_active">Заняття {{ $lessonNumber }}</a>
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
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'protocol']) }}"><span>Протокол</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'test']) }}"><span>Тест</span></a>
            </div>

            @if ($prevLesson)
                <a class="control_btn-prev" href="{{ route('view_lesson', [$course->id, $prevLesson->id]) }}"><span></span></a>
            @else
                <a class="control_btn-prev disable" href="#"><span></span></a>
            @endif

            @if ($nextLesson)
                <a class="control_btn-next" href="{{ route('view_lesson', [$course->id, $nextLesson->id]) }}"><span></span></a>
            @else
                <a class="control_btn-next disable" href="#"><span></span></a>
            @endif

        </div>

        <div class="string-text">
        {!! $lesson->course_description !!}
      </div>
    </div>
</section>
@endsection
