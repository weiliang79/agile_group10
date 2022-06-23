@extends('layout.app')

@section('content')
@include('layout.navbars.topnav')

<div class="container-fluid py-5" style="background-color: lightblue;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Couriers with parcel in transit</h5>
                        <table class="table align-items-center table-flush showDataTable">
                            <thead>
                                <tr>
                                    <th>Courier Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Number of parcel (In Transit)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($couriers as $courier)
                                <tr style="transform: rotate(0);">
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_in_transit_single', ['courier_id' => $courier->id]) }}">{{ $courier->first_name }} {{ $courier->last_name }}</td>
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_in_transit_single', ['courier_id' => $courier->id]) }}">{{ $courier->email }}</td>
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_in_transit_single', ['courier_id' => $courier->id]) }}">{{ $courier->phone }}</td>
                                    <td onclick="openURL(this)" data-url="{{ route('manager.tracking_in_transit_single', ['courier_id' => $courier->id]) }}">{{ $courier->courier_parcel->where('status', 3)->count() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div style="min-height: 260px;"></div>

        @include('layout.navbars.footer')
        @endsection

        @push('js')
        <script>
            function openURL(item) {
                window.location = $(item).data('url');
            }
        </script>
        @endpush