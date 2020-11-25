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

        @if (collect(json_decode($lesson->video_name))->count() > 0)
        <div class="programs-item_video">

            {{ collect(json_decode($lesson->video_name))->count() }} відео

        </div>
        @endif
        <table class="video-collection_table hidden-menu">
            <tbody>
                @forelse (collect(json_decode($lesson->video_name)) as $video_name)
                <tr class="video-collection_string hidden-menu_string">
                    <td class="hidden-menu_column">
                        @if (null !== collect(json_decode($lesson->video_length))->get($loop->index))
                        {{ collect(json_decode($lesson->video_length))->get($loop->index) }} хв.
                        @endif
                    </td>
                    <td class="hidden-menu_column">
                        <div class="hidden-menu_dot"></div>
                    </td>
                    <td class="hidden-menu_column">{{ $video_name }}
                        (@if (null !== collect(json_decode($lesson->video_file))->get($loop->index))
                        <a
                            href="{{ asset('video_files/'.collect(json_decode($lesson->video_file))->get($loop->index)) }}">Файл</a>
                        @endif
                        @if (null !== collect(json_decode($lesson->video_link))->get($loop->index))
                        <a href="{{ collect(json_decode($lesson->video_link))->get($loop->index) }}">Посилання</a>
                        @endif)
                    </td>
                </tr>
                @empty
                <div class="string-text">
                    Відеo відсутні
                </div>
                @endforelse
            </tbody>
        </table>
    <ved-video-player video-names="{{ $lesson->video_name }}" video-paths="{{ $lesson->video_file }}"></ved-video-player>
    </div>
</section>
@endsection
