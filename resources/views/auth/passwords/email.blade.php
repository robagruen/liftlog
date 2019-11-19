@extends('layouts.app')

@section('content')

    <header-component
        v-bind:auth="false"
        name=""
        page_title="Reset Password"
    ></header-component>

    <div class="container single-exercise">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-7 col-lg-5">

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

            </div>
        </div>
    </div>

@endsection
