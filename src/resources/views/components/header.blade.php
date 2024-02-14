<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Main</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is("wines.index") ? "active" : "" }}" aria-current="page" href="{{ route("wines.index") }}">All Wines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is("wines/Red*") ? "active" : "" }}" aria-current="page" href="{{ route("wines.typeIndex", "Red") }}">Red Wines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is("wines/White*") ? "active" : "" }}" aria-current="page" href="{{ route("wines.typeIndex", "White") }}">White Wines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is("wines/Pink*") ? "active" : "" }}" aria-current="page" href="{{ route("wines.typeIndex", "Pink") }}">Pink Wines</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route("favorites.index") }}">{{ Auth::user()->login }}'s Favorite Wines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route("user.logout") }}">Log Out</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route("user.login") }}">Login</a>
                    </li>
                @endif
                @can('is_admin')
                    <li class="nav-item">
                        <a class="nav-link text-success" href="{{ route("wines.create") }}">Create new Wine</a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>