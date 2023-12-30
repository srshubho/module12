<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets') }}/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets') }}/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets') }}/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets') }}/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav flex-column" id="navbar-nav">


                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard') }}">
                        <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">dashboard</span>
                    </a>
                </li>
                <x-admin>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('locations.index') }}">
                            <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Locations</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('trips.index') }}">
                            <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Trips</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('tickets.index') }}">
                            <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Booked Trips</span>
                        </a>
                    </li>
                </x-admin>
                <x-user>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('tickets.show') }}">
                            <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Ticket Info</span>
                        </a>
                    </li>
                </x-user>
                <li class="nav-item">
                    <a class="nav-link menu-link aling-self-end" href="{{ route('logout') }}">
                        <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
