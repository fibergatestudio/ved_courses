<section class="popular">
    <div class="direction-separator popular-separator">
        <div class="direction-separator_badge"><span>Найпопулярніші курси</span></div>
    </div>
    <div class="container">
        <div class="popular-wrapper">
            @foreach($courses as $course)
            @if($course->popularity)
            <div class="popular-inner">
                <div class="popular-inner_top">
                    @if($course->course_image_path != "")
                        <img class="popular-inner_img" src="{{url('/images/' . $course->course_image_path)}}" alt="img">
                    @else
                        <img class="popular-inner_img" src="{{ asset('img/popular_1.jpg') }}" alt="img">
                    @endif
                    <a class="image-btn popular-btn" href="{{ route('view_course', $course->id) }}">
                        <span>перейти до курсів</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="popular-inner_bottom">
                    <div class="popular-inner_bottom--title">
                        <h4>{{ $course->name}}</h4>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            {{--<div class="popular-inner">
                <div class="popular-inner_top">
                    <img class="popular-inner_img" src="{{ asset('img/popular_2.jpg') }}" alt="img">
                    <a class="image-btn popular-btn" href="##">
                        <span>перейти до курсів</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="popular-inner_bottom">
                    <div class="popular-inner_bottom--title">
                        <h4>Довга назва найпопулярнішого курсу</h4>
                    </div>
                </div>
            </div>
            <div class="popular-inner">
                <div class="popular-inner_top">
                    <img class="popular-inner_img" src="{{ asset('img/popular_3.jpg') }}" alt="img">
                    <a class="image-btn popular-btn" href="##">
                        <span>перейти до курсів</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="popular-inner_bottom">
                    <div class="popular-inner_bottom--title">
                        <h4>Довга назва найпопулярнішого курсу</h4>
                    </div>
                </div>
            </div>
            <div class="popular-inner">
                <div class="popular-inner_top">
                    <img class="popular-inner_img" src="{{ asset('img/popular_4.jpg') }}" alt="img">
                    <a class="image-btn popular-btn" href="##">
                        <span>перейти до курсів</span>
                        <div class="image-btn_arrow"></div>
                    </a>
                </div>
                <div class="popular-inner_bottom">
                    <div class="popular-inner_bottom--title">
                        <h4>Довга назва найпопулярнішого курсу</h4>
                    </div>
                </div>
            </div>--}}

        </div>

    </div>
</section>
