<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemon List</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <style>
        body {
            background: linear-gradient(to right, #f2fcfe, #1c92d2);
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .table {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .table thead {
            background-color: #28a745;
            color: white;
        }

        .table td,
        .table th {
            text-align: center;
            vertical-align: middle;
        }

        .btn-primary,
        .btn-danger,
        .btn-info {
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            transform: scale(1.05);
        }

        .table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #28a745;
        }

        .header-title {
            text-align: center;
            font-size: 30px;
            color: #007bff;
        }

        .pagination .page-link {
    padding: 6px 12px;  /* Mengatur ukuran padding yang lebih kecil */
    font-size: 0.75rem;  /* Mengurangi ukuran font */
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
}

.pagination .page-link:hover {
    background-color: #0056b3;
    color: white;
}

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Pokemon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main') }}">Pokemon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pokemons.create') }}">Add Pokemon</a>
                </li>
                <!-- Tambahkan menu lainnya di sini -->
                <ul ali class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="header-title"><i class="fas fa-dragon"></i> Pokemon List</h2>

        <a href="{{ route('pokemons.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus-circle"></i> Add New Pokemon
        </a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Primary Type</th>
                    <th>Weight (kg)</th>
                    <th>Height (m)</th>
                    <th>HP</th>
                    <th>Attack</th>
                    <th>Defense</th>
                    <th>Legendary</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pokemons as $pokemon)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $pokemon->species }}</td>
                    <td>{{ $pokemon->primary_type }}</td>
                    <td>{{ number_format($pokemon->weight, 2) }}</td>
                    <td>{{ number_format($pokemon->height, 2) }}</td>
                    <td>{{ $pokemon->hp }}</td>
                    <td>{{ $pokemon->attack }}</td>
                    <td>{{ $pokemon->defense }}</td>
                    <td>{{ $pokemon->is_legendary ? 'Yes' : 'No' }}</td>
                    <td>
                        @if($pokemon->photo)
                            <img src="{{ Storage::url($pokemon->photo) }}" class="img-thumbnail" alt="Pokemon Photo">
                        @else
                            No image
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('pokemons.edit', $pokemon->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('pokemons.show', $pokemon->id) }}" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <form action="{{ route('pokemons.destroy', $pokemon->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $pokemons->links() }}
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <script>

        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const self = this;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        self.submit();
                    }
                });
            });
        });
        {{$pokemons->links()}}
    </script>
</body>

</html>
