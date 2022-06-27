@extends('layout.app')

@section('content')

@include('layout.navbars.topnav')

<div class="container-fluid py-5" style="background-color: lightblue;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"> List of parcel not pickup</h5>

                        <table class="table align-items-center table-flush showDataTable">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Address</th>
                                    <th>Recipient Postcode</th>
                                    <th>Recipient Phone</th>
                                    <th>Date Created</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($notPickUp as $parcel)
                                <tr>
                                    <td>{{ $parcel->tracking_number }}</td>
                                    <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                    <td>{{ $parcel->recipient_address }}</td>
                                    <td>{{ $parcel->recipient_postcode }}</td>
                                    <td>{{ $parcel->recipient_phone }}</td>
                                    <td>{{ $parcel->created_at->format('d\/m\/y g:i A') }}</td>
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


<div class="container-fluid py-5" style="background-color: lightblue;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"> List of Parcel not Dispatched</h5>

                        <table class="table align-items-center table-flush showDataTable">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Address</th>
                                    <th>Recipient Postcode</th>
                                    <th>Recipient Phone</th>
                                    <th>Date Created</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($notDispatched as $parcel)
                                <tr>
                                    <td>{{ $parcel->tracking_number }}</td>
                                    <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                    <td>{{ $parcel->recipient_address }}</td>
                                    <td>{{ $parcel->recipient_postcode }}</td>
                                    <td>{{ $parcel->recipient_phone }}</td>
                                    <td>{{ $parcel->created_at->format('d\/m\/y g:i A') }}</td>
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

<div class="container-fluid py-5" style="background-color: lightblue;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">List of Parcel in Transit</h5>

                        <table class="table table-striped align-items-center table-flush showDataTable">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Recipient Name</th>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>Date Created</th>
                                    <th>Weight (Kg)</th>
                                    <th>Hours Elapsed</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($inTransit as $parcel)
                                <tr>
                                    <td>{{ $parcel->tracking_number }}</td>
                                    <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                    <td>{{ $parcel->recipient_address }}</td>
                                    <td>{{ $parcel->recipient_postcode }}</td>
                                    <td>{{ $parcel->created_at->format('d\/m\/y') }}</td>
                                    <td>{{ $parcel->weight }}</td>
                                    <td>{{ \Carbon\Carbon::now()->diffInHours($parcel->created_at) }} hour/s</td>
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

<div class="container-fluid py-5" style="background-color: lightblue;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">List of Parcel in Deliver</h5>

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
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($inDeliver as $parcel)
                                <tr>
                                    <td>{{ $parcel->tracking_number }}</td>
                                    <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                    <td>{{ $parcel->recipient_address }}</td>
                                    <td>{{ $parcel->recipient_postcode }}</td>
                                    <td>{{ $parcel->created_at->format('d\/m\/y') }}</td>
                                    <td>{{ $parcel->weight }}</td>
                                    <td>{{ $parcel->created_at->format('d\/m\/y g:i A') }}</td>
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
                                @foreach($delivered as $parcel)
                                <tr>
                                    
                                    <td>{{ $parcel->tracking_number }}</td>
                                    <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                    <td>{{ $parcel->recipient_address }}</td>
                                    <td>{{ $parcel->recipient_postcode }}</td>
                                    <td>{{ $parcel->created_at->format('d\/m\/y') }}</td>
                                    <td>{{ $parcel->weight }}</td>
                                    <td>{{ $parcel->elapsed_time }}</td>
                                    <td>{{ $parcel->details()->where('status', 5)->first()->created_at->format('d\/m\/y g:i A') }}</td>
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