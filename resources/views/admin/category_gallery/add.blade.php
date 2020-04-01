@extends('layouts.admin')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Create Gallery Category</h4>
                    </div>
                </div>
                <div class="iq-card-body">

                    @if ($message = Session::get('success'))

                        <div class="alert alert-success">

                            <p>{{ $message }}</p>

                        </div>

                    @endif
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

                        <form action="{{route('gallery.category.save')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" value="{{old('name')}}" name="name" placeholder="Enter Name" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('gallery.category.form')}}" class="btn iq-bg-danger">cancel</a>

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection
