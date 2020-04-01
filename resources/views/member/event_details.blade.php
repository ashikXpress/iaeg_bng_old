@extends('layouts.member')
@section('content')
    <div class="row">
        @include('layouts.assets.message')
    </div>
    <div class="col-lg-12">
        <div class="card iq-mb-3">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @php
                                $i=0;
                            @endphp
                            @foreach($event->images as $img)
                            <div class="carousel-item {{ ($i==0) ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{asset($img->image)}}" alt="First slide">
                            </div>
                                @php $i++; @endphp
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <p class="card-text pull-right"><small class="text-muted">Posted {{$event->created_at->diffForHumans()}}</small></p>

                        <h4 class="card-title">{{$event->name}}</h4>
                        <p class="mb-0"><strong>Start Date</strong> <i class="fa fa-calendar"></i> {{date('d M Y',strtotime($event->start_date))}} {{date('h:m A',strtotime($event->start_date))}}</p>
                        <p class="mb-0"><strong>End Date</strong> <i class="fa fa-calendar"></i> {{date('d M Y',strtotime($event->end_date))}} {{date('h:m A',strtotime($event->end_date))}}</p>
                        <h5>Venue: {{$event->venue}}</h5>
                        <h6>Session: {{$event->session}}</h6>
                        <p class="card-text">{{$event->description}}</p>
                        @if($event->event_category_id==1)
                            <a href="{{route('member.event.technical.join',$event->id)}}" class="btn btn-primary">Join</a>
                        @elseif($event->event_category_id==2)
                            <a href="{{route('member.event.exhibition.join',$event->id)}}" class="btn btn-primary">Join</a>
                        @elseif($event->event_category_id==3)
                            <a href="{{route('member.event.field.join',$event->id)}}" class="btn btn-primary">Join</a>

                        @endif
                        <p class="card-text"><small class="text-muted">Posted {{$event->created_at->diffForHumans()}}</small></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
