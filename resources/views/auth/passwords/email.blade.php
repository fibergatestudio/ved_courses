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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <label for="email" class="entrance-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="entrance-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="mail@mail.com" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <div class="modal-footer">
                            <button type="submit" class="btn-entrance btn btn-secondary"
                                data-dismiss="modal"> {{ __('Send Password Reset Link') }}</button>
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
