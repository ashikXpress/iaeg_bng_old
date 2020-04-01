@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12"  style="min-height: 450px">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-body iq-bg-primary rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-fill"></i></div>
                                <div class="text-right">
                                    <h2 class="mb-0"><span class="counter">{{$slider}}</span></h2>
                                    <h5 class="">Slider</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-body iq-bg-warning rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-women-fill"></i></div>
                                <div class="text-right">
                                    <h2 class="mb-0"><span class="counter">{{$gallery}}</span></h2>
                                    <h5 class="">Gallery</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-body iq-bg-danger rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-group-fill"></i></div>
                                <div class="text-right">
                                    <h2 class="mb-0"><span class="counter">{{$event}}</span></h2>
                                    <h5 class="">Event</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-body iq-bg-info rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon bg-info"><i class="ri-hospital-line"></i></div>
                                <div class="text-right">
                                    <h2 class="mb-0"><span class="counter">{{$news}}</span></h2>
                                    <h5 class="">News</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-body iq-bg-info rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon bg-info"><i class="ri-hospital-line"></i></div>
                                <div class="text-right">
                                    <h2 class="mb-0"><span class="counter">{{$member}}</span></h2>
                                    <h5 class="">Member</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
