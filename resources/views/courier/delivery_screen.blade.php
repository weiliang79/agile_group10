<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Sender homepage</title>
    <link rel="stylesheet" href="style.css">
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
        <form class="center" action="{{ route('parcel.delivered') }}" method="POST" >
        @csrf

            <hr>

            <div>
            <label for="tracking">Tracking Number: {{$tracking_number}}</label>
            </div>
            <hr>

            <div>
                <label for="recepient">Receiver name:</label>
                <input type="text" name="tracking_number" value={{$tracking_number}} readonly>
                <input type="text" name="receiver_name" id="receiver_name" required>
            </div>

            <input type="submit" value="Submit">

      

        </form>

    </main>
</body>

</html>