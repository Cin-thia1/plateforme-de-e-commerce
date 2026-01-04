<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Livraison;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function show($id)
    {
        return response()->json(Livraison::with(['order', 'livreur.user'])->findOrFail($id));
    }

    // afficher les livraisons d'un livreur
    public function livraisonsParLivreur($idlivreur)
    {
        $livraisons = Livraison::with(['order', 'livreur.user', 'order.user'])
            ->where('livreur_id', $idlivreur)
            ->get();

        return response()->json($livraisons);
    }

    //supprimer une livraison
    public function destroy($id)
    {
        $livraison = Livraison::findOrFail($id);
        $livraison->delete();

        return response()->json(['message' => 'Livraison supprimée avec succès']);
    }

    // MUST: Mise à jour du statut
    public function updateStatus(Request $request, $id)
    {
        $livraison = Livraison::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:en_route,en_cours,livrée,echec',
            'raison_echec' => 'required_if:status,echec',
            'commentaire_echec' => 'nullable|string'
        ]);

        $livraison->update($validated);

        if($validated['status'] === 'livrée') {
            $livraison->update(['livrée' => now()]);
        }
        if($validated['status'] === 'en_cours') {
            $livraison->update(['en_cours' => now()]);
        }
        if($validated['status'] === 'en_route') {
            $livraison->update(['en_route' => now()]);
        }
        if($validated['status'] === 'echec') {
            $livraison->update(['echec_livraison' => now()]);
        }

        return response()->json(['message' => 'Statut mis à jour', 'data' => $livraison]);
    }
}