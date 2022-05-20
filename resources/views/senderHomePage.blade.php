<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>Sender homepage</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="center">
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
    <h1 class="page-title">Parcel Info</h1>
    <form class="center" action="{{ route('parcel.send') }}" method="POST">
      @csrf
      <div>
        <label for="address">Sender address:</label>
        <input type="text" name="sender-address" id="address" required>
      </div>
      <div>
        <label for="address">Sender postcode:</label>
        <input type="number" name="sender-postcode" id="address" required>
      </div>
      <div>
        <label for="recepient">Receipient first name:</label>
        <input type="text" name="recepient-first-name" id="recepient-name" required>
      </div>
      <div>
        <label for="recepient">Receipient last name:</label>
        <input type="text" name="recepient-last-name" id="recepient-name" required>
      </div>
      <div>
        <label for="address">Receipient address:</label>
        <input type="text" name="receipient-address" id="address" required>
      </div>
      <div>
        <label for="address">Receipient postcode:</label>
        <input type="number" name="receipient-postcode" id="address" required>
      </div>
      <div>
        <label for="address">Receipient phone:</label>
        <input type="number" name="receipient-postcode" id="address" required>
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