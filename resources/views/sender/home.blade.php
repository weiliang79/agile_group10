<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Sender homepage</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="center">
    @if(Session::get('success'))
    <script type="text/javascript">alert("{{ Session::get('success') }}")</script>
    @endif
    <header>
        <h2>Sender Homepage</h2>

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
        <h1 class="page-title">Parcel Info</h1>
        <form class="center" action="{{ route('parcel.send') }}" method="POST">
            @csrf
            <div>
                <label for="address">Sender address:</label>
                <input type="text" name="sender_address" id="address" required>
            </div>
            <div>
                <label for="address">Sender postcode:</label>
                <input type="number" name="sender_postcode" id="address" required>
            </div>
            <div>
                <label for="recepient">recipient first name:</label>
                <input type="text" name="recipient_firstname" id="recepient-name" required>
            </div>
            <div>
                <label for="recepient">recipient last name:</label>
                <input type="text" name="recipient_lastname" id="recepient-name" required>
            </div>
            <div>
                <label for="address">recipient address:</label>
                <input type="text" name="recipient_address" id="address" autocomplete="address-line1" required>
            </div>
            <div>
                <label for="address">recipient postcode:</label>
                <input type="number" name="recipient_postcode" id="address" autocomplete="postal-code" required>
            </div>
            <div>
                <label for="address">recipient phone:</label>
                <input type="number" name="recipient_phone" id="address" required>
            </div>
            <div>
                <label for="weight">Package weight:</label>
                <input type="number" name="weight" id="weight" required>
            </div>

            <input type="submit" value="Send">

        </form>

        {{-- style sheet for table --}}
        <style>
            table {
                border-collapse: separate;
                border-spacing: 20px 0;
            }

            th {
                background-color: #4287f5;
                color: white;
            }

            th,
            td {
                width: 150px;
                text-align: center;
                border: 1px solid black;
                padding: 5px;
            }

            h2 {
                color: #4287f5;
            }

        </style>
        <div class="parcel-list center">
            <h2>List of parcel status</h2>
            <table>
                <tr>
                    <th>Tracking Number</th>
                    <th>Recipient Name</th>
                    <th>Recipient Address</th>
                    <th>Recipient Phone</th>
                    <th>Status</th>
                </tr>
                @foreach($parcels as $parcel)
                <tr>
                    <td>{{ $parcel->tracking_number }}</td>
                    <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                    <td>{{ $parcel->recipient_address }}</td>
                    <td>{{ $parcel->recipient_phone }}</td>
                    @if($parcel->status == 1)
                    <td>Pending</td>
                    @elseif($parcel->status == 2)
                    <td>Delivering</td>
                    @elseif($parcel->status == 3)
                    <td>Delivered</td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </main>
</body>

</html>
