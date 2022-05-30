@extends('layout.app')

@section('content')

@include('layout.navbars.topnav')

<div class="container-fluid py-5" style="background-color: black;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form action="{{ route('normal_user.save_parcel') }}" method="post">
                            @csrf

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">New Parcel Info</h5>

                            @if($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            <div class="form-outline mb-4">
                                <input class="form-control form-control-lg {{ $errors->has('sender_address') ? 'is-invalid' : '' }}" type="text" name="sender_address" placeholder="Sender Address" value="{{ old('sender_address') }}">
                            </div>

                            <div class="form-outline mb-4">
                                <input class="form-control form-control-lg {{ $errors->has('sender_postcode') ? 'is-invalid' : '' }}" type="text" name="sender_postcode" placeholder="Sender Postcode" value="{{ old('sender_postcode') }}">
                            </div>

                            <div class="form-outline mb-4">
                                <input class="form-control form-control-lg {{ $errors->has('recipient_firstname') ? 'is-invalid' : '' }}" type="text" name="recipient_firstname" placeholder="Recipient First Name" value="{{ old('recipient_firstname') }}">
                            </div>

                            <div class="form-outline mb-4">
                                <input class="form-control form-control-lg {{ $errors->has('recipient_lastname') ? 'is-invalid' : '' }}" type="text" name="recipient_lastname" placeholder="Recipient Last Name" value="{{ old('recipient_lastname') }}">
                            </div>

                            <div class="form-outline mb-4">
                                <input class="form-control form-control-lg {{ $errors->has('recipient_address') ? 'is-invalid' : '' }}" type="text" name="recipient_address" placeholder="Recipient Address" value="{{ old('recipient_address') }}" autocomplete="address-line1">
                            </div>

                            <div class="form-outline mb-4">
                                <input class="form-control form-control-lg {{ $errors->has('recipient_postcode') ? 'is-invalid' : '' }}" type="text" name="recipient_postcode" placeholder="Recipient Postcode" value="{{ old('recipient_postcode') }}" autocomplete="postal-code">
                            </div>

                            <div class="form-outline mb-4">
                                <input class="form-control form-control-lg {{ $errors->has('recipient_phone') ? 'is-invalid' : '' }}" type="text" name="recipient_phone" placeholder="Recipient Phone" value="{{ old('recipient_phone') }}">
                            </div>

                            <div class="form-outline mb-4">
                                <input class="form-control form-control-lg {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="text" name="weight" placeholder="Parcel Weight" value="{{ old('weight') }}">
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5" style="background-color: green;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">List of Parcel Status</h5>

                            <table class="table align-items-center table-flush showDataTable">
                                <thead>
                                    <tr>
                                        <th>Tracking Number</th>
                                        <th>Recipient Name</th>
                                        <th>Recipient Address</th>
                                        <th>Recipient Phone</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($parcels as $parcel)
                                    <tr>
                                        <td>{{ $parcel->tracking_number }}</td>
                                        <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                        <td>{{ $parcel->recipient_address }}</td>
                                        <td>{{ $parcel->recipient_phone }}</td>
                                        @if($parcel->status == 1)
                                        <td>Pending</td>
                                        @elseif($parcel->status == 2)
                                        <td>In Transit</td>
                                        @elseif($parcel->status == 3)
                                        <td>Delivered</td>
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
</div>

@include('layout.navbars.footer')

@endsection