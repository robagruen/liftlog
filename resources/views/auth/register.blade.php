@extends('layouts.app')

@section('content')

    <header-component
        v-bind:auth="false"
        name=""
        page_title="Register"
    ></header-component>

    <div class="container single-exercise">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-7 col-lg-5">

                <div class="liftlog-logo-container">
                    <img class="liftlog-logo" src="{{ asset('images/logo.svg') }}" alt="">
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="liftlog-form-group">
                        <label class="liftlog-label" for="name">Name</label>
                        <input id="name" type="text" class="liftlog-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label class="liftlog-label" for="email">Email</label>
                        <input id="email" type="email" class="liftlog-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label class="liftlog-label" for="password">Password</label>
                        <input id="password" type="password" class="liftlog-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label class="liftlog-label" for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="liftlog-input" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="liftlog-button-group">
                        <button type="submit" class="btn btn-liftlog">
                            {{ __('Register') }}
                        </button>

                        <p class="mt-3 mb-0">Already have an account?  <a href="{{ route('login') }}">{{ __('Log in now.') }}</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
