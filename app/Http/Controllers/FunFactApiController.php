<?php

namespace App\Http\Controllers;

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
}
