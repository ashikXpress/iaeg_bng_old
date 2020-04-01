@extends('layouts.member')
@section('content')
    <div class="row">
        @include('layouts.assets.message')
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Auth::guard('member')->user()->is_member==1)
                <span class="alert alert-success text-center" style="font-size:20px;display: block"><a style="color:#089cac" href="{{route('member.technical.event')}}">You are a <strong>{{Auth::guard('member')->user()->memberType->name}}</strong> of IEAG_BNG, so you have discount for every event participating </a></span>
            @endif
        </div>
    </div>

    <div class="row"  style="min-height: 450px">
        <div class="col-lg-12">
            <div class="row">
                <a href="{{route('member.technical.event')}}" class="col-md-3 col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-body iq-bg-primary rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-fill"></i></div>
                                <div class="text-right">
                                    <h2 class="mb-0"><span class="counter">{{$technical}}</span></h2>
                                    <h5 class="">Technical Event</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('member.exhibition.event')}}" class="col-md-3 col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-body iq-bg-warning rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-user-fill"></i></div>
                                <div class="text-right">
                                    <h2 class="mb-0"><span class="counter">{{$exhibition}}</span></h2>
                                    <h5 class="">Exhibition Event</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('member.exhibition.event')}}" class="col-md-3 col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-body iq-bg-danger rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-user-fill"></i></div>
                                <div class="text-right">
                                    <h2 class="mb-0"><span class="counter">{{$field}}</span></h2>
                                    <h5 class="">Field Event</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
