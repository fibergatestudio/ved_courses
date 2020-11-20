@extends('layouts.front.front_child')

@section('title')
    Програма курсу
@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>{{ $course->name }}</span></div>
    </div>
    <div class="container">
        <!--<a class="breadcrumbs" href="#">Головна сторінка / Курс назва</a> -->
        <ul class="breadcrumbs_list">
            <li class="breadcrumbs_item">
                <a href="{{route('main')}}" class="breadcrumbs_link">Головна</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ route('view_course', $course->id) }}" class="breadcrumbs_link">{{ $course->name }}</a>
            </li>
        </ul>

        <div class="main-menu">
            <div class="main-menu_inner">
                <a class="main-menu_btn" href="{{ route('view_course', $course->id) }}"><span>Про курс</span></a>
            </div>
            <div class="main-menu_inner ">
                <a class="main-menu_btn" href="{{ route('view_course', [$course->id, 'teachers']) }}"><span>Викладачі</span></a>
            </div>
            <div class="main-menu_inner active">
                <a class="main-menu_btn" href="{{ route('view_course', [$course->id, 'program']) }}"><span>Програма курсу</span></a>
            </div>
            <div class="main-menu_inner">
                <a class="main-menu_btn" href="{{ route('view_course', [$course->id, 'faq']) }}"><span>Поширені запитання</span></a>
            </div>
            <div class="main-menu_inner">
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/facebook.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/instagram.png') }}" alt="img"></a></div>
                <div class="main-menu_social"><a href="##"><img src="{{ asset('img/linkedin.png') }}" alt="img"></a></div>
            </div>
        </div>

        <div class="main-programs">
            <h3 class="main-teachers_title" id="anchor_program">Програма курсу: що ви вивчите</h3>
            @forelse ($course_lessons as $lesson)
            <div class="programs-grid_wrapper">
                <div class="programs-grid_item">
                    <div class="programs-item_lesson--number">{{ sprintf("%02d", $loop->iteration) }}</div>
                    <div class="programs-item_lesson--text">Заняття</div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_chapter">
                        <a href="{{ route('view_lesson', [$course->id, $lesson->id]) }}">{{ $lesson->course_name ?? 'Без назви' }}</a>
                    </div>
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_text">{!! $lesson->course_description !!}</div>
                </div>
                <div class="programs-grid_item">
                    @isset($lesson->learning_time)
                        <div class="programs-item_hours"><span>{{ $lesson->learning_time }} годин на завершення</span></div>
                    @endisset
                </div>
                <div class="programs-grid_item">
                    <div class="programs-item_video"><a href="##">{{ collect(json_decode($lesson->video_name))->count() }} відео, {{ collect(json_decode($lesson->add_document))->count() }} матеріалів для самостійного вивчення, {{ collect(json_decode($lesson->test_id))->whereNotNull()->count() }} тести</a></div>

                </div>
                <div class="programs-grid_item">
                    <a class="programs-item_btn btn-watch" href="##"><span class="btn-watch_inner">переглянути все</span></a>
                </div>
                <div class="programs-grid_item hidden_item ">
                    <div class="gray-separator"></div>
                    <div class="programs-item_video">{{ collect(json_decode($lesson->video_name))->count() }} відео</div>
                    <table class="hidden-menu">
                        @forelse (collect(json_decode($lesson->video_name)) as $video_name)
                            <tr class="hidden-menu_string">
                                @if(null !== collect(json_decode($lesson->video_length))->get($loop->index)))
                                <td class="hidden-menu_column">
                                    {{ collect(json_decode($lesson->video_length))->get($loop->index) }} хв.
                                </td>
                                @endif
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
                    </table>
                    <div class="gray-separator"></div>
                    <div class="programs-item_book">{{ collect(json_decode($lesson->add_document))->count() }} матеріалів для самостійного вивчення</div>
                    <table class="hidden-menu">
                        @forelse (collect(json_decode($lesson->add_document)) as $document)
                        <tr class="hidden-menu_string">
                            <td class="hidden-menu_column"></td>
                            <td class="hidden-menu_column"><div class="hidden-menu_dot"></div></td>
                            <td class="hidden-menu_column"> <a href="{{ asset('docs/').'/'.$document }}">Документ №{{ $loop->iteration }}</a></td>
                        </tr>
                        @empty

                        @endforelse
                    </table>
                    <div class="gray-separator"></div>
                </div>
            </div>
            @empty
            <div class="main-textblock">
                Немає даних про програму курсу
                </div>
            @endforelse
            <!--<a class="btn-watch--more" href="##"><span>Переглянути більше</span></a>-->
            </div>



    </div>
</section>
@endsection
