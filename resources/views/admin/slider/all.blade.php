@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <div class="card-title">
                            <div class="pull-left">
                                <h4>All Slider</h4>
                            </div>
                            <div class="pull-right">

                                @can('user-create')

                                    <a class="btn btn-primary" href="{{ route('slider.form') }}"> Create New Slider</a>

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
                            <th>Sub Title</th>
                            <th>Sort</th>
                            <th width="280px">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sliders as $slider)

                            <tr>

                                <td>{{   $loop->iteration }}</td>

                                <td><img width="150px" src="{{ asset($slider->image) }}" alt=""></td>

                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->sub_title }}</td>
                                <td>{{ $slider->sort }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('slider.edit', $slider->id) }}">Edit</a>
                                    <a href="#" class="btn btn-danger" onclick="return checkDelete('{{route('slider.delete',$slider->id)}};')">Delete</a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                    {{$sliders->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection

