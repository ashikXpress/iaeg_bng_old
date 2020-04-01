@extends('layouts.admin')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Create Admin</h4>
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

                        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

                        </div>
                        <div class="form-group">
                            <strong>Confirm:</strong>

                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

                        </div>
                        <div class="form-group">
                            <strong>Confirm Password:</strong>

                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

                        </div>
                            <div class="form-group">
                                <strong>Role:</strong>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control',)) !!}
                            </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('users.index') }}" class="btn iq-bg-danger">cancel</a>

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
