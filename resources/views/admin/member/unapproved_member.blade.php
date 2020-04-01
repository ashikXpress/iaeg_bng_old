@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <div class="card-title">
                            <div class="pull-left">
                                <h4>All Unapproved Member</h4>
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
                            <th>Type</th>
                            <th>Payment Info</th>
                            <th width="280px">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($members as $member)

                            <tr>

                                <td>{{   $loop->iteration }}</td>

                                <td><img style="width: 80px;height: 80px;object-fit: contain" src="{{ asset($member->profile_image) }}" alt=""></td>

                                <td>{{ $member->first_name.' '.$member->middle_name.' '.$member->last_name }}</td>
                                <td>{{$member->memberType->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btnView" data-id="{{ $member->id }}">View</button>

                                </td>

                                <td>
                                    <a class="btn btn-success" href="{{ route('approved.member', $member->id) }}">Approved</a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                    {{$members->links()}}
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
                                <th>TrxID</th>
                                <th>Bank Cheque</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td id="amount"></td>
                            <td id="paymentMethod"></td>
                            <td id="trxID"></td>
                            <td>
                                <a id="chequeAnchor" href="#" target="_blank"><img width="150" id="cheque" src="" alt="cheque"></a>
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
        $(function() {
            $('.btnView').click(function () {
                var id = $(this).data('id');

                $.ajax({
                    method: "GET",
                    url: "{{route('member.payment.details')}}",
                    data: { id: id }
                }).done(function( data ) {
                    $('#paymentModal').modal('show');

                    $('#amount').html(data.amount);
                    $('#paymentMethod').html(data.payment_method);
                    $('#trxID').html(data.TrxID);

                    if (data.payment_method == 'bank') {
                        $('#cheque').attr('src', data.bank_cheque);
                        $('#chequeAnchor').attr('href', data.bank_cheque);
                        $('#chequeAnchor').show();
                    } else {
                        $('#chequeAnchor').hide();
                    }
                });
            });
        });
    </script>
@endsection

