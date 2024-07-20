@extends('partial.base')

@section('title', 'About')

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

        .about-container {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 10px;
            max-width: 800px;
            text-align: center;
        }

        .about-container h3 {
            font-size: 2.5rem;
            color: #343a40;
            margin-bottom: 20px;
            position: relative;
        }

        .about-container h3::after {
            content: '';
            width: 80px;
            height: 4px;
            background-color: #007bff;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -10px;
        }

        .about-container p {
            font-size: 1.1rem;
            color: #495057;
            line-height: 1.6;
        }

        .about-container p span {
            display: inline-block;
            transform: translateY(20px);
            opacity: 0;
            animation: slideIn 0.5s forwards;
        }

        .about-container p span:nth-child(1) {
            animation-delay: 0s;
        }

        .about-container p span:nth-child(2) {
            animation-delay: 0.1s;
        }

        .about-container p span:nth-child(3) {
            animation-delay: 0.2s;
        }

        @keyframes slideIn {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-column gap-4 vh-100">
        <div class="about-container">
            <h3>About Toyland Treasures</h3>
            <p>
                <span>Welcome to Toyland Treasures, where imagination comes to life! At Toyland Treasures, we believe in the magic of play and the joy that a simple toy can bring.</span> 
                <span>Our store is a haven for children and adults alike, offering a wide array of toys, games, and collectibles that cater to all ages and interests. From classic toys that have stood the test of time to the latest must-have gadgets and gizmos, our curated selection is designed to inspire creativity, learning, and endless fun.</span>
                <br><br>
                <span>Our friendly and knowledgeable staff are always on hand to help you find the perfect gift or to introduce you to something new and exciting.</span> 
                <span>We pride ourselves on creating a welcoming and whimsical atmosphere where families can explore, play, and make memories together.</span>
                <br><br>
                <span>At Toyland Treasures, every visit is an adventure. Whether you're searching for a beloved childhood favorite, a unique collectible, or the newest trends in toys, you'll find it here.</span> 
                <span>Come visit us and discover why Toyland Treasures is more than just a store, it's a place where dreams come true.</span>
            </p>
        </div>
    </div>
@endsection
