@extends('layouts.frontend')
@section('content')
    <!-- Start Breadcrumbs -->
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Login</h2>
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Breadcrumbs -->
    <section id="contact" class="contact section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2><span>Login</span> Information</h2>
                    </div>
                </div>
            </div>
            <div class="contact-head">

            </div>
            <div class="contact-bottom">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        @if(session()->has('error'))
                            <h5 class="alert alert-danger">{{session()->get('error')}}</h5>
                        @endif
                        <div class="form-head">

                            <!-- Form -->
                            <form class="form" method="post" action="{{route('member.login')}}">
                                @csrf
                                <div class="form-group">
                                    <input name="email" value="{{old('email')}}" type="email" placeholder="Email Address" >
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                </div>
                                <a style="color: #00B16A" class="pull-right"  href="{{route('member.register')}}">Forgotten Password?</a>
                                <div class="form-group">

                                    <input name="password" value="{{old('password')}}" type="password" placeholder="Enter Password" >
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                </div>

                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="rememberme" class="filled-in chk-col-pink">
                                    <label for="rememberme">Remember Me</label>

                                <div class="form-group">
                                    <div class="button">
                                        <button type="submit" class="btn primary">Log in</button> OR
                                        <a href="{{route('member.register.form')}}" class="register-btn">Register</a>

                                    </div>

                                </div>
                            </form>
                            <!--/ End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
