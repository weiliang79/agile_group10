@extends('layout.app')

@section('content')

@include('layout.navbars.topnav')

@if(!$flagged->isEmpty())
<div class="container-fluid py-5" style="background-color: lightblue;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Flagged List of parcel not pickup</h5>

                        <table class="table align-items-center table-flush showDataTable">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Address</th>
                                    <th>Recipient Postcode</th>
                                    <th>Recipient Phone</th>
                                    <th>Date Created</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($flagged as $parcel)
                                <tr>
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">{{ $parcel->tracking_number }}</td>
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">{{ $parcel->recipient_address }}</td>
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">{{ $parcel->recipient_postcode }}</td>
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">{{ $parcel->recipient_phone }}</td>
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">{{ $parcel->created_at->format('d\/m\/y') }}</td>
                                    @if($parcel->request()->whereIn('status', [1, 2, 3])->count() == 0)
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">Not assigned</td>
                                    @elseif($parcel->request()->orderBy('created_at', 'DESC')->first()->status == 1)
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">Pending</td>
                                    @elseif($parcel->request()->orderBy('created_at', 'DESC')->first()->status == 2)
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">Accepted</td>
                                    @elseif($parcel->request()->orderBy('created_at', 'DESC')->first()->status == 3)
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">Declined</td>
                                    @else
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]) }}">Error</td>
                                    @endif
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
@endif

<div class="container-fluid py-5" style="background-color: lightblue;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">List of Parcel not pickup</h5>

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
                                @foreach($parcels as $parcel)
                                <tr>
                                    <td>{{ $parcel->tracking_number }}</td>
                                    <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                    <td>{{ $parcel->recipient_address }}</td>
                                    <td>{{ $parcel->recipient_postcode }}</td>
                                    <td>{{ $parcel->recipient_phone }}</td>
                                    <td>{{ $parcel->created_at->format('d\/m\/y') }}</td>
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

@push('js')
<script>
    function openURL(item) {
        window.location = $(item).data('url');
    }
</script>
@endpush