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
        <form class="center">

            <hr>

            <div>
            <label for="tracking">Tracking Number: {{$parcel_id}}</label>
            </div>
            <hr>

            <div>
                <label for="recepient">Receiver name:</label>
                <input type="text" name="receiver_name" id="receiver_name" required>
            </div>

            <input type="submit" value="Submit">
      

        </form>

    </main>
</body>

</html>