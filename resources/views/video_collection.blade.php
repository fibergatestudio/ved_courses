@extends('layouts.front.front_child')

@section('title')
    Відео
@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>???</span></div>
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
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id]) }}"><span>Як це працює</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn active" href="{{ route('view_lesson', [$course->id, $lesson->id, 'video']) }}"><span>Відеолекція</span></a>
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

      <div class="programs-item_video">{{ collect(json_decode($lesson->video_name))->count() }} відео</div>
      <table class="video-collection_table hidden-menu">
        <tbody>
            @forelse (collect(json_decode($lesson->video_name)) as $video_name)
                <tr class="video-collection_string hidden-menu_string">
                    <td class="hidden-menu_column">{{ collect(json_decode($lesson->video_length))->get($loop->index) }} хв.</td>
                    <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                    <td class="hidden-menu_column">{{ $video_name }}
                        (@if (null !== collect(json_decode($lesson->video_file))->get($loop->index))
                            <a href="{{ asset('video_files/'.collect(json_decode($lesson->video_file))->get($loop->index)) }}">Файл</a>
                            @endif
                            @if (null !== collect(json_decode($lesson->video_link))->get($loop->index))
                            <a href="{{ collect(json_decode($lesson->video_link))->get($loop->index) }}">Посилання</a>
                            @endif)
                    </td>
                </tr>
            @empty

            @endforelse
    </tbody>
</table>

<!--<div class="player_wrapper">
    <iframe class="video-collection_iframe"  src="https://www.youtube.com/embed/a0ZG7nhXwiA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<p class="video-collection_text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>-->

    </div>
</section>
@endsection
