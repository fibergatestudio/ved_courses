@extends('layouts.front.sign')

@section('content')
<div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="modal-body tab-content radius">
                <div class="">
                    <a class="entrance-logo" href="{{ route('main')}}">
                        <img class="w-100" src="{{ asset('img/entrance-logo.svg') }}" alt="logo">
                    </a>
                    <h3 class="entrance-title mt-3">{{ __('Reset Password') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                            <label for="email" class="entrance-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="entrance-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="mail@mail.com" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="password" class="entrance-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="entrance-input @error('password') is-invalid @enderror" name="password" placeholder="********" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="password-confirm" class="entrance-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="entrance-input" name="password_confirmation" placeholder="********" required autocomplete="new-password">

                        <div class="modal-footer">
                            <button type="submit" class="btn-entrance btn btn-secondary"
                                data-dismiss="modal"> {{ __('Reset Password') }}</button>
                                <a href="{{ url()->previous() }}" class="btn-entrance btn btn-secondary"
                                    >Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
