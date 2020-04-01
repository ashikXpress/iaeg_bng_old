@extends('layouts.admin')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Create Slider</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @if (count($errors) > 0)

                        <div class="alert alert-danger">


                            <p><strong>Whoops!</strong><br> There were some problems with your input.</p>

                            <ul>

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                        <form action="{{route('slider.form')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" placeholder="Enter Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="sub_title" placeholder="Enter Sub Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="number" name="sort" placeholder="Sort" class="form-control">
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
