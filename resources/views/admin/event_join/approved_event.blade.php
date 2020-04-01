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
                            <div class="pull-left">
                                <h4>All Approved Event List</h4>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="iq-card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>

                            <th>No</th>
                            <th>Event Name</th>
                            <th>Event Type</th>
                            <th>Category</th>
                            <th>Participate Name</th>
                            <th>Event Document</th>
                            <th>Membership</th>
                            <th>Mail Send</th>


                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $sl = 1;
                            @endphp

                            @foreach($events as $event)
                                @foreach ($event->members()->wherePivot('payment_status', 1)->get() as $member)
                                    <tr>
                                        @if ($loop->first)
                                            <td rowspan="{{ count($event->members) }}">{{ $sl++ }}</td>
                                            <td rowspan="{{ count($event->members) }}">{{ $event->name }}</td>
                                            <td rowspan="{{ count($event->members) }}">{{ $event->categoryName->name }}</td>
                                        @endif

                                        <td>{{ $member->pivot->exhibition_category }}</td>
                                        <td width="25%"><a href="#" onclick="get_member('{{$member->id}}')">{{ $member->first_name.' '.$member->middle_name.' '.$member->last_name }}</a></td>
                                        <td width="10%">
                                            @if($event->categoryName->id==1)
                                                <button type="button" class="btn btn-primary" onclick="get_view('{{$member->id}}','{{$event->id}}')">Info</button>

                                            @endif
                                        </td>
                                        <td width="10%">{{ $member->memberType->name}}</td>
                                        <td width="10%">
                                            <button type="button" class="btn btn-primary btnView" data-id="{{ $member->id }}">Mail</button>

                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                        {{$events->links()}}
                        </tfoot>
                    </table>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="member_mail" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mail Send</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('event.participate.reply.mail')}}" method="post">
                    @csrf
                <div class="modal-body">
                        <textarea id="member_message" name="message" required placeholder="Type Message" class="form-control"></textarea>
                    <input type="hidden" id="member_id" name="member_id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
             </form>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="documentModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Technical Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Paper Name</th>
                            <th>Author Affiliation</th>
                            <th>Corresponding Email</th>
                            <th>Abstract Document</th>
                            <th>Presentation ppt</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td id="paper_title"></td>
                            <td id="author_affiliation"></td>
                            <td id="corresponding_email"></td>
                            <td><a target="_blank" id="abstract_doc_file" href="#">doc download</a></td>
                            <td><a target="_blank" id="presentation_ppt_file" href="#">ppt download</a></td>

                        </tr>
                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="memberDetails" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Mobile Number</th>
                            <th>Photo</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td id="member_email"></td>
                            <td id="contact_address"></td>
                            <td id="member_mobile"></td>
                            <td><img width="100" id="member_img" src="" alt="img"></td>

                        </tr>
                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('additionalJS')
    <script>
        $(function() {
            $('.btnView').click(function () {
                var id = $(this).data('id');

                $('#member_id').val(id);
                $('#member_message').val('');

                $('#member_mail').modal('show');
            });
        });
        function get_view(member_id,event_id) {


            var member_id=member_id;
            var event_id=event_id;

            $.ajax({
                method: "GET",
                url: "{{route('event.document.details')}}",
                data: {member_id: member_id,event_id:event_id}
            }).done(function (data) {
                $('#documentModal').modal('show');


                $('#paper_title').html(data.paper_title);
                $('#author_affiliation').html(data.author_affiliation);
                $('#corresponding_email').html(data.corresponding_email);

                $('#abstract_doc_file').attr('href',data.abstract_doc_file);
                $('#presentation_ppt_file').attr('href',data.presentation_ppt_file);


            });
        }


function get_member(member_id) {
    var member_id=member_id;


    $.ajax({
        method: "GET",
        url: "{{route('event.member.details')}}",
        data: {member_id: member_id}
    }).done(function (data) {
        $('#memberDetails').modal('show');

        $('#member_email').html(data.email);
        $('#member_mobile').html(data.mobile_number);
        $('#contact_address').html(data.contact_address);

        $('#member_img').attr('src',data.profile_image);


    });
}


    </script>
@endsection
