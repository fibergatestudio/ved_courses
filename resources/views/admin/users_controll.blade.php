@extends('layouts.front.front_child')

@section('content')
<section class="courseControl">
    <div class="courseControl-separator direction-separator">
    </div>
    <div class="courseControl-container sticky-container container">
        @if(session()->has('message_success'))
            <div class="alert alert-success">
                {{ session()->get('message_success') }}
            </div>
        @endif
        <div class="courseControl-container sticky-container container">
            @include('layouts.admin_sidebar')
            <div class="groups-control ug__group">
                <div class="groups-head">
                    <h1 class="groups-head__title ug__head-title"> Управління користувачами </h1>
                </div>
                <div class="groups-body ug__body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="groups-title ug__content">
                        <div class="groups-title__elem groups-title__elem_style ug__title-elem">№</div>
                        <div class="groups-title__elem groups-title__elem_style ug__title-elem">Логін</div>
                        <div class="groups-title__elem groups-title__elem_style ug__title-elem">Email</div>
                        <div class="groups-title__elem groups-title__elem_style ug__title-elem">Роль</div>
                        <div class="groups-title__elem groups-title__elem_style ug__title-elem">Управління </div>
                    </div>
                    @foreach($users as $user)
                        <div class="groups-content ug__content">
                            <div class="groups-row ug__row">
                                <div class="groups__elem ug__elem">{{ $user->id }}</div>
                                <div class="groups__elem ug__elem">{{ $user->name }}</div>
                                <div class="groups__elem ug__elem">{{ $user->email }}</div>
                                <div class="groups__elem ug__elem">{{ $user->role }}</div>
                                <div class="groups__elem ug__elem">
                                    <a class="flexTable-btn_edit groups-btn-edit-restyle ug_btn-edit"
                                        href="{{ route('user_edit', ['user_id' => $user->id]) }}"><span>Редагувати</span></a>
                                    @if($user->role != 'admin')
                                        <a class="flexTable-btn_delete ug__btn-delete" href="{{ route('user_delete', ['user_id' => $user->id]) }}" data-toggle="modal"
                                        data-target="#deleteModal"><span>Видалити</span></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Управлене пользователями') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Логин</th>
                                    <th>Email</th>
                                    <th>Роль</th>
                                    <th>Статус</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                        <a href="{{ route('user_edit', ['user_id' => $user->id]) }}">
                                            <button class="btn btn-success">Изменить</button>
                                        </a>
                                    @if($user->role != 'admin')
                                        <a href="{{ route('user_delete', ['user_id' => $user->id]) }}">
                                            <button class="btn btn-danger">Удалить</button>
                                        </a>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection
