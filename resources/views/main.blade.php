@extends('layouts.app')

@section('title', 'Pokedex')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">Pokedex</h1>

        @if ($pokemons->count() > 0)
            <div class="row">
                @foreach ($pokemons as $pokemon)
                    <div class="col-md-4 mb-4">
                        <div class="pokemon-card">
                            @if ($pokemon->photo)
                            <a href="{{ route('pokemons.show', $pokemon) }}">
                                <img src="{{ Storage::url($pokemon->photo) ?? 'https://placehold.co/200' }}"
                                    class="img-thumbnail w-100">
                            </a>
                        @else
                            <a href="{{ route('pokemons.show', $pokemon) }}">
                                <img src="https://placehold.co/200" class="img-thumbnail w-100">
                            </a>
                        @endif

                            <div class="pokemon-id">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</div>
                            <div class="pokemon-name">{{ $pokemon->name }}</div>
                            <div class="pokemon-type"
                                style="background-color:
                                @if ($pokemon->primary_type == 'Grass') #78C850
                                @elseif($pokemon->primary_type == 'Fire') #F08030
                                @elseif($pokemon->primary_type == 'Water') #6890F0
                                @elseif($pokemon->primary_type == 'Bug') #A8B820
                                @elseif($pokemon->primary_type == 'Normal') #A8A878
                                @elseif($pokemon->primary_type == 'Poison') #A040A0
                                @elseif($pokemon->primary_type == 'Electric') #F8D030
                                @elseif($pokemon->primary_type == 'Ground') #E0C068
                                @elseif($pokemon->primary_type == 'Fairy') #EE99AC
                                @elseif($pokemon->primary_type == 'Fighting') #C03028
                                @elseif($pokemon->primary_type == 'Psychic') #F85888
                                @elseif($pokemon->primary_type == 'Rock') #B8A038
                                @elseif($pokemon->primary_type == 'Ghost') #705898
                                @elseif($pokemon->primary_type == 'Ice') #98D8D8
                                @elseif($pokemon->primary_type == 'Dragon') #7038F8
                                @elseif($pokemon->primary_type == 'Dark') #705848
                                @elseif($pokemon->primary_type == 'Steel') #B8B8D0
                                @elseif($pokemon->primary_type == 'Flying') #A890F0
                                @else #000000 @endif;">
                                {{ $pokemon->primary_type }}
                            </div>
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

    <style>
        .pokemon-card {
            max-width: 350px;
            margin: 0 auto;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: white;
            text-align: center;
        }

        .pokemon-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .pokemon-id {
            font-weight: bold;
            font-size: 18px;
            color: #6c757d;
            margin-bottom: 5px;
        }

        .pokemon-name {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 10px;
        }

        .pokemon-type {
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            padding: 5px 10px;
            border-radius: 15px;
            display: inline-block;
        }

        {{$pokemons->links()}}
    </style>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>
@endsection
