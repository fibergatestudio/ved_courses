@if ($prevLesson)
    <a class="control_btn-prev" href="{{ route('view_lesson', [$course->id, $prevLesson->id]) }}" data-toggle="tooltip" data-placement="top" title="Попереднє заняття"><span></span></a>
@else
    <a class="control_btn-prev disable" href="#" data-toggle="tooltip" data-placement="top" title="Попереднє заняття відсутнє"><span></span></a>
@endif

@if ($nextLesson)
    <a class="control_btn-next" href="{{ route('view_lesson', [$course->id, $nextLesson->id]) }}" data-toggle="tooltip" data-placement="top" title="Наступне заняття"><span></span></a>
@else
    <a class="control_btn-next disable" href="#" data-toggle="tooltip" data-placement="top" title="Наступне заняття відсутнє"><span></span></a>
@endif
