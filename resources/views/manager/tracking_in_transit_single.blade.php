<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Courier Tracking Page</title>
    {{-- <link rel="stylesheet" href="{{ url('/style.css') }}"> --}}
    <script src="{{ asset('assets') }}/bootstrap-5.2.0-beta1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets') }}/bootstrap-5.2.0-beta1/css/bootstrap.min.css">
</head>

<body>
    @include('manager._header')

    <main class="container">
        <div class="mx-auto">
            <h2 class="mt-5 mb-3 text-center">Courier info:</h2>
            <div class="d-flex justify-content-center">
                <table>
                    <tr>
                        <td style="width: 5rem">Name:</td>
                        <td>{{ $courier->first_name }}</td>
                    </tr>
                    <tr>
                        <td style="width: 5rem">Email:</td>
                        <td>{{ $courier->email }}</td>
                    </tr>
                    <tr>
                        <td style="width: 5rem">Phone:</td>
                        <td>{{ $courier->phone }}</td>
                    </tr>
                </table>
            </div>

            <h2 class="my-5 text-center">Parcels in transit</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">💀</th>
                        <th scope="col">Tracking Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Postcode</th>
                        <th scope="col">Date Posted</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parcels as $row)
                        <tr>
                            <th scope="row">
                                {{ $loop->index + 1 }}
                            </th>
                            <td>{{ $row->tracking_number }}</td>
                            <td>{{ $row->recipient_address }}</td>
                            <td>{{ $row->recipient_postcode }}</td>
                            <td>{{ $row->created_at->format('d\/m\/y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
