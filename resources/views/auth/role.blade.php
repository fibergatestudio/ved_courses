@extends('layouts.front.sign')

@section('content')
<div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="modal-body tab-content radius">
                <div class="">
                    <img class="entrance-logo" src="{{ asset('img/entrance-logo.svg') }}" alt="logo">
                    <h3 class="entrance-title mt-3">{{ __('Вибір ролі') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login.setrole', ['user_id' => $user_id, 'student_id' => $student_id]) }}">
                        @csrf
                        <label for="role" class="entrance-label">{{ __('Роль') }}</label>
                        <select id="role" class="entrance-input" name="role" required >
                            <option value="student">Студент</option>
                            <option value="teacher">Вчитель</option>
                        </select>
                        <div class="modal-footer">
                            <button type="submit" class="btn-entrance btn btn-secondary"
                                data-dismiss="modal"> {{ __('Обрати роль') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
