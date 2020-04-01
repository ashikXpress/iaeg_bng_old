@extends('layouts.admin')
@section('additionalCSS')

@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-body p-0">
                    <div class="">
                        <div class="iq-email-to-list p-3">
                            <div class="d-flex justify-content-between">
                                <ul>
                                    <li class="mr-3">
                                        <a href="{{route('all.contact.mail')}}">
                                            <h5 class="m-0"><i class="ri-arrow-left-line"></i> Back</h5>
                                        </a>
                                    </li>
                                    <li><a href="{{route('contact.mail.reply',$mail->id)}}"><i class="fa fa-reply"></i></a></li>

                                </ul>

                            </div>
                        </div>
                        <hr class="mt-0">
                        <div class="iq-inbox-subject p-3">
                            <h5 class="mt-0">Send By: <strong>{{$mail->name}}</strong></h5>
                            <div class="iq-inbox-subject-info">
                                <div class="iq-subject-info">
                                    <div class="iq-subject-status align-self-center">
                                        <h6 class="mb-0"><a href="#">Subject: {{$mail->subject}}</a></h6>
                                    </div>
                                    <span class="float-right align-self-center">{{date('M d Y h:m a',strtotime($mail->created_at))}}</span>
                                </div>
                                <div class="iq-inbox-body mt-5">
                                    <p>{{$mail->message}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
