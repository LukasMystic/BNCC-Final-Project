<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo.jpg') }}">
    <title>Update Toy</title>
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

        /* Custom form container styling */
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Custom modal styling */
        .modal-content {
            animation: fadeIn 0.5s ease-in-out;
        }

        .modal-header, .modal-footer {
            border: none;
        }
    </style>
</head>
<body>
    <!-- Admin navbar -->
    <div class="admin-navbar">
        <div>
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
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="form-container">
            <form action="{{ route('toys.update', $toys) }}" class="w-100" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row" style="min-height: 100vh">
                    <div class="col-4 d-flex justify-content-center align-items-center flex-column border-1 border-end border-dark">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload your new toy image!</label>
                            <div style="max-width: 350px; max-height: 350px">
                                <img class="w-100 h-100" style="display:block;"
                                    src="{{ $toys->image ? asset('img/' . $toys->image) : 'https://placehold.co/300/orange/white?text=Toy' }}"
                                    alt="toy-image" id="previewImage">
                                <input class="form-control" type="file" name="image" id="imageInput">
                            </div>
                        </div>
                    </div>
                    <div class="col-8 d-flex justify-content-center flex-column ps-5">
                        <h3 class="mb-3">Update this Toy</h3>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="name"
                                placeholder="name@example.com" value="{{ $toys->name }}">
                            <label for="floatingInput">Name</label>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->name == $toys->category->name ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                                name="description">{{ $toys->description }}</textarea>
                            <label for="floatingTextarea2">Description</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" name="price"
                                placeholder="name@example.com" value="{{ $toys->price }}">
                            <label for="floatingInput">Price</label>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-outline-dark me-2">
                                Update
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Cancel Verification Modal -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">Cancel Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel the update?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a href="{{ route('admin.home') }}" class="btn btn-danger">Yes, Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    </script>
</body>
</html>
