@extends('layouts.member')
@section('content')
    <div class="row">
        @include('layouts.assets.message')
    </div>
   <div class="row">
       @foreach($events as $event)
       <div class="col-sm-4">
           <div class="card iq-mb-3">
               <img src="{{asset($event->images[0]->image)}}" class="card-img-top" alt="#">
               <div class="card-body">
                   <h5 class="card-title">{{$event->name}}</h5>
                   <p class="mb-0"><strong>Start Date</strong> <i class="fa fa-calendar"></i> {{date('d M Y',strtotime($event->start_date))}} {{date('h:m A',strtotime($event->start_date))}}</p>
                   <p class="mb-0"><strong>End Date</strong> <i class="fa fa-calendar"></i> {{date('d M Y',strtotime($event->end_date))}} {{date('h:m A',strtotime($event->end_date))}}</p>
                   <h5>Venue: {{$event->venue}}</h5>
                   <h6>Session: {{$event->session}}</h6>
                       <a href="{{route('member.event.details',$event->id)}}"><strong>read more</strong></a>

                   <p class="card-text mb-0"><small class="text-muted">{{$event->created_at->diffForHumans()}}</small></p>
                  @php
                      $member= Auth::guard('member')->user();

            $gold_check= DB::table('event_member')->where('event_id',$event->id)
                   ->where('member_id',$member->id)
                   ->where('exhibition_category','gold')
                   ->first();
              $platinum_check= DB::table('event_member')->where('event_id',$event->id)
                   ->where('member_id',$member->id)
                   ->where('exhibition_category','platinum')
                   ->first();
              $silver_check= DB::table('event_member')->where('event_id',$event->id)
                   ->where('member_id',$member->id)
                   ->where('exhibition_category','silver')
                   ->first();
              $bronze_check= DB::table('event_member')->where('event_id',$event->id)
                   ->where('member_id',$member->id)
                   ->where('exhibition_category','bronze')
                   ->first();
                  @endphp
                   <h6>Already Join this event</h6>
                   @if($gold_check)
                       <span class="badge badge-success">Golden</span>
                   @endif

                   @if ($platinum_check)
                       <span class="badge badge-success">platinum</span>
                   @endif

                   @if ($silver_check)
                       <span class="badge badge-success">Silver</span>
                   @endif

                   @if ($bronze_check)
                       <span class="badge badge-success">Bronze</span>
                   @endif

                   @if($gold_check && $platinum_check && $silver_check && $bronze_check)
                       <button class="btn btn-warning btn-block mt-1">Already Participated all event</button>
                   @else
                       <a href="{{route('member.event.exhibition.join',$event->id)}}" class="btn btn-primary btn-block mt-1">Join</a>

                   @endif


               </div>
           </div>
       </div>
       @endforeach

   </div>
@endsection
