<?php

namespace App\Http\Controllers;

use App\Models\FunFact;
use App\Http\Resources\FunFactResource;

class FunFactApiController extends Controller
{
    public function random()
    {
        $funFact = FunFact::where('moderation_status', 'approved')->inRandomOrder()->first();
        return new FunFactResource($funFact);
    }

    public function index()
    {
        $funFacts = FunFact::where('moderation_status', 'approved')->get();
        return FunFactResource::collection($funFacts);
    }
}

