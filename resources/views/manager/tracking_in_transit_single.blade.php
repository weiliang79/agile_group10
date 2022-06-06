<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Courier Tracking Page</title>
    <link rel="stylesheet" href="{{ url('/style.css') }}">
    <script src="{{ asset('assets') }}/bootstrap-5.2.0-beta1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets') }}/bootstrap-5.2.0-beta1/css/bootstrap.min.css">
</head>

<body class="center">
    @include('manager._header')
    
    <main>
        <div class="parcel-list center">
            <h2 class="my-5">Couriers with parcel still to deliver</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">💀</th>
                        <th scope="col">Courier name</th>
                        <th scope="col">Number of parcel (in-transit)</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
