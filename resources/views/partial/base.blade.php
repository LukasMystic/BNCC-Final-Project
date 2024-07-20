<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- icon --}}
    <link rel="icon" href="{{ asset('img/logo.jpg') }}">

    {{-- Bootstrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- Default Reset CSS --}}
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">

    {{-- Custom CSS Link --}}
    @yield('style')
<style>
/* Custom Navbar Styles */
.navbar-brand {
    color: #fff;
    font-size: 1.5rem;
    font-weight: bold;
    transition: color 0.3s ease;
}

.navbar-brand:hover {
    color: #ffc107;
}

.nav-link {
    color: #fff;
    font-size: 1rem;
    padding: 0.5rem 1rem;
    transition: color 0.3s ease, background-color 0.3s ease;
}

.nav-link:hover {
    color: #ffc107;
    background-color: #495057;
    border-radius: 5px;
}

.user-section .icon-link {
    font-size: 1.5rem;
    transition: color 0.3s ease, transform 0.3s ease;
}

.user-section .icon-link:hover {
    color: #ffc107;
    transform: scale(1.2);
}

.user-section p {
    margin: 0;
    font-size: 1rem;
    color: #fff;
}

.user-section .btn-outline-light {
    border-color: #ffc107;
    color: #ffc107;
    transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
}

.user-section .btn-outline-light:hover {
    background-color: #ffc107;
    color: #343a40;
    border-color: #ffc107;
}

.user-section .btn-outline-light:focus,
.user-section .btn-outline-light:active {
    box-shadow: none;
}

.navbar-toggler {
    border: none;
    background-color: #ffc107;
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

/* Footer Styles */
.footer {
    background-color: #343a40;
    color: #f8f9fa;
    padding: 1.5rem 0;
}

.footer h5 {
    color: #ffc107;
    margin-bottom: 1rem;
}

.footer p, .footer a {
    color: #f8f9fa;
}

.footer .footer-link {
    color: #f8f9fa;
    text-decoration: none;
    transition: color 0.3s ease, text-decoration 0.3s ease;
}

.footer .footer-link:hover {
    color: #ffc107;
    text-decoration: underline;
}

.footer .list-unstyled {
    padding-left: 0;
    list-style: none;
}

.footer .text-center p, .footer .text-end p {
    margin-bottom: 0;
}


</style>
</head>

<body>

    @include('partial.header')

    <div class="container p-4" style="min-height: 100vh">
        @yield('content')
    </div>

    @include('partial.footer')

    {{-- Custom Javascript --}}
    @yield('script')
</body>

</html>
