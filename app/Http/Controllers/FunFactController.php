<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FunFact;

class FunFactController extends Controller
{
    public function create()
    {
        return view('funfacts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string',
            'author' => 'required|string',
            'date' => 'required|date',
        ]);

        $funFact = new FunFact;
        $funFact->text = $validatedData['text'];
        $funFact->author = $validatedData['author'];
        $funFact->date = $validatedData['date'];
        $funFact->moderation_status = 'pending'; // En attente de modération
        $funFact->save();

        return redirect()->back()->with('success', 'Votre Fun Fact a été soumis avec succès et est en attente de modération.');
    }
}

