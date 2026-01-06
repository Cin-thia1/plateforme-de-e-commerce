<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Livraison;
use App\Models\Notification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LivraisonController extends Controller
{
    // MUST: CRUD Livraisons - Liste pour l'admin ou le livreur connecté
    public function index(Request $request)
    {
        $query = Livraison::with(['order.client', 'livreur.user']);
        
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

    public function dashboard(Request $request)
{
    $livreurId = $request->user()->id;

    $todayStart = now()->startOfDay();
    $todayEnd   = now()->endOfDay();

    $livraisons = Livraison::with('order.client')
        ->where('livreur_id', $livreurId)
        ->whereBetween('created_at', [$todayStart, $todayEnd])
        ->get();

    return response()->json([
        'counts' => [
            'assigned' => $livraisons->where('status', 'assigned')->count(),
            'en_route' => $livraisons->where('status', 'en_route')->count(),
            'en_cours' => $livraisons->where('status', 'en_cours')->count(),
            'livrée'   => $livraisons->where('status', 'livrée')->count(),
            'echec'    => $livraisons->where('status', 'echec')->count(),
        ],
        'ongoing' => $livraisons
            ->whereIn('status', ['en_route', 'en_cours'])
            ->values()
->map(function ($l) {
    return [
        'id' => $l->id,
        'status' => $l->status,
        'order_ref' => $l->order->id,
        'client' => $l->order->client->name ?? 'Client',
        'address' => $l->order->address,
        'amount' => $l->order->total,
        'time' => ($l->en_route || $l->en_cours)
            ? \Carbon\Carbon::parse($l->en_route ?? $l->en_cours)->format('H:i')
            : '',
    ];
})
,
    ]);
}


}