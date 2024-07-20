@extends('partial.base')

@section('title', 'Toys Detail')

@section('content')
    <style>
        /* Custom background */
        .custom-bg {
            background: linear-gradient(to bottom right, #f0f0f0, #e0e0e0);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        /* Image container styling */
        .image-container {
            max-width: 350px;
            max-height: 350px;
            border: 1px solid #ddd;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-in-out;
        }

        .image-container img {
            border-radius: 15px;
        }

        /* Text container styling */
        .text-container {
            animation: fadeInUp 1.5s ease-in-out;
        }

        /* Headings and paragraphs styling */
        .text-container h3 {
            color: #333;
            border-bottom: 2px solid #18bc9c;
            padding-bottom: 10px;
            margin-bottom: 20px;
            animation: fadeInRight 2s ease-in-out;
        }

        .text-container p {
            color: #555;
            font-size: 1.1rem;
            margin-bottom: 20px;
            animation: fadeInRight 2.5s ease-in-out;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>

    <div class="row custom-bg" style="min-height: 100vh">
        <div class="col-4 d-flex justify-content-center align-items-center flex-column border-1 border-end border-dark">
            <div class="image-container">
                <img class="w-100 h-100" src="{{ $toys->image ? asset('img/' . $toys->image) : 'https://placehold.co/300/orange/white?text=Toy' }}" alt="toys-image">
            </div>
        </div>
        <div class="col-8 d-flex justify-content-center align-items-start flex-column ps-5 text-container">
            <div class="mb-3">
                <h3>Name</h3>
                <p>{{ $toys->name }}</p>
            </div>
            <div class="mb-3">
                <h3>Category</h3>
                <p>{{ $toys->category->name }}</p>
            </div>
            <div class="mb-3">
                <h3>Description</h3>
                <p>{{ $toys->description }}</p>
            </div>
            <div class="mb-3">
                <h3>Price</h3>
                <p>Rp {{ number_format($toys->price) }}</p>
            </div>
        </div>
    </div>
@endsection
