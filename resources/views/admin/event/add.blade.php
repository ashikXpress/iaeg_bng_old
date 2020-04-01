@extends('layouts.admin')

@section('additionalCSS')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Create Event</h4>
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

                        <form action="{{route('event.save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" value="{{old('name')}}" name="name" placeholder="Enter Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{old('venue')}}" name="venue" placeholder="Enter Venue" class="form-control">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="session_year">
                                    <option value="">Select Session</option>
                                        <option {{ old('session_year') == '2020-2021'? 'selected' : '' }} value="2020-2021">2020-2021</option>
                                        <option {{ old('session_year') == '2021-2022'? 'selected' : '' }} value="2021-2022">2021-2022</option>
                                        <option {{ old('session_year') == '2023-2024'? 'selected' : '' }} value="2023-2024">2023-2024</option>


                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="event_category">
                                    <option value="">Select event category</option>
                                    @foreach($event_category as $category)
                                        <option {{ old('event_category') == $category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach


                                </select>
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="customFile" multiple>
                                    <label class="custom-file-label" for="customFile">Choose Multiple Event Image</label>
                                </div>
                            </div>
                            <div class="form-group row ml-0 mr-0">
                                <input type="text" value="{{old('start_date')}}" name="start_date" placeholder="Enter Start Date" id="datepicker" class="form-control col-md-5">
                                <input type="text" value="{{old('start_time')}}" name="start_time" placeholder="Enter Start Time" id="timepicker" class="form-control col-md-5 offset-1">

                            </div>
                            <div class="form-group row ml-0 mr-0">
                                <input type="text" value="{{old('end_date')}}" name="end_date" placeholder="Enter End Date" id="datepicker2" class="form-control col-md-5">
                                <input type="text" value="{{old('end_time')}}" name="end_time" placeholder="Enter End Time" id="timepicker2" class="form-control col-md-5 offset-1">

                            </div>

                            <div class="form-group">

                                <textarea placeholder="Enter Description" class="form-control" name="description" id="description" rows="5">{{old('description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('all.event')}}" class="btn iq-bg-danger">cancel</a>

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('additionalJS')
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#timepicker,#timepicker2').timepicker({});
        });
    </script>
@endsection
