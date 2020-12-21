@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container container-height">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])

            <div class="row justify-content-center">
                <h3 class="courseControl-title curs-tit">Управління курсами</h3>
                <a class="curs-btn" href="{{ route('new_course') }}">
                    <button class="flexTable-btn_edit">Створити курс</button>
                </a>
            </div>

            <div class="flexTable-wrapper">
                <div class="flexTable-scrollContainer">
                    <div class="flexTable-scrollInner">
                        <div class="flexTable-topTitle">
                            <div class="flexTable-topTitle_inner">№</div>
                            <div class="flexTable-topTitle_inner">Назва курсу</div>
                            <div class="flexTable-topTitle_inner">Опис</div>
                            <div class="flexTable-topTitle_inner">Перегляів</div>
                            <div class="flexTable-topTitle_inner">Пройдено разів</div>
                            <div class="flexTable-topTitle_inner">Творець (id)</div>
                            <div class="flexTable-topTitle_inner">Управління</div>
                        </div>
                        @foreach($courses as $course)
                            <div class="flexTable-string">
                                <div class="flexTable-string_inner">{{ $course->id }}.</div>
                                <div class="flexTable-string_inner">{{ $course->name }}</div>
                                <div class="flexTable-string_inner">{{ $course->description }}</div>
                                {{-- <?php //$clear_descr = str_replace("&nbsp;", '', $course->description); ?>
                                {{ strip_tags( $clear_descr) }}
                                </div> --}}
                                <div class="flexTable-string_inner">{{ $course->views }}</div>
                                <div class="flexTable-string_inner">{{ $course->finished_count }}</div>
                                <div class="flexTable-string_inner">{{ $course->creator_id }} {{ $course->creator_name }}</div>
                                <div class="flexTable-string_inner">
                                    <a class="flexTable-btn_edit" href="{{ route('edit_course', ['course_id' => $course->id ]) }}"><span>Редагувати</span></a>
                                    <a class="flexTable-btn_delete" href="##" data-toggle="modal"
                                        data-target="#deleteModal{{ $course->id }}"><span>Видалити</span></a>
                                    <div class="bootstrap-restylingStudent modal fade" id="deleteModal{{ $course->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog_restyle">
                                            <div class="modal-content">
                                                <div class="deleteMenu-wrapper">
                                                    <div class="deleteMenu-topImg">
                                                        <img src="/img/basket.png" alt="icon">
                                                    </div>
                                                    <div class="deleteMenu-text">
                                                        Ви точно бажаєте видалити <br> Курс {{ $course->name }} ?
                                                    </div>
                                                    <div class="deleteMenu-btn">
                                                        <a class="flexTable-btn_delete" href="{{ route('delete_course', ['course_id' => $course->id ]) }}"><span>Видалити</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flexMobile-wrapper">
                @foreach($courses as $course)
                    <div class="flexMobile-block">
                        <div class="flexMobile-string">
                            <div class="flexMobile-string_inner blackFont">№</div>
                            <div class="flexMobile-string_inner grayFont">{{ $course->id }}.</div>
                        </div>
                        <div class="flexMobile-string blackFont">Назва курсу
                        </div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter"> {{ $course->name }}</div>
                        </div>
                        <div class="flexMobile-string blackFont">Опис
                        </div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">{{ $course->description }}</div>
                        </div>
                        <div class="flexMobile-string">
                            <div class="flexMobile-string_inner blackFont">Переглядів</div>
                            <div class="flexMobile-string_inner grayFont">{{ $course->views }}</div>
                        </div>
                        <div class="flexMobile-string">
                            <div class="flexMobile-string_inner blackFont">Пройдено разів</div>
                            <div class="flexMobile-string_inner grayFont">{{ $course->finished_count }}</div>
                        </div>
                        <div class="flexMobile-string blackFont">Творець (id)
                        </div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">{{ $course->creator_id }} {{ $course->creator_name }}</div>
                        </div>
                        <div class="flexMobile-string btns-string">
                            <a class="flexMobile-btn_edit" href="{{ route('edit_course', ['course_id' => $course->id ]) }}"><span>Редагувати</span></a>
                            <a class="flexMobile-btn_delete" href="##" data-toggle="modal"
                                data-target="#deleteModal"><span>Видалити</span></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
