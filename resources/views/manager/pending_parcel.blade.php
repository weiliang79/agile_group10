<!DOCTYPE html>

<html>

<head>
      <meta charset="utf-8">
      <title>Courier Tracking Page</title>
      <link rel="stylesheet" href="style.css">
</head>

<body class="center">
      <header>
            <h2>Courier Tracking Page</h2>

            <nav>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Tracking</a></li>
                  <li><a href="#">nav 3</a></li>
                  <li><a href="#">nav 4</a></li>
            </nav>
      </header>

      <main>

            {{-- style sheet for table --}}
            <!--<style>
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
    </style>-->

            <div class="parcel-list center">
                  <h2>List of parcel status</h2>
                  <table border="1">
                        <tr>
                              <th>Tracking Number</th>
                              <th>Create Time</th>
                              <th>Pending Time</th> 
                        </tr>
                        <tr>
                              <td class="td">10001</td>
                              <td>0001</td>
                              <td>3.00 pm</td>
                              <td>3 hours</td>
                        </tr>
                  </table>
            </div>
      </main>
</body>

</html>