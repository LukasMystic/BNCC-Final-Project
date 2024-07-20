@extends('partial.base')

@section('title', 'Home Page')

@section('style')
    {{-- Bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Moving Background */
        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            min-height: 100vh;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .search-container {
            min-height: 30vh;
        }

        .search-container h3 {
            font-weight: 600;
            color: #fff;
        }

        .search-container .form-control {
            border: 2px solid #fff;
        }

        .recommendations-container h3 {
            color: #fff;
        }

        .card {
            width: 18rem;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            height:400px;
        }

        .card-title {
            font-weight: 600;
            color: #343a40;
        }

        .card-text {
            flex-grow: 1;
        }

        .btn-outline-dark, .btn-dark, .btn-primary {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-dark:hover, .btn-dark:hover, .btn-primary:hover {
            background-color: #343a40;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
        }

        /* Notification */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #28a745;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        }

        .notification.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>
@endsection

@section('content')
    <div class="container search-container d-flex justify-content-center align-items-center flex-column gap-4">
        <h3>Want to Order a New Toy?</h3>
        <div class="w-50">
            {{-- Search form --}}
            <form action="{{ route('home.search') }}" class="d-flex justify-content-center align-items-center gap-3">
                @csrf
                <input type="text" class="form-control" placeholder="Search for toys ..." name="keyword" value="{{ $search ?? '' }}">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="container recommendations-container my-5">
        <h3 class="mb-4">Recommendations</h3>
        <div class="d-flex justify-content-around align-items-stretch flex-wrap gap-4">
            {{-- Recommended Toys --}}
            @foreach ($toys as $toy)
                <div class="card">
                    <img class="card-img-top" src="{{ $toy->image ? asset('img/' . $toy->image) : 'https://placehold.co/400/orange/white?text=Toy' }}" alt="toy-image">
                    <div class="card-body">
                        <span class="badge text-bg-primary mb-2">{{ $toy->category->name }}</span>
                        <h5 class="card-title mb-2">{{ $toy->name }}</h5>
                        <p class="card-text mb-3">{{ Str::limit($toy->description, 150, '...') }}</p>
                        <p class="text-danger mb-3">Rp {{ number_format($toy->price) }}</p>
                        <div class="d-flex gap-2">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('toys.detail', $toy) }}">Detail</a>
                            @auth
                                <a href="{{ route('toys.order', $toy) }}" class="btn btn-dark btn-sm add-to-cart">Add to cart</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-dark btn-sm">Add to cart</a>
                            @endauth
                            <a href="{{ route('cart.buyNow', $toy) }}" class="btn btn-primary btn-sm">Buy Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Notification --}}
    <div id="notification" class="notification">Item successfully added to cart!</div>

@endsection
