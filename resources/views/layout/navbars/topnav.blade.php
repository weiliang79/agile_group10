<!-- Navigation-->
<nav class="navbar navbar-light navbar-expand-md bg-faded justify-content-center">
    <div class="container-fluid">
        <a class="navbar-brand abs" href="">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar" aria-controls="navbarSupportedContent" aria-expanded="true">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapseNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                @can('isCourier')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courier.tracking_page') }}">Tracking</a>
                </li>
                @endcan
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav nav-item">
                    <a class="nav-link" href="">About me</a>
                </li>
                <li class="nav nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>