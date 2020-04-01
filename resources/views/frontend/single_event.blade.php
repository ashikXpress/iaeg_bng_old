@extends('layouts.frontend')
@section('content')
    <div id="fb-root"></div>
    <!-- Start Breadcrumbs -->
    <section class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Event Details</h2>
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">Event Details</a></li>
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
                        @if($event->images->count() > 1)
                        <div class="event-gallery">
                            @foreach($event->images as $item)
                            <div class="single-gallery">
                                <img src="{{asset($item->image)}}" alt="#">
                            </div>
                            @endforeach
                        </div>
                        @else
                         <img width="100%" height="auto" src="{{asset($event->images[0]->image)}}" alt="#">
                        @endif
                        
                        <div class="event-content">
                            <div class="meta">
                                <strong>Start Date</strong>
                                <span><i class="fa fa-calendar"></i>{{date('d M Y',strtotime($event->start_date))}}</span>
                                <span><i class="fa fa-clock-o"></i>{{date('h:m A',strtotime($event->start_date))}}</span>

                                <strong>End Date</strong>
                                <span><i class="fa fa-calendar"></i> {{date('d M Y',strtotime($event->end_date))}}</span>
                                <span><i class="fa fa-clock-o"></i>{{date('h:m A',strtotime($event->end_date))}}</span>


                            </div>
                            <h2>{{$event->name}}</h2>
                            <h4>Organizer: IAEG_Bangladesh National Group (International Association For Engineering Geology & The Environment_Bangladesh National Group) JU</h4>
                            <h4>Co-Organizer: Jahangirnagar University, KAGAWA University, GSB </h4>
                            <span><strong>Venue: {{$event->venue}}</strong></span>
                            <span><strong>Session: {{$event->session}}</strong></span>
                            <p>{{$event->description}}</p>
                            <div class="book-now">
                                <div class="button">
                                    @if($event->event_category_id==1)
                                    <a href="{{route('member.event.technical.join',$event->id)}}" class="btn">Apply for this event</a>
                                    @elseif($event->event_category_id==2)
                                    <a href="{{route('member.event.exhibition.join',$event->id)}}" class="btn">Apply for this event</a>
                                    @elseif($event->event_category_id==3)
                                    <a href="{{route('member.event.field.join',$event->id)}}" class="btn">Apply for this event</a>
                                    @endif
                                </div>
                            </div>
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
