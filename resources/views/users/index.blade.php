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
                        <div class="card-title">
                            <h4 class="pull-left">Admin Management </h4>
                            <div class="pull-right">

                                @can('user-create')

                                    <a class="btn btn-primary" href="{{ route('users.create') }}"> Create New Admin</a>

                                @endcan

                            </div>
                        </div>

                    </div>
                </div>
                <div class="iq-card-body">
                    <table class="table">
                        <thead>
                        <tr>

                            <th>No</th>

                            <th>Name</th>

                            <th>Email</th>

                            <th>Roles</th>

                            <th width="280px">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $user)

                            <tr>

                                <td>{{ ++$i }}</td>

                                <td>{{ $user->name }}</td>

                                <td>{{ $user->email }}</td>

                                <td>

                                    @if(!empty($user->getRoleNames()))

                                        @foreach($user->getRoleNames() as $v)

                                            <label class="badge badge-success">{{ $v }}</label>

                                        @endforeach

                                    @endif

                                </td>

                                <td>
                                    @can('user-edit')
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                    @endcan

                                    @can('user-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                            @if(Auth::user()->id!=$user->id)
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            @endif
                                    @endcan


                                    {!! Form::close() !!}


                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                        {!! $data->render() !!}
                </div>
            </div>
        </div>
    </div>


@endsection
