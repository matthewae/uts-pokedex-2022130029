<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemons = Pokemon::paginate(10);
        return view('pokemon.index', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
            $filePath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $filePath;
        }


        Pokemon::create($validatedData);

        return redirect()->route('pokemons.index')->with('success', 'Pokemon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
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
            $filePath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $filePath;
        }

        $pokemon->update($validatedData);

        return redirect()->route('pokemons.index')->with('success', 'Pokemon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemons.index')->with('success', 'Pokemon deleted successfully.');
    }
}
