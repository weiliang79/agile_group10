<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Sender homepage</title>
    <link rel="stylesheet" href="{{ url('/') }}/style.css">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
</head>

<body class="center">
    <header>
        <h2>Delivery Screen</h2>

        <nav>
            <li><a href="#">Home</a></li>
            <li><a href="#">nav 2</a></li>
            <li><a href="#">nav 3</a></li>
            <li><a href="#">nav 4</a></li>
        </nav>
    </header>

    <main>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <h1 class="page-title">Tracking Number</h1>
        <form class="center" action="{{ route('courier.deliver_parcel') }}" method="POST">
            @csrf

            <hr>

            <p>Tracking Number: {{ $parcel->tracking_number }}</p>

            <hr>

            <div>
                <label for="recepient_name"> Recepient Name:</label>
                <input type="text" name="recipient_name" id="recepient_name" required>
            </div>
            <canvas></canvas>
            <input type="hidden" name="tracking_number" value="{{ $parcel->tracking_number }}" readonly required>
            <input type="hidden" name="location" readonly required>
            <input type="hidden" name="signature" readonly required>

            <input type="submit" value="Submit">
        </form>

    </main>

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
        const signaturePad = new SignaturePad(canvas);
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
    </script>
</body>

</html>
