@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Edit Admin Role</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @if (count($errors) > 0)

                        <div class="alert alert-danger">

                            <strong>Whoops!</strong> There were some problems with your input.<br><br>

                            <ul>

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif
                        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

                        <div class="form-group">
                            {!! Form::text('name', null, array('placeholder' => 'Role Name','class' => 'form-control col-md-6')) !!}

                        </div>
                    <strong>Permission</strong><br>

                        @foreach($permission as $value)
                            <span><strong>{{$loop->iteration}}</strong></span>

                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}

                                {{ $value->name }}</label>

                            <br/>

                        @endforeach

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('roles.index') }}" class="btn iq-bg-danger">cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>



@endsection

