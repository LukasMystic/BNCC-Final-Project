@extends('partial/base')

@section('title', 'Invoice')

@section('style')
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            transition: background-color 0.3s ease-in-out;
        }

        .card-body:hover {
            background-color: #f8f9fa;
        }

        .btn-outline-danger {
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .btn-outline-dark {
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .btn-outline-dark:hover {
            background-color: #343a40;
            color: white;
        }

        .btn-outline-warning {
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .btn-outline-warning:hover {
            background-color: #ffc107;
            color: white;
        }

        .price {
            color: #28a745;
            font-weight: bold;
        }

        .total-price {
            color: #dc3545;
            font-weight: bold;
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-details {
            margin-left: 10px; /* Add spacing between image and product details */
        }

        .quantity-display {
            text-align: center;
            width: 70px;
        }
    </style>
@endsection

@section('content')
    @if ($toys)
        <section class="p-3 fade-in">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-semibold fs-2 mb-0 text-black">Shopping Cart</h3>
                    </div>

                    <?php $subTotal = 0; ?>
                    @foreach ($toys as $toy)
                        <div class="card fade-in mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img style="width: 150px; height: 150px; display:block;"
                                            src="{{ isset($toy['image']) ? asset('img/' . $toy['image']) : 'https://placehold.co/400/orange/white?text=Food' }}"
                                            alt="toys-image">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3 product-details">
                                        <p class="lead fw-normal mb-2">{{ $toy['name'] }}</p>
                                        <p><span class="badge text-bg-primary">{{ $toy['category'] }}</span></p>
                                    </div>

                                    <div class="col-md-1 col-lg-1 col-xl-1 d-flex">
                                        <span class="quantity-display">{{ $toy['quantity'] }}</span>
                                    </div>

                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <h5 class="mb-0 price">Rp {{ number_format($toy['price']) }}</h5>
                                    </div>

                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <form action="{{ route('toys.order.delete', $toy['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $subTotal += $toy['price'] * $toy['quantity']; ?>
                    @endforeach

                    <div class="card rounded-3 mb-4 p-4 fade-in">
                        <h4 class="mb-3">Payment</h4>
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-semibold">Sub Total</h6>
                            <h6 class="fw-semibold price">Rp {{ number_format($subTotal) }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-semibold">Administration Fee</h6>
                            <h6 class="fw-semibold">Rp 5.000</h6>
                        </div>
                        <hr>
                        <div class="mt-3 mb-3 d-flex justify-content-between">
                            <h4 class="fw-bold">Total Price</h4>
                            <h4 class="fw-bold total-price">Rp {{ number_format($subTotal + 5000) }}</h4>
                        </div>
                    </div>

                    <div class="t-3 fade-in">
                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="total_price" value="{{ $subTotal + 5000 }}">
                            <button class="w-100 btn btn-outline-dark btn-block btn-lg">Checkout Now!</button>
                        </form>
                    </div>
                    
                    @if (session()->has('old_cart'))
                        <div class="mt-4 fade-in">
                            <a href="{{ route('cart.restore') }}" class="btn btn-outline-warning w-100">Restore Previous Cart</a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @else
        <h1 class="text-center text-danger fw-semibold my-5 fade-in">There's No Cart Yet!</h1>
    @endif
@endsection
