<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Sender homepage</title>
    <link rel="stylesheet" href="style.css">
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
                    // stop form submission
                    return
                }
                document.querySelector('input[name="location"]')
                    .value = locationString
                
                document.querySelector('input[name="signature"]')
                    .value = "svg data svg data svg data svg data svg data svg data"
                form.submit()
            })
        }
    </script>
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
        <h1 class="page-title">Tracking Number</h1>
        <form class="center" action="{{ route('parcel.delivered') }}" method="POST">
            @csrf

            <hr>

            <p>Tracking Number: {{ $tracking_number }}</p>
            <hr>

            <div>
                <label for="recepient_name"> Recepient Name:</label>
                <input type="text" name="recipient_name" id="recepient_name" required>
                <input type="hidden" name="tracking_number" value={{ $tracking_number }} readonly required>
                <input type="hidden" name="location" readonly required>
                <input type="hidden" name="signature" readonly required>
            </div>

            <input type="submit" value="Submit">



        </form>

    </main>
</body>

</html>
