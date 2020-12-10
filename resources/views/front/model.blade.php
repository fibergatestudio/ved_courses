@extends('layouts.front.front_child')

@section('title')
    3D модель
@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>{{ Str::limit($lesson->course_name, 20) ?? 'Без назви' }}</span></div>
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
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id]) }}"><span>Як це працює</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'video']) }}"><span>Відеолекція</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn active" href="{{ route('view_lesson', [$course->id, $lesson->id, 'model']) }}"><span>3D модель</span></a>
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

        @if(isset($lesson->model3d_link))
            <div class="player_wrapper">
                <iframe src="{{ $lesson->model3d_link }}" class="video-collection_iframe">
                    Ваш браузер не підтримує фрейми.
                </iframe>
            </div>
        @else
            <div class="string-text">
               3D модель відсутня
          </div>
        @endif

    </div>
</section>
@endsection
