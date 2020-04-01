@extends('layouts.admin')
@section('content')
    <div class="row">
        @include('layouts.assets.message')
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Add New Member</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <form action="{{route('add.member.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="first_name" placeholder="First name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="middle_name" placeholder="Middle name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" placeholder="Last name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="designation" placeholder="Designation" class="form-control">
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Slider Image</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('all.slider')}}" class="btn iq-bg-danger">cancel</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
