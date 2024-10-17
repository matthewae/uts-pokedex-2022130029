<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemon Details</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .pokemon-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            border: 1px solid #e9ecef;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-body {
            padding: 20px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-warning {
            transition: background-color 0.3s;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        h2 {
            font-weight: bold;
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        h5.card-title {
            font-weight: bold;
            color: #343a40;
        }

        p.card-text {
            color: #495057;
        }
    </style>
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <div class="container mt-5">
            <h2>Pokemon Details</h2>

            <div class="row mt-4">
                <div class="col-md-4">
                    <a href="{{ route('pokemons.show', $pokemon->id) }}">
                        <img src="{{ $pokemon->photo ? asset('storage/' . $pokemon->photo) : 'https://placehold.co/200' }}"
                             class="pokemon-image"
                             alt="{{ $pokemon->name }}">
                    </a>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Name: {{ $pokemon->name }}</h5>
                            <p class="card-text"><strong>Species:</strong> {{ $pokemon->species }}</p>
                            <p class="card-text"><strong>Primary Type:</strong> {{ $pokemon->primary_type }}</p>
                            <p class="card-text"><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
                            <p class="card-text"><strong>Height:</strong> {{ $pokemon->height }} m</p>
                            <p class="card-text"><strong>HP:</strong> {{ $pokemon->hp }}</p>
                            <p class="card-text"><strong>Attack:</strong> {{ $pokemon->attack }}</p>
                            <p class="card-text"><strong>Defense:</strong> {{ $pokemon->defense }}</p>
                            <p class="card-text"><strong>Legendary:</strong> {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('pokemons.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                        <a href="{{ route('pokemons.edit', $pokemon->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Pokemon
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


{{-- @extends('layouts.app')

@section('title', 'Pokedex')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">Pokedex</h1>

        @if ($pokemons->count() > 0)
            <div class="row">
                @foreach ($pokemons as $pokemon)
                    <div class="col-md-4 mb-4">
                        <!-- Card Pokémon baru dengan layout sesuai yang diminta -->
                        <div class="pokemon-card">
                            <a href="{{ route('pokemons.show', $pokemon->id) }}">
                                <!-- Gambar Pokémon -->
                                <img src="{{ $pokemon->photo ? asset('storage/' . $pokemon->photo) : 'https://placehold.co/200' }}"
                                     class="pokemon-image"
                                     alt="{{ $pokemon->name }}">
                            </a>

                            <!-- ID Pokémon -->
                            <div class="pokemon-id">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</div>

                            <!-- Nama Pokémon -->
                            <div class="pokemon-name">{{ $pokemon->name }}</div>

                            <!-- Primary Type -->
                            <div class="pokemon-type">{{ $pokemon->primary_type }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $pokemons->links() }}
            </div>
        @else
            <p class="text-center">No Pokémon available.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>
@endsection --}}
