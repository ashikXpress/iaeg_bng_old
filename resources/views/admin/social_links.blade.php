@extends('layouts.admin')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Social Links</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success">

                            <p>{{ $message }}</p>

                        </div>

                    @endif

                        <form action="{{route('social.links.update',$links->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" value="{{$links->facebook}}" name="facebook" placeholder="Facebook Links" class="form-control">
                                <span class="text text-danger">{{$errors->first('facebook')}}</span>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$links->twitter}}" name="twitter" placeholder="Twitter Links" class="form-control">
                                <span class="text text-danger">{{$errors->first('twitter')}}</span>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$links->youtube}}" name="youtube" placeholder="Youtube Links" class="form-control">
                                <span class="text text-danger">{{$errors->first('youtube')}}</span>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$links->linkend}}" name="linkend" placeholder="Linkend Links" class="form-control">
                                <span class="text text-danger">{{$errors->first('linkend')}}</span>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$links->google_plus}}" name="google_plus" placeholder="Google Plus Links" class="form-control">
                                <span class="text text-danger">{{$errors->first('google_plus')}}</span>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$links->instragram}}" name="instragram" placeholder="Instragram Links" class="form-control">
                                <span class="text text-danger">{{$errors->first('instrsgram')}}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('dashboard')}}" class="btn iq-bg-danger">cancel</a>

                            </div>
                          </form>

                </div>
            </div>
        </div>
    </div>

@endsection

