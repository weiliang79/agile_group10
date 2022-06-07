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
            <h2 class="my-5 text-center">Couriers with parcel in transit</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">💀</th>
                        <th scope="col">Courier name</th>
                        <th scope="col">Number of parcel (in-transit)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($table as $row)
                        <tr style="transform: rotate(0);">
                            <th scope="row">
                                <a href="{{ route('manager.tracking_single', ['courier_id' => $row->id]) }}"
                                    class="stretched-link"></a>
                                {{ $loop->index + 1 }}
                            </th>
                            <td>{{ $row->first_name }}</td>
                            <td>{{ $row->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
