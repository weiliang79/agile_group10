@extends('layout.app')

@section('content')
    @include('layout.navbars.topnav')

    <main class="container">
        <div class="mx-auto" style="width: max-content">
            <h2 class="my-5 text-center">Couriers with parcel in transit</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Courier Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Number of parcel (In Transit)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($couriers as $courier)
                        <tr style="transform: rotate(0);">
                            <td>{{ $courier->first_name }}
                                <a href="{{ route('manager.tracking_single', ['courier_id' => $courier->id]) }}"
                                    class="stretched-link"></a></td>
                            <td>{{ $courier->email }}</td>
                            <td>{{ $courier->phone }}</td>
                            <td>{{ $courier->courier_parcel->where('status', 2)->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <div style="min-height: 260px;"></div>

    @include('layout.navbars.footer')
@endsection

@push('js')
    <script>
        function openURL(item) {
            window.location = $(item).data('url');
        }
    </script>
@endpush
