<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemon List</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            width: 100%; /* Make the card full width */
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .btn-sm {
            margin-right: 5px;
        }

        .img-thumbnail {
            width: 100px;
            height: auto;
        }

        table.table {
            table-layout: auto; /* Change to auto for better column width adjustment */
            word-wrap: break-word;
            width: 100%; /* Ensure table takes full width of card */
        }

        th, td {
            vertical-align: middle !important;
            text-align: center; /* Center align text in the table */
        }

        .col-photo {
            width: 120px;
        }

        .col-actions {
            width: 220px; /* Increased width for actions column */
        }

        .btn-group {
            display: flex;
            justify-content: center; /* Center action buttons */
            flex-direction: row; /* Ensure buttons are in a row */
            gap: 5px; /* Add space between buttons */
        }

        .table-scroll {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Pokemon List</h2>
                <a href="{{ route('pokemons.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Pokemon
                </a>
            </div>
            <div class="card-body table-scroll">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <table class="table table-hover table-bordered">
                    <thead class="table-primary">
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
                            <th class="col-photo">Photo</th>
                            <th class="col-actions">Actions</th>
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
                                    <form action="{{ route('pokemons.destroy', $pokemon->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Pokemon?');">
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
