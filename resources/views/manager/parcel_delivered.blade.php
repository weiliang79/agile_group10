@extends('layout.app')

@section('content')

@include('layout.navbars.topnav')

<div class="container-fluid py-5" style="background-color: lightblue;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">List of Parcel Delivered</h5>

                        <table class="table align-items-center table-flush showDataTable">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Address</th>
                                    <th>Recipient Postcode</th>
                                    <th>Recipient Phone</th>
                                    <th>Courier Name</th>
                                    <th>Date Created</th>
                                    <th>Date Delivered</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($parcels as $parcel)
                                <tr>
                                    <td>{{ $parcel->tracking_number }}</td>
                                    <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                    <td>{{ $parcel->recipient_address }}</td>
                                    <td>{{ $parcel->recipient_postcode }}</td>
                                    <td>{{ $parcel->recipient_phone }}</td>
                                    <td>{{ $parcel->courier->first_name }} {{ $parcel->courier->last_name }}</td>
                                    <td>{{ $parcel->created_at->format('d\/m\/y g:i A') }}</td>
                                    <td>{{ $parcel->details()->where('status', 4)->first()->created_at->format('d\/m\/y g:i A') }}</td>
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