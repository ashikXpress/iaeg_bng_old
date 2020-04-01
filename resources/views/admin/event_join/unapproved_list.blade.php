@extends('layouts.admin')

@section('content')
    @include('layouts.assets.message')
    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <div class="card-title">
                            <div class="pull-left">
                                <h4>All Unapproved Event Participant</h4>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="iq-card-body">
                    <table class="table">
                        <thead>
                        <tr>

                            <th>No</th>
                            <th>Participate Name</th>
                            <th>Membership</th>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Payment Info</th>
                            <th width="280px">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach($events as $event)

                            @foreach ($event->members()->wherePivot('payment_status', 0)->get() as $member)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td width="15%">{{ $member->first_name.' '.$member->middle_name.' '.$member->last_name }}</td>
                                    <td width="10%">{{ $member->memberType->name }}</td>
                                    <td width="40%">{{ $event->name }}</td>

                                    <td width="10%">{{date('d M Y',strtotime($member->pivot->date))}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btnView" onclick="get_view('{{$member->id}}','{{$event->id}}','{{$member->pivot->exhibition_category }}')">Info</button>

                                    </td>
                                    <td><a  class="btn btn-success" href="{{ route('approved.event.participate',['member'=>$member->id, 'event' => $event->id, 'category' => $member->pivot->exhibition_category != null ? $member->pivot->exhibition_category : 0]) }}">Approved</a>
                                    </td>

                                </tr>
                            @endforeach
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="paymentModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Amount</th>
                                <th>Payment Method Name</th>
                                <th>Event Category</th>
                                <th>TrxID</th>
                                <th>Bank Cheque</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td id="amount"></td>
                            <td id="paymentMethod"></td>
                            <td id="eventCategory"></td>
                            <td id="trxID"></td>
                            <td>
                                <a id="chequeAnchor" href="#" target="_blank"><img width="100" id="cheque" src="" alt="cheque"></a>
                            </td>
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
          function get_view(member_id,event_id,ex_category) {


               var member_id=member_id;
               var event_id=event_id;
               var ex_category=ex_category;


                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });

                $.ajax({
                    method: "GET",
                    url: "{{route('event.payment.details')}}",
                    data: {member_id: member_id,event_id:event_id,ex_category:ex_category}
                }).done(function (data) {

                    $('#paymentModal').modal('show');

                    $('#amount').html(data.amount);
                    $('#paymentMethod').html(data.payment_method);
                    $('#trxID').html(data.TrxID);
                    $('#eventCategory').html(data.exhibition_category);

                    if (data.payment_method == 'bank') {
                        $('#cheque').attr('src', data.bank_cheque);
                        $('#chequeAnchor').attr('href',data.bank_cheque);
                        $('#chequeAnchor').show();
                    } else {
                        $('#chequeAnchor').hide();
                    }
                });
            }

    </script>
@endsection

