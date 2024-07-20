@extends('partial/base')

@section('title', 'Invoice')

@section('style')
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 30px;
            transition: background-color 0.3s ease-in-out;
        }

        .card-body:hover {
            background-color: #e9ecef;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .table-striped tbody tr:hover {
            background-color: #e0e0e0;
        }

        .text-black {
            color: #000 !important;
        }

        .fw-bold {
            font-weight: bold !important;
        }

        .text-muted {
            color: #6c757d !important;
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
    </style>
@endsection

@section('content')
    @if ($finalInvoice)
    @foreach ($finalInvoice as $item)
    <div class="card my-5 p-3 fade-in">
        <div class="card-body">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="fw-bold">Invoice ID : {{ $item["invoice"]->id }}</h3>
                    <div class="text-center">
                        <i class="bi bi-receipt" style="font-size: 3rem; color: #5d9fc5;"></i>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-xl-8">
                    <ul class="list-unstyled">
                        <li class="text-muted">To: <span class="fw-bold">{{ auth()->user()->name }}</span></li>
                        <li class="text-muted">Payment: <span class="fw-bold">Cash</span></li>
                        <li class="text-muted"><i class="bi bi-calendar"></i> Date: <span class="fw-bold">{{ $item["invoice"]->created_at->format("d-M-Y") }}</span></li>
                    </ul>
                </div>
            </div>

            <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless">
                    <thead style="background-color:#84B0CA;" class="text-white text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($item["invoiceDetail"] as $sub_item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sub_item->toys->name }}</td>
                        <td>Rp {{ number_format($sub_item->toys->price) }}</td>
                        <td>{{ $sub_item->quantity }}</td>
                        <td>Rp {{ number_format($sub_item->subTotal) }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between text-muted ms-3">
                            <span class="text-black me-4">Total</span>Rp {{ number_format($item["invoice"]->total_price - 5000) }}
                        </li>
                        <li class="d-flex justify-content-between text-muted ms-3 mt-2">
                            <span class="text-black me-4">Administration Fee</span>Rp 5,000
                        </li>
                    </ul>
                </div>
                <div class="col-xl-12">
                    <h3 class="text-black fw-bold d-flex justify-content-between">
                        <span>Total Price</span>
                        <span style="font-size: 25px;">Rp {{ number_format($item["invoice"]->total_price) }}</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <h1 class="text-center text-danger fw-semibold my-5 fade-in">There's No Invoice Yet!</h1>
    @endif
@endsection
