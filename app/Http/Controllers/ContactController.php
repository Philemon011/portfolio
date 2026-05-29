<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom'     => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'objet'   => 'nullable|string|max:150',
            'message' => 'required|string|max:5000',
        ]);

        // Sauvegarde en base de données
        Message::create($validated);

        // Réponse JSON pour le JS
        return response()->json([
            'success' => true,
            'message' => 'Votre message a été envoyé avec succès ! Je reviens vers vous sous 24h.',
        ]);
    }
}