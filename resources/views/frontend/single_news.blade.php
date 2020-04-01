@extends('layouts.frontend')
@section('additionalCSS')
    <style>
        a.btn-download {
            background: #00b16a;
            color: #fff;
            padding: 6px 16px;
            margin: 5px 1px;
            display: inline-block;
            border-radius: 5px;
        }
    </style>
@endsection
@section('content')
    <div id="fb-root"></div>
    <!-- Start Breadcrumbs -->
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>News Details</h2>
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">News Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Breadcrumbs -->

    <!-- Events -->
    <section class="events single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="single-event">
                        @if($news->category_id==1)
                        <img width="100%" height="auto" src="{{asset($news->image_or_file)}}" alt="#">
                        @endif
                        <div class="event-content">
                            <h4>{{$news->title}} </h4>
                            <span> <i class="fa fa-user"></i> Post by: <span style="color: #00b16a">{{$news->userName->name}}</span></span>
                            @if($news->category_id==2)
                                <div class="course-meta">
                                   <span class="span"><a target="_blank"  class="btn-download" href="{{asset($news->image_or_file)}}"><i class="fa fa-cloud-download"></i> File Download</a></span>
                                </div>

                            @endif
                            <div class="meta">
                                <span><i class="fa fa-calendar"></i> {{date('d M Y',strtotime($news->upload_date))}}</span>
                            </div>
                            <p>{{$news->description}}</p>
                            <div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="10"></div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="learnedu-sidebar">
                        <!-- Categories -->
                        <div class="single-widget categories">
                            <h3 class="title">Archive</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Education Tips<span>2020</span></a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Education Tips<span>2021</span></a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Education Tips<span>2023</span></a></li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Events -->
@endsection
@section('additionalJS')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>
@endsection
