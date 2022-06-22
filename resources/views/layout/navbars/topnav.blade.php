<!-- Navigation-->
<nav class="navbar navbar-light navbar-expand-md bg-faded justify-content-center">
    <div class="container-fluid">
        <a class="navbar-brand abs" href="">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar" aria-controls="navbarSupportedContent" aria-expanded="true">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapseNavbar">
            <ul class="navbar-nav ms-auto">

                @can('isNormalUser')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('normal_user.home') }}">Home</a>
                </li>
                @endcan

                @can('isCourier')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courier.home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courier.tracking_page') }}">Tracking</a>
                </li>
                @endcan

                @can('isManager')

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manager.tracking_not_pickup') }}">Not Pickup</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manager.tracking_not_dispatched') }}">Not Dispatched</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manager.tracking_in_transit') }}">In Transit</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manager.tracking_delivered') }}">Delivered</a>
                </li>
                @endcan

                <li class="nav nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>