<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--title-->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />

    <!--jQuery-->
    <script src="{{ asset('assets') }}/jQuery/js/jquery-3.6.0.min.js"></script>

    <!--bootstrap-->
    <script src="{{ asset('assets') }}/bootstrap-5.2.0-beta1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets') }}/bootstrap-5.2.0-beta1/css/bootstrap.min.css">

    <!--bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!--font awesome-->
    <link rel="stylesheet" href="{{ asset('assets') }}/fontawesome-6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/fontawesome-6.1.1/css/solid.min.css">

    <!--datatables-->
    <link rel="stylesheet" href="{{ asset('assets') }}/DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="{{ asset('assets') }}/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <!--landing-->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/styles.css">

    <!--szimek/signature_pad-->
    <!--https://github.com/szimek/signature_pad-->
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

    @stack('css')
</head>

<body>

    <script>
        $(document).ready(function() {
            $('.showDataTable').DataTable({
                language: {
                    paginate: {
                        next: '<i class="fas fa-angle-right"></i>', // or '>'
                        previous: '<i class="fas fa-angle-left"></i>' // or '<>'
                    }
                },
                responsive: true,
                autoWidth: false,
                order: [],
            });
        });
    </script>

    <div class="main-content">
        @yield('content')

        @if(Session::get('success'))
        <script type="text/javascript">
            alert("{{ Session::get('success') }}")
        </script>
        @endif

        @if(Session::get('error'))
        <script type="text/javascript">
            alert("{{ Session::get('error') }}")
        </script>
        @endif
    </div>

    @stack('js')
</body>

</html>