@extends('layouts.front.front_child')

@section('title')
    Викладачі
@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>{{ $course->name }}</span></div>
    </div>
    <div class="container">
        <!--<a class="breadcrumbs" href="#">Головна сторінка / Курс назва</a>-->
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
            <div class="main-menu_inner active">
                <a class="main-menu_btn" href="{{ route('view_course', [$course->id, 'teachers']) }}"><span>Викладачі</span></a>
            </div>
            <div class="main-menu_inner">
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

        <div class="main-teachers">
            <h3 class="main-teachers_title" id="anchor_teachers">Викладачі</h3>
            @forelse ($course_teachers as $teacher)
            <div class="teachers-grid_wrapper mb-2">
                <div class="teachers-grid_item">
                    <div class="teachers-item_photo">
                    </div>
                </div>
                <div class="teachers-grid_item">
                    <div class="teachers-item_name">{{ $teacher->surname }} {{ $teacher->name }} {{ $teacher->patronymic }}</div>
                    <div class="teachers-item_position">Професор наук ???</div>
                    <div class="teachers-item_students"><span>???</span> &nbspучнів</div>
                    <div class="teachers-item_course"><span>??</span> &nbspкурсів</div>
                </div>
                <div class="teachers-grid_item">
                    <div class="teachers-item_text">
                        ???
                    </div>
                </div>
            </div>
            @empty

            @endforelse

        </div>



    </div>
</section>
@endsection
