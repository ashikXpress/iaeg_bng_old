@extends('layouts.frontend')
@section('content')
    <!-- Start Breadcrumbs -->
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{$member_type->name}}</h2>
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">{{$member_type->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Breadcrumbs -->

    <!-- Team -->
    <section class="team section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our <span>Members</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach($members as $member)
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Team -->
                            <div class="single-team">
                                <img src="{{asset($member->profile_image)}}" alt="#">
                                <div class="team-hover">
                                    <h4>{{$member->first_name.' '.$member->middle_name.' '.$member->last_name}}<span>Associate Professor</span></h4>
                                    <p>cumque nihil impedit quo minusid quod maxime placeat facere possimus</p>
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Single Team -->
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-5">
                    {{$members->links()}}
                </div>
            </div>
        </div>
    </section>
    <!--/ End Team -->
@endsection
