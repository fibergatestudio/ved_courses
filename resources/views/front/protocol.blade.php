@extends('layouts.front.front_child')

@section('title')
    Протокол
@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>Глава шоста: Струни</span></div>
    </div>
    <div class="container">
        <!--<a class="breadcrumbs" href="#">Головна сторінка / Курс / Заняття 01</a>-->
        <ul class="breadcrumbs_list">
            <li class="breadcrumbs_item">
                <a href="{{ url('/') }}" class="breadcrumbs_link">Головна</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ url('/course/'.$course->id) }}" class="breadcrumbs_link">Курс: {{ $course->name }}</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ url('/course/'.$course->id.'/'.$lesson->id) }}" class="breadcrumbs_link breadcrumbs_active">Заняття {{ $lessonNumber }}</a>
            </li>
        </ul>

        <div class="string-menu_wrapper">
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ url('/course/'.$course->id.'/'.$lesson->id) }}"><span>Як це працює</span></a>
            </div>
            <div class="string-menu_inner">
              <a class="string-menu_btn" href="{{ url('/course/'.$course->id.'/'.$lesson->id.'/video') }}"><span>Відеолекція</span></a>
          </div>
          <div class="string-menu_inner">
              <a class="string-menu_btn active" href="{{ url('/course/'.$course->id.'/'.$lesson->id.'/protocol') }}"><span>Протокол</span></a>
          </div>
          <div class="string-menu_inner">
              <a class="string-menu_btn" href="{{ url('/course/'.$course->id.'/'.$lesson->id.'/test') }}"><span>Тест</span></a>
          </div>

          @if ($prevLesson)
              <a class="control_btn-prev" href="{{ url('/course/'.$course->id.'/'.$prevLesson->id) }}"><span></span></a>
          @else
              <a class="control_btn-prev disable" href="#"><span></span></a>
          @endif

          @if ($nextLesson)
              <a class="control_btn-next" href="{{ url('/course/'.$course->id.'/'.$nextLesson->id) }}"><span></span></a>
          @else
              <a class="control_btn-next disable" href="#"><span></span></a>
          @endif

        </div>

      <div class="protocole_book programs-item_book">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's </div>

      <div class="protocole-text string-text">
        {!! $lesson->course_protocol_descr !!}
      </div>

      @isset($lesson->add_document)
        <a class="protocole-btn btn-watch--more" href="{{ $lesson->add_document }}"><span>відкрити файл</span></a>
      @endisset

           </div>
</section>
@endsection
