<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\FunFact;
use Illuminate\Http\Request;

class FunFactApiController extends Controller
{

    public function random()
    {
        $funFact = FunFact::inRandomOrder()->first();
        return view('FunFactRandom', compact('funFact'));
    }

    public function index()
    {
        $funFacts = FunFact::orderBy('created_at', 'desc')->get();
    
        return view('FunFactIndex', compact('funFacts'));
    }

    
}
