@extends('layouts.front.front_child')

@section('title')
    Профіль
@endsection

@section('header')

@endsection

@section('content')
<section class="direction">
    <div class="direction-separator">
        <div class="direction-separator_badge"><span>Профіль</span></div>
    </div>
    <div class="container">
        @if(session()->has('message_success'))
            <div class="alert alert-success">
                {{ session()->get('message_success') }}
            </div>
        @endif
        <div class="profile-grid_wrapper">
            <div class="profile-grid_item">
                <div class="profile-item_photo">
                </div>
            </div>
            @if( Auth::user()->getMedia('photos')->last())
                {{-- <style>
                    .profile-item_photo { background-image: url({{ Auth::user()->getMedia('photos')->last()->getUrl('thumb_big') }}) !important; background-color: inherit !important;
                    }
                </style> --}}
            @endif
            <div class="profile-grid_item">
                <div class="profile-item_name">{{ $teacher_info->full_name }}</div>
                <div class="profile-item_position">@if ($teacher_info->role === 'teacher') викладач @endif</div>
                <div class="profile-item_course">{{ $teacher_info->email }}</div>
            </div>
            <div class="profile-grid_item" onmouseover="show_text_profile();" onmouseout="hide_text_profile();">
                <div class="profile-grid_fakeform active" id="profile_text1">
                    <p>+ Додати інформацію про себе</p>
                    <p>Розкажіть іншим користувачам трохи про себе: де ви живете, чим </p>
                    <p>цікавитесь, чому проходите курси, або що сподіваєтеся вивчити.</p>
                </div>
                <form action="{{ route('teacher_descr_apply') }}" method="POST" class="profile-grid_form" id="form-profile">
                    @csrf
                    <textarea name="profile_text" class="profile-item_text" spellcheck="false" id="profile_text2" onblur="document.getElementById('form-profile').submit()">{{ $teacher_info->descr }}</textarea>
                </form>
            </div>
        </div>
        <a class="btn-watch--more" href="javascript: void();" onclick="location.href='{{ route('teacher_information') }}'"><span>Редагувати</span></a>

    </div>
</section>

<script>
    // @if( !empty($student_full_info->descr))
    //     show_text_profile();
    // @endif
    function show_text_profile() {
        document.getElementById('profile_text1').style.display = 'none';
        document.getElementById('profile_text2').style.display = 'block';
    }
    function hide_text_profile() {
        if (document.getElementById('profile_text2').value == '') {
            document.getElementById('profile_text1').style.display = 'block';
            document.getElementById('profile_text2').style.display = 'none';
        }
    }
</script>
@endsection
