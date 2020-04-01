@extends('layouts.admin_login')
@section('title')
    Sign in
@endsection
@section('content')
    <div class="col-md-6 position-relative">
        <div class="sign-in-from">
            <h1 class="mb-0">Sign in</h1>
            <p>Enter your email address and password to access admin panel.</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" name="email" class="form-control mb-0 @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="Enter email" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    @if (Route::has('password.request'))
                        <a class="float-right" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    <input type="password" name="password" class="form-control mb-0 @error('password') is-invalid @enderror" id="password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="d-inline-block w-100">
                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
                        <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">{{ __('Login') }}</button>
                </div>
                <div class="sign-info">
                    <span class="dark-color d-inline-block line-height-2"></span>

                </div>
            </form>
        </div>
    </div>
@endsection
