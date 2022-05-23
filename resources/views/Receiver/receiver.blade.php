<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Sender homepage</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="center">
    <header>
        <h2>Courier Homepage</h2>

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
            <label for="tracking">Tracking Number:</label>
            </div>

            <div>
            <label for="weight">Weight:</label>
            </div>


            <hr>

            <div>
            <label for="sender">Sender Name:</label>
            </div>

            <div>
            <label for="sender">Sender Address:</label>
            </div>

            <div>
            <label for="sender">Sender Postcode:</label>
            </div>

            <hr>

            <div>
            <label for="recipient">Receipient Name:</label>
            </div>

            <div>
            <label for="recipient">Receipient Address:</label>
            </div>

            <div>
            <label for="recipient">Receipient Postcode:</label>
            </div>

            <div>
            <label for="recipient">Receipient Phone:</label>
            </div>

            <hr>

            <div>
                <label for="recepient">Receiver name:</label>
                <input type="text" name="receiver_name" id="receiver_name" required>
            </div>

            <input type="submit" value="Submit">
            <input type="submit" value="Cancel">

        </form>

    </main>
</body>

</html>