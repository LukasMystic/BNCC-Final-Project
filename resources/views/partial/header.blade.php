<nav class="navbar navbar-expand-lg bg-black p-4 sticky-top top-0" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Toyland Treasures</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('menu') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('about') }}">About Us</a>
                </li>
            </ul>
            <div class="d-flex justify-content-center align-items-center gap-4 user-section">
                @if (Auth::user())
                    <div class="position-relative">
                        <a href="{{ route('checkout.index') }}" class="text-light icon-link">
                            <i class="bi bi-cart"></i>
                            @if (session('cart'))
                                <span class="badge badge-danger position-absolute top-0 start-100 translate-middle">
                                    {{ count(session('cart')) }}
                                </span>
                            @endif
                        </a>
                    </div>
                    <a href="{{ route('invoice') }}" class="text-light icon-link">
                        <i class="bi bi-receipt"></i>
                    </a>
                    <p class="text-light m-0">Hello, {{ Auth::user()->name }}</p>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-light">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                @endif
            </div>
        </div>
    </div>
</nav>
