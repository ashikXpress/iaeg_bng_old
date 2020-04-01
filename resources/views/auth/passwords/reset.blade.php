@extends('layouts.admin_login')

@section('content')

    <div class="col-md-6 position-relative">
        <div class="sign-in-from">
            <h1 class="mb-0">Reset Password</h1>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="mt-4" method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input placeholder="Enter Your Email" id="email" type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            <div class="form-group">
                <input placeholder="Enter New Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                    <input placeholder="Enter Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

            </div>

                <div class="d-inline-block w-100">
                    <button type="submit" class="btn btn-primary float-right">{{ __('Reset Password') }}</button>
                </div>

            </form>
        </div>
    </div>

@endsection
