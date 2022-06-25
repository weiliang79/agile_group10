@extends('layout.app')

@section('content')
    @include('layout.navbars.topnav')

    <div class="container-fluid py-5" style="background-color: lightblue;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Parcel Requests</h5>

                            <table class="table align-items-center table-flush showDataTable">
                                <thead>
                                    <tr>
                                        <th>Tracking Number</th>
                                        <th>Recipient Name</th>
                                        <th>Recipient Address</th>
                                        <th>Recipient Postcode</th>
                                        <th>Recipient Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($parcelRequests as $request)
                                        <tr>
                                            <td>{{ $request->parcel->tracking_number }}</td>
                                            <td>{{ $request->parcel->recipient_firstname }}</td>
                                            <td>{{ $request->parcel->recipient_address }}</td>
                                            <td>{{ $request->parcel->recipient_postcode }}</td>
                                            <td>{{ $request->parcel->recipient_phone }}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    style="padding: 0.375rem 0.75rem; border: 1px; margin: 4px 2px"
                                                    href="{{ route('courier.parcel_request_respond', ['action' => 'accept', 'request_id' => $request]) }}">Accept</a>
                                                <a class="btn btn-danger"
                                                    style="padding: 0.375rem 0.75rem; border: 1px; margin: 4px 2px"
                                                    href="{{ route('courier.parcel_request_form', ['request_id' => $request]) }}">Reject</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('layout.navbars.footer')
@endsection
