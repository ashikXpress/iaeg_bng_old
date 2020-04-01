@extends('layouts.frontend')
@section('content')
    <!-- Start Breadcrumbs -->
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Registration</h2>
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">Register</a></li>
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
                        <h2><span>Registration</span> Information</h2>
                    </div>
                </div>
            </div>
            <div class="contact-head">

            </div>
            <div class="contact-bottom">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        @if(session()->has('success'))
                            <h5 class="alert alert-success">{{session()->get('success')}}</h5>
                        @endif
                        <div class="form-head">

                            <!-- Form -->
                            <form class="form" enctype="multipart/form-data" method="post" action="{{route('member.register')}}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 label mt-2 pull-right" for="first_name">First Name</label>

                                    <input name="first_name" id="first_name" class="col-md-9" value="{{old('first_name')}}" type="text" placeholder="Enter First Name" >
                                    <span class="text-danger col-md-10 offset-3">{{$errors->first('first_name')}}</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label mt-2 pull-right" for="middle_name">Middle Name</label>

                                    <input is="middle_name" name="middle_name" class="col-md-9" value="{{old('middle_name')}}" type="text" placeholder="Enter Middle Name" >
                                    <span class="text-danger col-md-10 offset-3">{{$errors->first('middle_name')}}</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label mt-2 pull-right" for="last_name">Last Name</label>

                                    <input id="last_name" name="last_name" class="col-md-9" value="{{old('last_name')}}" type="text" placeholder="Enter Last Name" >
                                    <span class="text-danger col-md-10 offset-3">{{$errors->first('last_name')}}</span>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label mt-2 pull-right" for="datepicker">Date of birth Day</label>

                                    <input id="datepicker" name="date_of_birth" class="col-md-9" value="{{old('date_of_birth')}}" type="text" placeholder="Enter Date of Birth" >
                                    <span class="text-danger col-md-10 offset-3">{{$errors->first('date_of_birth')}}</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label mt-2 pull-right" for="email">Email Address</label>

                                    <input id="email" name="email" class="col-md-9" value="{{old('email')}}" type="email" placeholder="Email Address" >
                                    <span class="text-danger col-md-10 offset-3">{{$errors->first('email')}}</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label mt-2 pull-right" for="mobile_number">Mobile Number</label>

                                    <input id="mobile_number" name="mobile_number" class="col-md-9" value="{{old('mobile_number')}}" type="text" placeholder="Enter Mobile Number" >
                                    <span class="text-danger col-md-10 offset-3">{{$errors->first('mobile_number')}}</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label mt-2 pull-right" for="contact_address">Contact Address</label>

                                    <textarea id="contact_address" cols="2" class="col-md-9" name="contact_address" placeholder="Enter Contact Address" >{{old('contact_address')}}</textarea>
                                    <span class="text-danger col-md-10 offset-3">{{$errors->first('contact_address')}}</span>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label mt-2 pull-right" for="profile_image">Upload File </label>

                                    <input id="profile_image" class="form-control col-md-9" name="profile_image" value="{{old('profile_image')}}" type="file">
                                    <span class="text-danger col-md-10 offset-3">{{$errors->first('profile_image')}}</span>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label mt-2 pull-right" for="password">Password</label>

                                    <input id="password" name="password" class="col-md-9" value="{{old('password')}}" type="password" placeholder="Enter Password" >
                                    <span class="text-danger col-md-10 offset-3">{{$errors->first('password')}}</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label mt-2 pull-right" for="confirm_password">Confirm Password</label>

                                    <input id="confirm_password" name="confirm_password" class="col-md-9" value="{{old('confirm_password')}}" type="password" placeholder="Enter Confirm Password" >
                                    <span class="text-danger col-md-10 offset-3">{{$errors->first('confirm_password')}}</span>
                                </div>

                                <div class="form-group">
                                    <div class="button" style="margin-left: 180px;">
                                        <button type="submit" class="btn primary">Register</button>
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
