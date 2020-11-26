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

        <table class="video-collection_table hidden-menu">
            <tbody>
                @forelse (collect(json_decode($lesson->video_name)) as $video_name)
                <div id="app">
                    <ved-video-player
                        :video-names=@json(json_decode($lesson->video_name))
                        :video-paths=@json(json_decode($lesson->video_file))
                        :video-links=@json(json_decode($lesson->video_link))
                        :video-lengthes=@json(json_decode($lesson->video_length))
                        asset-path={{ asset('video_files') }}
                    ></ved-video-player>
                </div>
                @empty
                <div class="string-text">
                    Відеo відсутні
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
