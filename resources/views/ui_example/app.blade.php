<!DOCTYPE html>
<html lang="en">

      <head>
            <meta charset="UTF-8">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>{{ config('app.name') }}</title>

            <!--bootstrap 5-->
            <script src="{{ asset('bootstrap-5.2.0-beta1') }}/js/bootstrap.min.js"></script>
            <link href="{{ asset('bootstrap-5.2.0-beta1') }}/css/bootstrap.min.css" rel="stylesheet">
      </head>

      <body>
            <div class="main-content">
                  @yield('content')
            </div>
      </body>

</html>