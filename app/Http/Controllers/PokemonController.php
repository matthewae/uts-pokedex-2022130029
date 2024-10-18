<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function main()
    {
        $pokemons = Pokemon::paginate(9);
        return view('main', compact('pokemons'));
    }

    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));
    }

    public function create()
    {
        return view('pokemon.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'hp' => 'required|integer|between:0,9999',
            'attack' => 'required|integer|between:0,9999',
            'defense' => 'required|integer|between:0,9999',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 'public');
            $validatedData['photo'] = $path;
        }

        Pokemon::create($validatedData);

        return redirect()->route('pokemons.index')->with('success', 'Pokemon created successfully.');
    }

    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    public function update(Request $request, Pokemon $pokemon)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'hp' => 'required|integer|between:0,9999',
            'attack' => 'required|integer|between:0,9999',
            'defense' => 'required|integer|between:0,9999',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($pokemon->photo && Storage::disk('public')->exists($pokemon->photo)) {
                Storage::disk('public')->delete($pokemon->photo);
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 'public');
            $validatedData['photo'] = $path;
        }

        $pokemon->update($validatedData);

        return redirect()->route('pokemons.index')->with('success', 'Pokemon updated successfully.');
    }

    public function destroy(Pokemon $pokemon)
    {
        if ($pokemon->photo) {
            if (Storage::disk('public')->exists($pokemon->photo)) {
                Storage::disk('public')->delete($pokemon->photo);
            }
        }

        $pokemon->delete();
        return redirect()->route('pokemons.index')->with('success', 'Pokemon deleted successfully.');
    }
}
