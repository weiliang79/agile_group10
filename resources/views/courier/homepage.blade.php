@extends('layout.app')

@section('content')

@include('layout.navbars.topnav')

<div class="container-fluid py-3">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-lg-5 text-black">

                        <form action="{{ route('courier.update_parcel') }}" method="post">
                            @csrf

                            <h5 class="fw-normal mb-3" style="letter-spacing: 1px;">Tracking Number</h5>

                            @if($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            <div class="mb-2">
                                <input class="form-control{{ $errors->has('tracking_number') ? 'is-invalid' : '' }}" type="text" name="tracking_number" placeholder="Tracking Number" value="{{ old('tracking_number') }}">
                            </div>

                            
                                <button class="btn btn-dark mt-2 py-2 px-2" type="submit">Submit</button>
                            

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('layout.navbars.footer')

@endsection