@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <div class="card-title">
                            <div class="pull-left">
                                <h4>All Event</h4>
                            </div>
                            <div class="pull-right">

                                @can('user-create')

                                    <a class="btn btn-primary" href="{{ route('event.form') }}"> Create New Event</a>

                                @endcan

                            </div>
                        </div>

                    </div>
                </div>
                <div class="iq-card-body">
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success">

                            <p>{{ $message }}</p>

                        </div>

                    @endif
                    <table class="table">
                        <thead>
                        <tr>

                            <th>No</th>
                            <th>Name</th>
                            <th>Venue</th>
                            <th>Session</th>
                            <th>Start to End</th>
                            <th>Event Category</th>
                            <th width="280px">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $event)

                            <tr>

                                <td>{{   $loop->iteration }}</td>

                                <td>{{ $event->name }}</td>
                                <td>{{ $event->venue }}</td>
                                <td>{{ $event->session }}</td>
                                <td width="180px">{{ date('d M y, h:m A',strtotime($event->start_date)) .' to '.date('d M y, h:m A',strtotime($event->end_date))}}</td>
                                <td>{{ $event->categoryName->name }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('event.edit', $event->id) }}">Edit</a>

                                    <a href="#" onclick="return checkDelete('{{route('event.delete',$event->id)}};')" class="btn btn-danger">Delete</a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                    {{$events->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection
