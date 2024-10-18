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
                            <a href="{{ route('pokemons.show', $pokemon) }}">
                                <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : asset('https://placehold.co/200') }}"
                                    class="pokemon-image">
                            </a>

                            <div class="pokemon-id">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</div>
                            <div class="pokemon-name">{{ $pokemon->name }}</div>

                            @php
                                $typeColors = [
                                    'Grass' => '#78C850',
                                    'Fire' => '#F08030',
                                    'Water' => '#6890F0',
                                    'Bug' => '#A8B820',
                                    'Normal' => '#A8A878',
                                    'Poison' => '#A040A0',
                                    'Electric' => '#F8D030',
                                    'Ground' => '#E0C068',
                                    'Fairy' => '#EE99AC',
                                    'Fighting' => '#C03028',
                                    'Psychic' => '#F85888',
                                    'Rock' => '#B8A038',
                                    'Ghost' => '#705898',
                                    'Ice' => '#98D8D8',
                                    'Dragon' => '#7038F8',
                                    'Dark' => '#705848',
                                    'Steel' => '#B8B8D0',
                                    'Flying' => '#A890F0',
                                ];
                            @endphp

                            <div class="pokemon-type"
                                style="background-color: {{ $typeColors[$pokemon->primary_type] ?? '#000000' }}">
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
    </style>
@endsection
