<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\FunFact;
use Illuminate\Http\Request;

class FunFactApiController extends Controller
{
    public function getRandom()
    {
        $funFact = FunFact::inRandomOrder()->first();
        return response()->json($funFact);
    }

    public function getAll()
    {
        $funFacts = FunFact::orderBy('created_at', 'desc')->get();
        return response()->json($funFacts);
    }

    public function random()
{
    $response = Http::get('localhost:8000/api/funfacts/random');
    $funFact = $response->json();

    return view('FunFactRandom', ['funFact' => $funFact]);
}

public function index()
{
    $response = Http::get('localhost:8000/api/funfacts');
    $funFacts = $response->json();

    return view('FunFactIndex', ['funFacts' => $funFacts]);
}

    
}
