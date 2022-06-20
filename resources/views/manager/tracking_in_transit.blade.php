@extends('layout.app')

@section('content')
    @include('layout.navbars.topnav')

<div class="container-fluid py-5" style="background-color: lightblue;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
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
                            <td>{{ $courier->courier_parcel->where('status', 3)->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>   
    
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
