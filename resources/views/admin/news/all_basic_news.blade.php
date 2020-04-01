@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <div class="card-title">
                            <div class="pull-left">
                                <h4>All Basic News</h4>
                            </div>
                            <div class="pull-right">

                                @can('user-create')

                                    <a class="btn btn-primary" href="{{ route('basic.news.form') }}"> Create New Basic News</a>

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
                            <th>Name</th>
                            <th>Posted by</th>
                            <th>Date</th>
                            <th width="280px">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($news as $item)

                            <tr>

                                <td>{{   $loop->iteration }}</td>

                                <td><img width="150px" height="100px" src="{{asset($item->image_or_file)}}" alt=""></td>

                                <td>{{ $item->title }}</td>
                                <td>{{ $item->userName->name }}</td>
                                <td>{{ date('D M Y',strtotime($item->upload_date)) }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('basic.news.edit', $item->id) }}">Edit</a>
                                    <a href="#" onclick="return checkDelete('{{route('basic.news.delete',$item->id)}};')" class="btn btn-danger">Delete</a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                    {{$news->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection
