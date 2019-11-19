@extends('layouts.app')

@section('content')

    <header-component
        v-bind:auth="false"
        name=""
        page_title="Login"
    ></header-component>

    <div class="container single-exercise">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-7 col-lg-5">

                <div class="liftlog-logo-container">
                    <img class="liftlog-logo" src="{{ asset('images/logo.svg') }}" alt="">
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="liftlog-form-group">
                        <!-- Email -->
                        <label class="liftlog-label" for="email">Email</label>
                        <input id="email" type="email" class="liftlog-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!-- /Email -->
                        <!-- Password -->
                        <label class="liftlog-label" for="password">Password</label>
                        <input id="password" type="password" class="liftlog-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!-- /Password -->
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <!-- /Checkbox -->
                    </div>
                    <div class="liftlog-button-group">
                        <button type="submit" class="btn btn-liftlog">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="d-block mt-3 mb-2">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <p class="mb-0">Don't have an account?  <a href="{{ route('register') }}">{{ __('Register now.') }}</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
