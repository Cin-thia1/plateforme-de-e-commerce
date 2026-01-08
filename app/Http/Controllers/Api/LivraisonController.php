<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Livraison;
use App\Models\Notification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Events\NotificationCreated;
use Illuminate\Support\Facades\Broadcast;

class LivraisonController extends Controller
{
    // MUST: CRUD Livraisons - Liste pour l'admin ou le livreur connecté
    public function index(Request $request)
    {
        $query = Livraison::with(['order.client','order.items.product', 'livreur.user']);
        
        // Si c'est un livreur, il ne voit que ses livraisons
        if ($request->user()->type === 'livreur') {
            $query->where('livreur_id', $request->user()->id);
        }

        return response()->json($query->get());
    }


    public function show($id)
    {
        return response()->json(Livraison::with(['order','order.items.product', 'livreur.user'])->findOrFail($id));
    }

    // afficher les livraisons d'un livreur
    public function livraisonsParLivreur($idlivreur)
    {
        $livraisons = Livraison::with(['order', 'livreur.user', 'order.user', 'order.items.product'])
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
        $livraison = Livraison::with('order', 'order.items.product')->findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:en_route,en_cours,livrée,echec',
            'raison_echec' => 'required_if:status,echec',
            'commentaire_echec' => 'nullable|string',
        ]);

        $livraison->fill($validated);

        // timestamps status (garde tes colonnes existantes)
        switch ($validated['status']) {
            case 'livrée':
                $livraison->livrée = now();
                break;
            case 'en_cours':
                $livraison->en_cours = now();
                break;
            case 'en_route':
                $livraison->en_route = now();
                break;
            case 'echec':
                $livraison->echec_livraison = now();
                break;
        }

        $livraison->save();

        // NOTIF + WS
        $notification = Notification::create([
            'id_destinataire' => $livraison->livreur_id,
            'user_type'       => 'livreur',
            'lu'              => 'non',
            'commentaire'     => "CMD-{$livraison->order_id} est passée à {$livraison->status}",
        ]);

        broadcast(new NotificationCreated($notification));

        return response()->json([
            'message' => 'Statut mis à jour',
            'data' => $livraison
        ]);
    }

    //assignation => status = assigned + notif + ws
    public function assignLivreur(Request $request, $id)
    {
        $livraison = Livraison::with('order','order.items.product')->findOrFail($id);

        $validated = $request->validate([
            'livreur_id' => 'required|exists:users,id', // adapte selon ta structure
        ]);

        $livraison->livreur_id = $validated['livreur_id'];
        $livraison->status = 'assigned';
        $livraison->save();

        $notification = Notification::create([
            'id_destinataire' => $livraison->livreur_id,
            'user_type'       => 'livreur',
            'lu'              => 'non',
            'commentaire'     => "Nouvelle livraison assignée : CMD-{$livraison->order_id}",
        ]);

        broadcast(new NotificationCreated($notification));

        return response()->json([
            'message' => 'Livraison assignée',
            'data' => $livraison
        ]);}
    /*public function updateStatus(Request $request, $id)
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
        // 1) Notification "changement de statut"
$notification = Notification::create([
    'id_destinataire' => $livraison->livreur_id,
    'user_type' => 'livreur',
    'lu' => 'non',
    'commentaire' => "CMD-{$livraison->order_id} est passée à {$livraison->status}",
]);

// 2) Diffusion WebSocket (Reverb)
broadcast(new \App\Events\NotificationCreated($notification));



        return response()->json(['message' => 'Statut mis à jour', 'data' => $livraison]);
    }*/

    public function dashboard(Request $request)
{
    $livreurId = $request->user()->id;

    // 1) Toutes les livraisons NON terminées (peu importe la date)
    $active = Livraison::with(['order.client', 'order.items.product'])
        ->where('livreur_id', $livreurId)
        ->whereIn('status', ['assigned', 'en_route', 'en_cours'])
        ->get();

    // 2) Livraisons terminées aujourd’hui (optionnel si tu veux encore afficher livrée/echec du jour)
    $todayStart = now()->startOfDay();
    $todayEnd   = now()->endOfDay();

    $doneToday = Livraison::with('order.client')
        ->where('livreur_id', $livreurId)
        ->whereIn('status', ['livrée', 'echec'])
        ->whereBetween('updated_at', [$todayStart, $todayEnd])
        ->get();

    return response()->json([
        'counts' => [
            'assigned' => $active->where('status', 'assigned')->count(),
            'en_route' => $active->where('status', 'en_route')->count(),
            'en_cours' => $active->where('status', 'en_cours')->count(),
            'livrée'   => $doneToday->where('status', 'livrée')->count(),
            'echec'    => $doneToday->where('status', 'echec')->count(),
        ],

        'ongoing' => $active
            ->values()
            ->map(function ($l) {
                // 🔹 Construire le résumé des produits
                $items = $l->order?->items ?? collect();

                $itemsSummary = '';
                if ($items->isNotEmpty()) {
                    $itemsSummary = $items->take(3)->map(function ($item) {
                        $name = $item->product->name ?? 'Produit';
                        $qty  = $item->quantite ?? 1;
                        return "{$qty}x {$name}";
                    })->join(', ');

                    if ($items->count() > 3) {
                        $itemsSummary .= '…';
                    }
                }

                return [
                    'id'           => $l->id,
                    'status'       => $l->status,
                    'order_ref'    => $l->order?->id ?? null,
                    'client'       => $l->order?->client?->name ?? 'Client',
                    'address'      => $l->order?->address ?? '',
                    'amount'       => $l->order?->total ?? 0,
                    'time'         => $l->status === 'en_route' && $l->en_route
                        ? \Carbon\Carbon::parse($l->en_route)->format('H:i')
                        : ($l->status === 'en_cours' && $l->en_cours
                            ? \Carbon\Carbon::parse($l->en_cours)->format('H:i')
                            : \Carbon\Carbon::parse($l->created_at)->format('H:i')),

                    
                    'items_summary' => $itemsSummary,
                ];
            }),
    ]);
}

}
