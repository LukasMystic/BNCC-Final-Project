@extends('partial.base')

@section('title', 'Menu')
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

        .admin-navbar {
            background-color: black; 
            padding: 10px 20px; 
            display: flex; 
            justify-content: center; 
            gap: 15px; 
            flex-wrap: wrap;
        }

        .admin-navbar .nav-link {
            color: #ffffff; 
            text-decoration: none; 
            font-size: 1rem; 
            padding: 8px 15px; 
            border-radius: 5px; 
            transition: background-color 0.3s, color 0.3s; 
        }

        .admin-navbar .nav-link:hover {
            background-color: white; 
            color: green; 
        }

        .admin-navbar .nav-link.active {
            background-color: #007bff; 
            color: #ffffff; 
        }

        .pagination {
            justify-content: center; 
        }

        .pagination .page-item .page-link {
            color: #ffffff; 
            background-color: #343a40; 
            border: 1px solid #343a40; 
        }

        .pagination .page-item .page-link:hover {
            background-color: #495057; 
            color: #ffffff;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff; 
            border-color: #007bff; 
            color: #ffffff; 
        }

        @media (max-width: 768px) {
            .admin-navbar {
                flex-direction: column; 
                align-items: center; 
            }
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

        .pagination-container {
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
<!-- Admin navbar -->
<div class="admin-navbar">
    @foreach ($categories as $category)
        <a href="{{ route('menu.filter', $category) }}" class="nav-link">{{ $category->name }}</a>
    @endforeach
</div>

<div class="container">
    <h3 class="mb-4 mt-4 text-white">Choose Your Toy</h3>
    <div class="d-flex justify-content-around align-items-center flex-wrap gap-4">
        {{-- Toys --}}
        @foreach ($toys as $toy)
            <div class="card">
                <img class="card-img-top"
                    src="{{ $toy->image ? asset('img/' . $toy->image) : 'https://placehold.co/400/orange/white?text=Toy' }}"
                    alt="toy-image">
                <div class="card-body">
                    <span class="badge text-bg-primary mb-2">{{ $toy->category->name }}</span>
                    <h5 class="card-title mb-2">{{ $toy->name }}</h5>
                    <p class="card-text mb-2">{{ Str::limit($toy->description, 150, '...') }}</p>
                    <p class="text-danger mb-3">Rp {{ number_format($toy->price) }}</p>
                    <div class="d-flex justify-content-between mt-auto">
                        <a class="btn btn-outline-dark btn-sm" href="{{ route('toys.detail', $toy) }}">Detail</a>
                        <a href="{{ route('toys.order', $toy) }}" class="btn btn-dark btn-sm">Add to cart</a>
                        <a href="{{ route('cart.buyNow', $toy) }}" class="btn btn-primary btn-sm">Buy Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination-container">
        {{ $toys->links() }}
    </div>
</div>
@endsection
