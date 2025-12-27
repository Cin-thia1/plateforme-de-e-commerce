<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    // MUST: CRUD Livraisons - Liste pour l'admin ou le livreur connecté
    public function index(Request $request)
    {
        $query = Livraison::with(['order', 'livreur.user']);
        
        // Si c'est un livreur, il ne voit que ses livraisons
        if ($request->user()->type === 'livreur') {
            $query->where('livreur_id', $request->user()->id);
        }

        return response()->json($query->get());
    }

    // MUST: Assignation livraison -> livreur
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'livreur_id' => 'required|exists:livreurs,user_id',
        ]);

        return DB::transaction(function () use ($validated) {
            $livraison = Livraison::create($validated);

            // NOTIFIER LE LIVREUR
            Notification::create([
                'id_destinataire' => $validated['livreur_id'],
                'user_type' => 'livreur',
                'commentaire' => "Une nouvelle livraison vous a été assignée (Commande #{$livraison->order_id}).",
                'lu' => 'non'
            ]);

            return response()->json($livraison, 201);
        });
    }

    // MUST: Mise à jour du statut
    public function updateStatus(Request $request, $id)
    {
        $livraison = Livraison::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:en cours,terminé,echec',
            'raison_echec' => 'required_if:status,echec',
            'commentaire_echec' => 'nullable|string'
        ]);

        $livraison->update($validated);

        if($validated['status'] === 'terminé') {
            $livraison->update(['date_livraison' => now()]);
        }

        return response()->json(['message' => 'Statut mis à jour', 'data' => $livraison]);
    }
}