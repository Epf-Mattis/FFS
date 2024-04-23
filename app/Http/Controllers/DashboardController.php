<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FunFact;

class DashboardController extends Controller
{
    public function index()
    {
        $funFacts = FunFact::all();
        return view('dashboard', compact('funFacts'));
    }
}
