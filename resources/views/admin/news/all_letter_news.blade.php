@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <div class="card-title">
                            <div class="pull-left">
                                <h4>All News Letter</h4>
                            </div>
                            <div class="pull-right">

                                @can('user-create')

                                    <a class="btn btn-primary" href="{{ route('news.letter.form') }}"> Create New News Letter</a>

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
                            <th>File</th>
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

                                <td><a class="btn btn-success" target="_blank" href="{{asset($item->image_or_file)}}">File Download</a></td>

                                <td>{{ $item->title }}</td>
                                <td>{{ $item->userName->name }}</td>
                                <td>{{ date('D M Y',strtotime($item->upload_date)) }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('news.letter.edit', $item->id) }}">Edit</a>
                                    <a href="#" onclick="return checkDelete('{{route('news.letter.delete',$item->id)}};')" class="btn btn-danger">Delete</a>


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
