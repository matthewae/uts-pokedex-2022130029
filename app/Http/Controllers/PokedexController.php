<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokedexController extends Controller
{
    public function __invoke(Request $request)
    {
        $Pokemon = Pokemon::paginate(15);


        return view('main', compact('Pokemon'));
    }

}
