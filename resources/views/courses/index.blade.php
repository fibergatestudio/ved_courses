@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container container-height">

            @include('layouts.front.includes.admin_sidebar_vrst', [
                'headTitle' => 'Управління курсами',
                'imgPath' => 'img/teacher-mobileMenu-2.png'
            ])

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
                            <div class="flexTable-topTitle_inner">Додати в популярні</div>
                        </div>
                        @foreach($courses as $course)
                            <div class="flexTable-string">
                                <div class="flexTable-string_inner">{{ $loop->iteration }}.</div>
                                <div class="flexTable-string_inner">{{ $course->name ?? 'Немає' }}</div>
                                <div class="flexTable-string_inner">{{ $course->description ?? 'Немає' }}</div>
                                <div class="flexTable-string_inner">{{ $course->views ?? 'Немає' }}</div>
                                <div class="flexTable-string_inner">{{ $course->finished_count ?? 'Немає' }}</div>
                                <div class="flexTable-string_inner">{{ $course->creator_name ?? 'Немає' }} ({{ $course->creator_id ?? 'Немає' }})</div>
                                <div class="flexTable-string_inner">
                                    <a class="flexTable-btn_edit" href="{{ route('edit_course', ['course_id' => $course->id ]) }}">
                                        <span>Редагувати</span>
                                    </a>
                                    <a class="flexTable-btn_delete" href="##" data-toggle="modal"
                                        data-target="#deleteModal{{ $course->id }}">
                                        <span>Видалити</span>
                                    </a>
                                    @include('layouts.front.includes.modals.delete_user', [
                                        'modalId' => 'deleteModal',
                                        'secondId' => $course->id,
                                        'modalPath' => route('delete_course', ['course_id' => $course->id ]),
                                        'target' => $course->name
                                    ])
                                </div>
                                <div class="flexTable-string_inner">
                                    @if($course->popularity)
                                    <input type="checkbox" name="popularity" value="{{ $course->id }}" checked>
                                    @else
                                    <input type="checkbox" name="popularity" value="{{ $course->id }}">
                                    @endif
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
                            <div class="flexMobile-string_inner grayFont">{{ $loop->iteration }}.</div>
                        </div>
                        <div class="flexMobile-string blackFont">Назва курсу
                        </div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter"> {{ $course->name ?? 'Немає' }}</div>
                        </div>
                        <div class="flexMobile-string blackFont">Опис
                        </div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">{{ $course->description ?? 'Немає' }}</div>
                        </div>
                        <div class="flexMobile-string">
                            <div class="flexMobile-string_inner blackFont">Переглядів</div>
                            <div class="flexMobile-string_inner grayFont">{{ $course->views ?? 'Немає' }}</div>
                        </div>
                        <div class="flexMobile-string">
                            <div class="flexMobile-string_inner blackFont">Пройдено разів</div>
                            <div class="flexMobile-string_inner grayFont">{{ $course->finished_count ?? 'Немає' }}</div>
                        </div>
                        <div class="flexMobile-string blackFont">Творець (id)
                        </div>
                        <div class="flexMobile-string grayFont">
                            <div class="text-limiter">{{ $course->creator_name ?? 'Немає' }} ({{ $course->creator_id ?? 'Немає' }})</div>
                        </div>
                        <div class="flexMobile-string btns-string">
                            <a class="flexMobile-btn_edit" href="{{ route('edit_course', ['course_id' => $course->id ]) }}">
                                <span>Редагувати</span>
                            </a>
                            <a class="flexMobile-btn_delete" href="##" data-toggle="modal"
                                data-target="#deleteModalm{{ $course->id }}">
                                <span>Видалити</span>
                            </a>
                            @include('layouts.front.includes.modals.delete_user', [
                                'modalId' => 'deleteModalm',
                                'secondId' => $course->id,
                                'modalPath' => route('delete_course', ['course_id' => $course->id ]),
                                'target' => $course->name
                            ])
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('js')
<script type="text/javascript">
    
    $('[name="popularity"]').change((e)=>{
        
        const courseId = $(e.target).val();
        let popular = '';
        
        if ($(e.target).prop("checked")) {
            popular = 'true';
        }
        else{
            popular = 'false';
        }

        axios.post("{{ route('popular_course') }}", {
            course_id: courseId,
            popular: popular
        })
        .then(function (response) {
            console.log(response);                    
        })
        .catch(function (error) {
            console.log(error);
        });
    })
   
</script>
@endsection