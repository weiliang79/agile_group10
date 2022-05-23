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

            <div>
            <label for="tracking">Tracking Number:</label>
            </div>

            <div>
            <label for="sender">Sender Name:</label>
            </div>

            <div>
            <label for="sender">Sender Address:</label>
            </div>

            <div>
            <label for="sender">Sender Postcode:</label>
            </div>

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

            <input type="submit" value="Submit">
            <input type="submit" value="Cancel">

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
                    <th>Sender ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                </tr>
                <tr>
                    <td class="td">10001</td>
                    <td>Tom</td>
                    <td>M</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td class="td">10002</td>
                    <td>Sally</td>
                    <td>F</td>
                    <td>28</td>
                </tr>
                <tr>
                    <td class="td">10003</td>
                    <td>Emma</td>
                    <td>F</td>
                    <td>24</td>
                </tr>
            </table>
        </div>
    </main>
</body>

</html>