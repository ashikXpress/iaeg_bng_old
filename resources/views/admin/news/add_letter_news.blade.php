@extends('layouts.admin')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Create News Letter</h4>
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

                        <form action="{{route('news.letter.save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" value="{{old('title')}}" placeholder="Enter Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="category">
                                    <option value="2">News Letter</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose News Letter File</label>
                                </div>
                            </div>
                            <div class="form-group">

                                <textarea placeholder="Enter Description" class="form-control" name="description" id="description" rows="5">{{old('description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{old('date')}}" name="date" placeholder="Enter Date" id="datepicker" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('all.news.letter')}}" class="btn iq-bg-danger">cancel</a>

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection
