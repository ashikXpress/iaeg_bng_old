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
                        <h4 class="card-title">Role Management
                            <div class="pull-right">

                                @can('role-create')

                                    <a class="btn btn-primary" href="{{ route('roles.create') }}"> Create New Role</a>

                                @endcan

                            </div>
                        </h4>

                    </div>
                </div>
                <div class="iq-card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>

                                <td scope="row">{{ ++$i }}</td>

                                <td>{{ $role->name }}</td>

                                <td>
                                    @can('role-edit')

                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>

                                    @endcan


{{--                                    @can('role-delete')--}}
{{--                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}--}}

{{--                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}

{{--                                        {!! Form::close() !!}--}}

{{--                                    @endcan--}}


                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    {!! $roles->render() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
