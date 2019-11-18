@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="liftlog-form-group">
            <label for="email" class="liftlog-label">Email</label>
            <input id="email" type="email" class="liftlog-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="liftlog-button-group">
            <button type="submit" class="btn btn-liftlog">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>

@endsection
