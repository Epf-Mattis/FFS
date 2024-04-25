<?php

namespace App\Http\Controllers;

use App\Models\FunFact;
use Illuminate\Http\Request;
use App\Http\Resources\FunFactResource;

class FunFactApiController extends Controller
{
    public function random()
    {
        $funFact = FunFact::inRandomOrder()->first();
        return new FunFactResource($funFact);
    }

    public function index()
    {
        $funFacts = FunFact::all();
        return FunFactResource::collection($funFacts);
    }
}
