@extends('layouts.admin')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <div class="card-title">
                            <h4 class="pull-left">Show Role</h4>
                            <div class="pull-right">

                                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="iq-card-body">
                    <h5>Name  <strong>{{ $role->name }}</strong></h5>
                    <strong>Permissions:</strong>
                    <ul class="list-group">
                        @if(!empty($rolePermissions))

                            @foreach($rolePermissions as $v)
                                <li class="list-group-item text-success">{{ $v->name }}</li>
                            @endforeach

                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>



@endsection
