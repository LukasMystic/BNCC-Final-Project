<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="icon" href="{{ asset('img/logo.jpg') }}">
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


        /* Adjust table image size */
        .toys-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
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

        .user-info a {
            margin-right: 10px;
            color: white;
            transition: color 0.3s;
        }

        .user-info a:hover {
            color: #18bc9c;
        }

        /* Search form styling */
        .search-form {
            display: flex;
            align-items: center;
            margin: 20px 0;
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

        /* Background */
        body {
            background-color: #ecf0f1;
        }

        /* Animations */
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

        .slide-in-left {
            animation: slideInLeft 1s ease-in-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <!-- Admin navbar -->
    <div class="admin-navbar">
        <div>
            <a href="{{ route('admin.home') }}" class="slide-in-left">All Categories</a>
            @foreach ($categories as $category)
                <a href="{{ route('admin.filter', $category) }}" class="slide-in-left">{{ $category->name }}</a>
            @endforeach
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

    <!-- Search form -->
    <div class="container mt-4">
        <form action="{{ route('admin.toys.search') }}" method="GET" class="search-form justify-content-center">
            @csrf
            <input type="text" class="form-control search-input" placeholder="Search for a toy ..." name="query" value="{{ $search ?? '' }}">
            <button class="btn btn-outline-dark">Search</button>
        </form>

        <!-- Food List -->
        <div class="header-container">
            <h3 class="mt-4">Toy List</h3>
            <a class="btn btn-outline-dark" href="{{ route('toys.create') }}">+ Add Toy</a>
        </div>

        <table class="table table-hover table-striped text-center fade-in">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $num = 1; ?>
                @foreach ($toys as $toy)
                    <tr>
                        <th scope="row">{{ $num++ }}</th>
                        <td>
                            <img src="{{ $toy->image ? asset('img/' . $toy->image) : 'https://placehold.co/400/orange/white?text=Toy' }}"
                                class="toys-image" alt="Toy Image">
                        </td>
                        <td>{{ $toy->name }}</td>
                        <td>{{ $toy->category->name }}</td>
                        <td>Rp {{ number_format($toy->price) }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <a href="{{ route('toys.edit', $toy) }}" class="btn btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-outline-danger delete-btn" data-toy-name="{{ $toy->name }}" data-toy-id="{{ $toy->id }}"><i class="bi bi-trash"></i></button>
                                <form action="{{ route('toys.delete', $toy) }}" method="POST" id="deleteForm{{ $toy->id }}" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Confirm Delete Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const toyName = this.getAttribute('data-toy-name');
                    const toyId = this.getAttribute('data-toy-id');
                    if (confirm(`Are you sure you want to delete "${toyName}"?`)) {
                        document.getElementById('deleteForm' + toyId).submit();
                    }
                });
            });
        });
    </script>
</body>
</html>
