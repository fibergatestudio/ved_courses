@extends('layouts.front.front_child')

@section('content')

<section class="courseControl">
    <div class="courseControl-separator direction-separator">
    </div>
    <div class="courseControl-container sticky-container container container-height">

        @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління користувачами', 'imgPath' => 'img/teacher-mobileMenu-5.png'])

        <div class="groups-control ug__group mer-mw">
            <div class="groups-head">
                <h1 class="groups-head__title ug__head-title">Управління користувачами</h1>
            </div>
            <div class="groups-body ug__body mer-mw">
                <div class="groups-title ug__content mer-mw">
                    <div class="groups-title__elem groups-title__elem_style ug__title-elem">№'</div>
                    <div class="groups-title__elem groups-title__elem_style ug__title-elem">Логін</div>
                    <div class="groups-title__elem groups-title__elem_style ug__title-elem mer-e">Email</div>
                    <div class="groups-title__elem groups-title__elem_style ug__title-elem">Роль</div>
                    <div class="groups-title__elem groups-title__elem_style ug__title-elem mer-w20">Управління</div>
                </div>
                <div class="groups-content ug__content mer-mw">
                    @foreach($users as $user)
                    <div class="groups-row ug__row">
                        <div class="groups__elem ug__elem">{{ $user->id }}.</div>
                        <div class="groups__elem ug__elem">{{ $user->name }}</div>
                        <div class="groups__elem ug__elem w-wrap mer-e">{{ $user->email }}</div>
                        <div class="groups__elem ug__elem">
                            @switch($user->role)
                                @case('student')
                                    Студент
                                    @break
                                @case('teacher')
                                    Викладач
                                    @break
                                @default
                                    Адмiн
                            @endswitch
                        </div>
                        <div class="groups__elem ug__elem mer-w22">
                            <a class="flexTable-btn_edit groups-btn-edit-restyle ug_btn-edit"
                                href="{{ route('user_edit', ['user_id' => $user->id]) }}"><span>Редагувати</span></a>
                            @if($user->role != 'admin')
                                <a class="flexTable-btn_delete ug__btn-delete" href="##" data-toggle="modal"
                                    data-target="#deleteModal{{ $user->id }}"><span>Видалити</span></a>
                                @include('layouts.front.includes.modals.delete_user', [
                                    'modalId' => 'deleteModal',
                                    'secondId' => $user->id,
                                    'modalPath' => route('user_delete', ['user_id' =>  $user->id ]),
                                    'target' => $user->name
                                ])
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{ $users->onEachSide(0)->links('vendor.pagination.vrst_pagination') }}
        </div>
        <div class="groups-control-mobile">
            <div class="groups-head">
                <h1 class="groups-head__title ug_m-head-title">Управління користувачами</h1>
            </div>
            <div class="groups-body">
                @foreach($users as $user)
                <div class="groups-content">
                    <div class="groups-row groups-row_style">
                        <div class="groups-row__elem">
                            <div
                                class="groups-title__elem  groups-row__elem_restyle ug__m-row-title ug__mt-bl-reset">№</div>
                            <div
                                class="groups__elem groups-row__elem_restyle ug__m-row-title ug__mobile-row-elem ug__mt-bl-reset">
                                {{ $user->id }}.
                            </div>
                        </div>
                        <div class="groups-row__elem">
                            <div class="groups-title__elem  ug__m-row-title">Логін</div>
                            <div class="groups__elem ug__m-row-title ug__mobile-row-elem">{{ $user->name }}</div>
                        </div>
                        <div class="groups-row__elem">
                            <div class="groups-title__elem  ug__m-row-title">Email</div>
                            <div class="groups__elem ug__m-row-title ug__mobile-row-elem">{{ $user->email }}</div>
                        </div>
                        <div class="groups-row__elem">
                            <div class="groups-title__elem  ug__m-row-title">Роль</div>
                            <div class="groups__elem ug__m-row-title ug__mobile-row-elem">
                                @switch($user->role)
                                    @case('student')
                                        Студент
                                        @break
                                    @case('teacher')
                                        Викладач
                                        @break
                                    @default
                                        Адмiн
                                @endswitch
                            </div>
                        </div>
                        <div class="groups-row__elem">
                            <div class="groups__elem groups__elem-last-child groups__elem_style pl-0">
                                <a class="flexTable-btn_edit groups-btn-edit-restyle ug_btn-edit"
                                    href="{{ route('user_edit', ['user_id' => $user->id]) }}#"><span>Редагувати</span>
                                </a>
                                @if($user->role != 'admin')
                                    <a class="flexTable-btn_delete ug__btn-delete" href="##" data-toggle="modal"
                                        data-target="#deleteModalm{{ $user->id }}"><span>Видалити</span>
                                    </a>
                                    @include('layouts.front.includes.modals.delete_user', [
                                        'modalId' => 'deleteModalm',
                                        'secondId' => $user->id,
                                        'modalPath' => route('user_delete', ['user_id' =>  $user->id ]),
                                        'target' => $user->name
                                    ])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $users->onEachSide(0)->links('vendor.pagination.vrst_pagination') }}
            </div>
        </div>
    </div>
</section>
@endsection
