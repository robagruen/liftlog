@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input id="name" type="text" class="liftlog-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="email" type="email" class="liftlog-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password" type="password" class="liftlog-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" class="liftlog-input" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm E-Mail">
        </div>

        <div class="btn-row">
            <button type="submit" class="btn btn-liftlog">
                {{ __('Register') }}
            </button>
        </div>
    </form>
@endsection
