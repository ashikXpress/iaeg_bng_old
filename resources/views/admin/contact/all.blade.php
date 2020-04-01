@extends('layouts.admin')
@section('additionalCSS')
    <style>
        .iq-email-content .iq-email-date {

            width: 120px;
        }
    </style>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12 mail-box-detail">
            <div class="iq-card">
                <div class="iq-card-body p-0">
                    <div class="">
                        <div class="iq-email-to-list p-3">
                            <div class="d-flex justify-content-between">
                              <h3>All Contact Mail</h3>
                            </div>
                            @if ($message = Session::get('success'))

                                <div class="alert alert-success">

                                    <p>{{ $message }}</p>

                                </div>

                            @endif
                        </div>
                        <div class="iq-email-listbox">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="mail-inbox" role="tabpanel">
                                    <ul class="iq-email-sender-list">
                                        @foreach($mails as $mail)
                                        <li class="iq-unread">
                                            <div class="d-flex align-self-center">
                                                <div class="iq-email-sender-info">
                                                    @if($mail->read_at==1)
                                                        <a href="{{route('contact.mail.view',$mail->id)}}"><span class="fa fa-envelope-open-o iq-star-toggle text-warning"></span></a>
                                                    @else
                                                        <a href="{{route('contact.mail.view',$mail->id)}}"><span class="fa fa-envelope-o iq-star-toggle text-primary"></span></a>

                                                    @endif

                                                        <a href="{{route('contact.mail.view',$mail->id)}}" class="iq-email-title">{{$mail->name}}</a>
                                                </div>

                                                <div class="iq-email-content">
                                                    <a href="{{route('contact.mail.view',$mail->id)}}" class="iq-email-subject">{{$mail->subject.'('.$mail->email.')'}}</a>
                                                    <div class="iq-email-date">{{$mail->created_at->diffForHumans()}}</div>
                                                </div>
                                                <ul class="iq-social-media">
                                                    <li><a onclick="return checkDelete('{{route('contact.mail.delete',$mail->id)}};')" href="#"><i class="fa fa-trash"></i></a></li>
                                                    <li><a href="{{route('contact.mail.view',$mail->id)}}"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="{{route('contact.mail.reply',$mail->id)}}"><i class="fa fa-reply"></i></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endforeach


                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="card card-footer" style="background: #fff;border-bottom-left-radius: 50%;border-bottom-right-radius: 50%;border-top: 1px solid #eef0f4;">
                    <div class="pull-right">
                        {{$mails->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
