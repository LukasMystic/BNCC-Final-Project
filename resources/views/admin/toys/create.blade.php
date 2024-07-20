<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo.jpg') }}">
    <title>@yield('title', 'Add New Toy')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom styles -->
    <style>
        /* Custom admin navbar style */
        .admin-navbar {
            background-color: #000;
            padding: 20px;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 1s ease-in-out;
        }

        .admin-navbar a {
            color: white;
            margin: 0 15px;
            transition: color 0.3s;
        }

        .admin-navbar a:hover {
            color: #18bc9c;
            text-decoration: none;
        }

        /* Styling for user info and logout */
        .user-info {
            display: flex;
            align-items: center;
            color: white;
            position: absolute;
            top: 15px;
            right: 15px;
            animation: slideInRight 1s ease-in-out;
        }

        .user-info p {
            margin: 0;
            margin-right: 10px;
        }

        .user-info a, .user-info button {
            color: white;
        }

        /* Adjust table image size */
        .toys-image {
            width: 150px;
            height: 150px;
        }

        /* Search form styling */
        .search-form {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .search-input {
            width: 300px;
            margin-right: 10px;
        }

        /* Container for aligning items */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .header-container a {
            margin-top: 1rem;
            border-color: green;
            color: green;
        }

        /* Form container styling */
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-in-out;
        }

        .form-container h3 {
            color: #333;
        }

        .form-container button, .form-container a {
            transition: transform 0.3s ease-in-out;
        }

        .form-container button:hover, .form-container a:hover {
            transform: translateY(-3px);
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

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(0);
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
    </style>
</head>
<body>
    <!-- Admin navbar -->
    <div class="admin-navbar">
        <a href="{{ route('admin.home') }}" class="slide-in-left">Home</a>
    </div>

    <!-- User info and logout -->
    <div class="user-info slide-in-left">
        <p class="m-0 me-3">Hello, {{ Auth::user()->name }}</p>
        <form action="{{ route('logout') }}" method="POST" class="ms-3">
            @csrf
            <button type="submit" class="btn btn-outline-light">Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="form-container">
            <form action="{{ route('toys.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row" style="min-height: 100vh">
                    <div class="col-4 d-flex justify-content-center align-items-center flex-column border-1 border-end border-dark">
                        <div class="mb-3">
                            <label for="imageInput" class="form-label">Upload your toy image!</label>
                            <img id="previewImage" src="holder.js/300x200?text=Image" class="img-fluid">
                            <input id="imageInput" class="form-control" type="file" name="image">
                        </div>
                    </div>
                    <div class="col-8 d-flex justify-content-center align-items-start flex-column ps-5">
                        <h3 class="mb-3">Create a New Toy</h3>
                        <div class="w-75">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Description" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
                                <label for="floatingTextarea2">Description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInputPrice" placeholder="Price" name="price">
                                <label for="floatingInputPrice">Price</label>
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-outline-dark me-2">
                                    Create
                                </button>
                                <button type="button" class="btn btn-outline-danger" onclick="confirmCancel();">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CDN for holder js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"></script>
    <script>
        const imageInput = document.getElementById('imageInput');
        const previewImage = document.getElementById('previewImage');

        imageInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        function confirmCancel() {
            if (confirm('Are you sure you want to cancel? Any unsaved changes will be lost.')) {
                window.location.href = "{{ route('admin.home') }}";
            }
        }
    </script>
</body>
</html>
