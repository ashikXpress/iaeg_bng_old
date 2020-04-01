@extends('layouts.frontend')

@section('content')
    <!-- Start Breadcrumbs -->
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>About Us</h2>
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">about</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Breadcrumbs -->

    <!-- About US -->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                        <div class="single-event events single" style="padding: 30px 0;">
                            <div class="event-gallery">
                                @foreach($about->images as $item)
                                    <div class="single-gallery">
                                        <img src="{{asset($item->image)}}" alt="#">
                                    </div>
                                @endforeach
                            </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-text">
                        <h2>{{$about->title}}</h2>
                        <p class="text-justify">{{$about->description}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="about-text">
                        <h2>{{$about->mission_vision_title}}</h2>
                        <p class="text-justify">
                            {{$about->mission_vision_description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End About US -->
@endsection
