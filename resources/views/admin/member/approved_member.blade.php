@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <div class="card-title">
                            <div class="pull-left">
                                <h4>All Approved Member</h4>
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
                            <th>Membership</th>
{{--                            <th width="280px">Action</th>--}}

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($members as $member)

                            <tr>

                                <td>{{   $loop->iteration }}</td>

                                <td><img style="width: 80px;height: 80px;object-fit: contain" src="{{ asset($member->profile_image) }}" alt=""></td>

                                <td>{{ $member->first_name.' '.$member->middle_name.' '.$member->last_name }}</td>
                                <td>{{$member->memberType->name}}</td>

{{--                                <td>--}}
{{--                                    <a class="btn btn-info" href="{{ route('member.suspend', $member->id) }}">Suspend</a>--}}

{{--                                </td>--}}

                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                    {{$members->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection

