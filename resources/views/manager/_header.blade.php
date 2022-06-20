<header class="mt-3 d-flex justify-content-between align-items-center mx-auto" style="width: 80%">
    <h2>Manager Tracking Page</h2>

    <nav class="nav" style="font-size: large">
        <li class="nav-item">
            <a class="nav-link" href="{{route('manager.tracking_not_dispatched')}}">not dispatched</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('manager.tracking_in_transit')}}">in transit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('manager.tracking_delivered') }}">delivered</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}">logout</a>
        </li>
    </nav>
</header>
