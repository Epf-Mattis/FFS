<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
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
        ]);

        $funFact = new FunFact;
        $funFact->text = $validatedData['text'];
        $funFact->author = $validatedData['author'];
        $funFact->moderation_status = 'pending'; 
        $funFact->save();

        return redirect()->back()->with('success', 'Votre Fun Fact a été soumis avec succès et est en attente de modération.');
    }

    // Méthode pour approuver un Fun Fact
    public function approve($id)
    {
        $funFact = FunFact::findOrFail($id);
        $funFact->update(['moderation_status' => 'approved']);
        return back()->with('success', 'Fun Fact approuvé avec succès.');
    }

    // Méthode pour rejeter un Fun Fact
    public function reject($id)
    {
        $funFact = FunFact::findOrFail($id);
        $funFact->update(['moderation_status' => 'rejected']);
        return back()->with('success', 'Fun Fact rejeté avec succès.');
    }

    public function modify($id)
    {
        $funFact = FunFact::findOrFail($id);
        $funFact->update(['moderation_status' => 'pending']);
        return back()->with('success', 'Etat changé');
    }


}

   