@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <div class="card-title">
                            <h4 class="pull-left">All Gallery</h4>
                            <div class="pull-right">

                                @can('user-create')

                                    <a class="btn btn-success" href="{{ route('add_slider') }}"> Create New Slider</a>

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

                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th width="280px">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($galleries as $gallery)

                            <tr>

                                <td>{{   $loop->iteration }}</td>

                                <td><img width="150px" src="{{ $gallery->image }}" alt=""></td>

                                <td>{{ $gallery->title }}</td>
                                <td>{{ $gallery->category }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('gallery.edit', $gallery->id) }}">Edit</a>
                                    <a href="{{route('gallery.delete',$gallery->id) }}" class="btn btn-danger">Delete</a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                    {{$galleries->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection
