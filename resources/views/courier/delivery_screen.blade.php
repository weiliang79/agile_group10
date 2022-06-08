@extends('layout.app')

@section('content')

@include('layout.navbars.topnav')

<div class="container-fluid py-5" style="background-color: black;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form action="{{ route('courier.deliver_screen_submit') }}" method="post">
                            @csrf

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Delivery Screen</h5>

                            @if($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            <div class="d-flex justify-content-center pb-3">
                                <table>
                                    <tr>
                                        <td style="width: 10rem">Tracking Number:</td>
                                        <td>{{ $parcel->tracking_number }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10rem">Recipient Name:</td>
                                        <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10rem">Address:</td>
                                        <td>{{ $parcel->recipient_address }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10rem">Postcode:</td>
                                        <td>{{ $parcel->recipient_postcode }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10rem">Phone:</td>
                                        <td>{{ $parcel->recipient_phone }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="form-outline mb-4">
                                <input class="form-control form-control-lg {{ $errors->has('receiver_name') ? 'is-invalid' : '' }}" type="text" id="receiverName" name="receiver_name" placeholder="Receiver Name" value="{{ old('receiver_name') }}">
                            </div>

                            <div class="form-outline mb-4">
                                <canvas></canvas>
                            </div>

                            <input type="hidden" name="tracking_number" value="{{ $parcel->tracking_number }}" readonly required>
                            <input type="hidden" name="location" readonly required>
                            <input type="hidden" name="signature" readonly required>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit">Submit</button>
                                <button id="clearButton" class="btn btn-dark btn-lg btn-block" type="button">Clear</button>
                            </div>

                        </form>

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
    // time wasted doing this dumb locationString things: 6 hours
    async function getLocationString() {
        let locationString = 0

        var options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
        }

        function getPosition(options) {
            return new Promise((resolve, reject) => {
                navigator.geolocation.getCurrentPosition(resolve, reject, options)
            })
        }

        try {
            const position = await getPosition(options);
            const coordinate = position.coords
            locationString = `${coordinate.latitude}, ${coordinate.longitude}`
        } catch (err) {
            console.error(err.message);
            alert("Allow location permission to submit!")
            return null
        }

        console.log(locationString)
        return locationString
    }

    window.onload = () => {
        const form = document.querySelector('form')
        form.addEventListener('submit', async (event) => {
            event.preventDefault()

            let locationString = await getLocationString()
            if (!locationString) {
                return
            }
            document.querySelector('input[name="location"]')
                .value = locationString

            const dataUrl = signaturePad.toDataURL("image/svg+xml")
            const svgData = window.atob(dataUrl.split(',')[1])
            const SVG_LENGTH_WHEN_SIGNATURE_EMPTY = 140
            if (svgData.length < SVG_LENGTH_WHEN_SIGNATURE_EMPTY) {
                alert("Signature cannot be empty")
                return
            }
            document.querySelector('input[name="signature"]')
                .value = svgData

            form.submit()
        })
    }

    //https://github.com/szimek/signature_pad
    const canvas = document.querySelector("canvas");
    const signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(204, 204, 204)',
    });
    signaturePad.on();

    function resizeCanvas() {
        var ratio = Math.max(window.devicePixelRatio || 1, 1);

        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);

        signaturePad.clear();
    }
    window.onresize = resizeCanvas;
    resizeCanvas();

    var clearButton = document.getElementById('clearButton');
    var receviverName = document.getElementById('receiverName');

    clearButton.addEventListener('click', function (event) {
        signaturePad.clear();
        receviverName.value = "";
    });
</script>
@endpush