@extends('layout.app')

@section('content')
    @include('layout.navbars.topnav')

    <div class="container-fluid py-5" style="background-color: lightblue;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Parcel Request Reject</h5>
                            <form action="{{ route('courier.parcel_request_respond') }}" method="GET">
                                <div class="mb-3">
                                    <label for="parcelRejectReason" class="form-label">Please fill reject reason</label>
                                    <input type="text" class="form-control" id="parcelRejectReason" name="reason">
                                </div>
                                <input type="text" name="action" value="reject" hidden>
                                <input type="text" name="request_id" value="{{ $request_id }}" hidden>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('layout.navbars.footer')
@endsection
