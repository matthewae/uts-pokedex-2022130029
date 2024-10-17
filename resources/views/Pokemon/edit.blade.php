<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pokemon</title>

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

        .file-upload {
            margin-top: 10px;
            position: relative;
        }

        .file-upload input {
            padding: 5px;
            border-radius: 10px;
            border: 2px dashed #ff6347;
            width: 100%;
            cursor: pointer;
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
            <h2 class="text-center"><i class="fas fa-edit"></i> Edit Pokemon</h2>

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
                    <form action="{{ route('pokemons.update', $pokemon->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="name">Pokemon Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $pokemon->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="species">Species</label>
                            <input type="text" class="form-control @error('species') is-invalid @enderror" id="species"
                                name="species" value="{{ old('species', $pokemon->species) }}">
                            @error('species')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="primary_type">Primary Type</label>
                            <select class="form-control @error('primary_type') is-invalid @enderror" id="primary_type"
                                name="primary_type">
                                <option value="">Select Type</option>
                                @foreach (['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'] as $type)
                                    <option value="{{ $type }}"
                                        {{ old('primary_type', $pokemon->primary_type) == $type ? 'selected' : '' }}>
                                        {{ $type }}</option>
                                @endforeach
                            </select>
                            @error('primary_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight"
                                name="weight" value="{{ old('weight', $pokemon->weight) }}">
                            @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="height">Height</label>
                            <input type="number" class="form-control @error('height') is-invalid @enderror" id="height"
                                name="height" value="{{ old('height', $pokemon->height) }}">
                            @error('height')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="hp">HP</label>
                            <input type="number" class="form-control @error('hp') is-invalid @enderror" id="hp"
                                name="hp" value="{{ old('hp', $pokemon->hp) }}">
                            @error('hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="attack">Attack</label>
                            <input type="number" class="form-control @error('attack') is-invalid @enderror" id="attack"
                                name="attack" value="{{ old('attack', $pokemon->attack) }}">
                            @error('attack')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="defense">Defense</label>
                            <input type="number" class="form-control @error('defense') is-invalid @enderror" id="defense"
                                name="defense" value="{{ old('defense', $pokemon->defense) }}">
                            @error('defense')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="is_legendary">Is Legendary</label>
                            <input type="checkbox" id="is_legendary" name="is_legendary"
                                {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
                        </div>


                        <div class="form-section">
                            <h5>Product Photo (optional)</h5>
                            <div class="file-upload">
                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror"
                                    id="photo" name="photo">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="file-name" class="file-name"></div>
                            @if ($pokemon->photo)
                                <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="Product Image"
                                    class="preview-image" id="preview">
                            @endif
                        </div>


                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                        <a href="{{ route('pokemons.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        const fileInput = document.getElementById('photo');
        const fileNameDisplay = document.getElementById('file-name');
        const previewImage = document.getElementById('preview');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                fileNameDisplay.textContent = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = '';
                previewImage.style.display = 'none';
            }
        });
    </script>
</body>

</html>
