@extends('layouts.admin')
@section('content')

    <div class="row row-eq-height">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="iq-card iq-border-radius-20">
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <h5 class="text-primary card-title"><i class="ri-pencil-fill"></i> Reply Message</h5>
                                </div>
                            </div>
                            <form class="email-form" method="post" action="{{route('contact.mail.reply.send')}}">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">To:</label>
                                    <div class="col-sm-10">
                                        <input name="email" id="email" value="{{$mail->email}}" type="email" class="form-control" placeholder="Email">
                                        <span class="alert text-danger">{{$errors->first('email')}}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="subject" class="col-sm-2 col-form-label">Subject:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="subject" placeholder="Subject" name="subject" class="form-control">
                                        <span class="alert text-danger">{{$errors->first('subject')}}</span>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="message" class="col-sm-2 col-form-label">Your Message:</label>
                                    <div class="col-md-10">
                                        <textarea id="message" name="message" class="textarea form-control" rows="5" placeholder="Message"></textarea>
                                        <span class="alert text-danger">{{$errors->first('message')}}</span>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <div class="send-btn pl-3">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                            <a href="{{route('all.contact.mail')}}" class="btn iq-bg-danger">cancel</a>

                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
