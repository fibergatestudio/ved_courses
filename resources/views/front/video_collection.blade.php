@extends('layouts.front.front_child')

@section('title')
Відео
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
                <a href="{{ route('view_lesson', [$course->id, $lesson->id]) }}"
                    class="breadcrumbs_link breadcrumbs_active">{{ $lesson->course_name ?? 'Без назви' }}</a>
            </li>

        </ul>

        <div class="string-menu_wrapper">
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id]) }}"><span>Як це
                        працює</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn active"
                    href="{{ route('view_lesson', [$course->id, $lesson->id, 'video']) }}"><span>Відеолекція</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn"
                    href="{{ route('view_lesson', [$course->id, $lesson->id, 'model']) }}"><span>3D модель</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn"
                    href="{{ route('view_lesson', [$course->id, $lesson->id, 'protocol']) }}"><span>Протокол</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn"
                    href="{{ route('view_lesson', [$course->id, $lesson->id, 'test']) }}"><span>Тест</span></a>
            </div>

            @include('layouts.front.includes.nextprevlesson')

        </div>

        @php
        $video_names = json_encode(json_decode($lesson->video_name));
        $video_files = json_encode(json_decode($lesson->video_file));
        $video_links = json_encode(json_decode($lesson->video_link));
        $video_lengthes = json_encode(json_decode($lesson->video_length));
        @endphp

        <table class="video-collection_table hidden-menu">
            <tbody>
                @if (null !== collect(json_decode($lesson->video_name)))
                    <div id="app">
                    <ved-video-player
                        :video-names="{{$video_names}}"
                        :video-paths="{{$video_files}}"
                        :video-links="{{$video_links}}"
                        :video-lengthes="{{$video_lengthes}}"
                        asset-path="{{ asset('/video_files') }}"
                        >
                    </ved-video-player>
                </div>
                @else
                <div class="string-text">
                    Відеo відсутні
                </div>
                @endif
            </tbody>
        </table>
    </div>
</section>
@endsection
