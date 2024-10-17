<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Pokemon</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background: linear-gradient(to right, #a8e0f5, #f4c9ff);
            font-family: 'Comic Sans MS', cursive, sans-serif;
            color: #333;
        }

        .card {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            border: 2px solid #ffcc00;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section h5 {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #ff6347;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #ff4500;
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }

        .file-upload input {
            border-radius: 10px;
            border: 2px dashed #ff6347;
            cursor: pointer;
            width: 100%;
        }

        .preview-image {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 10px;
            display: none;
            border: 2px solid #ff6347;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .file-name {
            margin-top: 5px;
            font-size: 14px;
            color: #6c757d;
            font-weight: bold;
        }

        .alert-danger {
            font-size: 14px;
        }
    </style>
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <div class="container mt-5">
            <h2 class="text-center"><i class="fas fa-plus-circle"></i> Add New Pokemon</h2>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card mt-4">
                <div class="card-body">
                    <form action="{{ route('pokemons.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="name">Pokemon Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="species">Species</label>
                            <input type="text" class="form-control @error('species') is-invalid @enderror" id="species"
                                name="species" value="{{ old('species') }}">
                            @error('species')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="primary_type">Primary Type</label>
                            <select class="form-control @error('primary_type') is-invalid @enderror" id="primary_type"
                                name="primary_type">
                                <option value="">Select Type</option>
                                <option value="Grass" {{ old('primary_type') == 'Grass' ? 'selected' : '' }}>Grass</option>
                                <option value="Fire" {{ old('primary_type') == 'Fire' ? 'selected' : '' }}>Fire</option>
                                <option value="Water" {{ old('primary_type') == 'Water' ? 'selected' : '' }}>Water</option>
                                <option value="Bug" {{ old('primary_type') == 'Bug' ? 'selected' : '' }}>Bug</option>
                                <option value="Normal" {{ old('primary_type') == 'Normal' ? 'selected' : '' }}>Normal
                                </option>
                                <option value="Poison" {{ old('primary_type') == 'Poison' ? 'selected' : '' }}>Poison
                                </option>
                                <option value="Electric" {{ old('primary_type') == 'Electric' ? 'selected' : '' }}>Electric
                                </option>
                                <option value="Ground" {{ old('primary_type') == 'Ground' ? 'selected' : '' }}>Ground
                                </option>
                                <option value="Fairy" {{ old('primary_type') == 'Fairy' ? 'selected' : '' }}>Fairy
                                </option>
                                <option value="Fighting" {{ old('primary_type') == 'Fighting' ? 'selected' : '' }}>Fighting
                                </option>
                                <option value="Psychic" {{ old('primary_type') == 'Psychic' ? 'selected' : '' }}>Psychic
                                </option>
                                <option value="Rock" {{ old('primary_type') == 'Rock' ? 'selected' : '' }}>Rock</option>
                                <option value="Ghost" {{ old('primary_type') == 'Ghost' ? 'selected' : '' }}>Ghost
                                </option>
                                <option value="Ice" {{ old('primary_type') == 'Ice' ? 'selected' : '' }}>Ice</option>
                                <option value="Dragon" {{ old('primary_type') == 'Dragon' ? 'selected' : '' }}>Dragon
                                </option>
                                <option value="Dark" {{ old('primary_type') == 'Dark' ? 'selected' : '' }}>Dark</option>
                                <option value="Steel" {{ old('primary_type') == 'Steel' ? 'selected' : '' }}>Steel
                                </option>
                                <option value="Flying" {{ old('primary_type') == 'Flying' ? 'selected' : '' }}>Flying
                                </option>
                            </select>
                            @error('primary_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="weight">Weight (kg)</label>
                            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight"
                                name="weight" value="{{ old('weight') }}" step="0.01">
                            @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="height">Height (m)</label>
                            <input type="number" class="form-control @error('height') is-invalid @enderror" id="height"
                                name="height" value="{{ old('height') }}" step="0.01">
                            @error('height')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="hp">HP</label>
                            <input type="number" class="form-control @error('hp') is-invalid @enderror" id="hp"
                                name="hp" value="{{ old('hp') }}">
                            @error('hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="attack">Attack</label>
                            <input type="number" class="form-control @error('attack') is-invalid @enderror" id="attack"
                                name="attack" value="{{ old('attack') }}">
                            @error('attack')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="defense">Defense</label>
                            <input type="number" class="form-control @error('defense') is-invalid @enderror" id="defense"
                                name="defense" value="{{ old('defense') }}">
                            @error('defense')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="is_legendary">Is Legendary</label>
                            <input type="checkbox" id="is_legendary" name="is_legendary"
                                {{ old('is_legendary') ? 'checked' : '' }}>
                        </div>


                        <div class="form-section">
                            <h5>Pokemon Photo (optional)</h5>
                            <div class="file-upload">
                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror"
                                    id="photo" name="photo">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="file-name" class="file-name"></div>
                            <img id="preview" alt="Product Image" class="preview-image">
                        </div>


                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Add Pokemon
                        </button>
                        <a href="{{ route('pokemons.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('photo').addEventListener('change', function(event) {
                const input = event.target;
                const preview = document.getElementById('preview');
                const fileNameElement = document.getElementById('file-name');


                fileNameElement.textContent = input.files[0].name;


                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        </script>
    @endsection
</body>

</html>
