@extends('layouts.frontend')

@section('content')
    <!-- Start Breadcrumbs -->
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{$event_name->name}}</h2>
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">{{$event_name->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Breadcrumbs -->

    <!-- Events -->
    <section class="events archives section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Upcoming <span>Events</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($events as $event)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Event -->
                    <div class="single-event">
                        <div class="head overlay">
                            <img src="{{asset($event->images[0]->image)}}" alt="#">
                            <a href="{{route('event.details',$event->id)}}" class="btn"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="event-content">
                            <div class="meta">
                                <div class=""><strong>Start Date</strong></div>
                                <span><i class="fa fa-calendar"></i>{{date('d M Y',strtotime($event->start_date))}}</span>
                                <span><i class="fa fa-clock-o"></i>{{date('h:m A',strtotime($event->start_date))}}</span>
                            </div>

                            <div class="meta">
                                <div class=""><strong>End Date</strong></div>
                                <span><i class="fa fa-calendar"></i>{{date('d M Y',strtotime($event->start_date))}}</span>
                                <span><i class="fa fa-clock-o"></i>{{date('h:m A',strtotime($event->start_date))}}</span>
                            </div>
                            <h4><a href="{{route('event.details',$event->id)}}">{{$event->name}}</a></h4>
                            <p>{{ \Illuminate\Support\Str::limit($event->description, 100, $end='...') }}</p>
                            <div class="button">
                                <a href="{{route('event.details',$event->id)}}" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!--/ End Single Event -->
                </div>
                 @endforeach
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Start Pagination -->
                    <div class="pagination-main">
                        {{$events->links()}}
                    </div>
                    <!--/ End Pagination -->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Events -->
@endsection
