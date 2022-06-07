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
        <div class="mx-auto" style="width: max-content">
            <h2 class="my-5 text-center">Parcel not dispatched</h2>
            {{-- flagged --}}
            @if (!$flagged->isEmpty())

                <h4 class="text-danger">Flagged</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">💀</th>
                            <th scope="col">Tracking Number</th>
                            <th scope="col">Courier Name</th>
                            <th scope="col">Postcode</th>
                            <th scope="col">Date Posted</th>
                            <th scope="col">Hours Elapsed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flagged as $row)
                            <tr class="table-danger">
                                <th scope="row">
                                    {{ $loop->index + 1 }}
                                </th>
                                <td>{{ $row->tracking_number }}</td>
                                <td>{{ $row->courier->first_name }}</td>
                                <td>{{ $row->recipient_postcode }}</td>
                                <td>{{ $row->created_at->format('d\/m\/y') }}</td>
                                <td>{{ $row->created_at->diffInHours(Carbon\Carbon::now(), false) }} hrs</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            {{-- not dispatched --}}
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
