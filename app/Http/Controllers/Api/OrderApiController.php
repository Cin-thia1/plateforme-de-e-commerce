<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Livraison;
use App\Models\Notification;
use App\Models\Livreur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderAPIController extends Controller
{
    /**
     * GET /commandes
     * Récupère toutes les commandes avec les infos client et produits
     */
    public function index()
    {
        // On charge le client (user) et les produits (orderItems.product)
        $orders = Order::with(['user', 'orderItems.product', 'livraison.livreur.user'])->get();
        
        return response()->json($orders);
    }

    /**
     * GET /commande/{idCommande}
     */
    public function show($idCommande)
    {
        $order = Order::with(['user', 'orderItems.product', 'livraison.livreur.user'])
                      ->findOrFail($idCommande);

        return response()->json($order);
    }

    /**
     * POST /commandes/assigner
     * Assigne un livreur et crée/met à jour l'entrée dans la table 'livraisons'
     */
    public function assignLivreur(Request $request)
    {
        $request->validate([
            'idLivreur' => 'required|exists:livreurs,user_id',
            'idCommande' => 'required|exists:orders,id',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                // 1. Mettre à jour le statut de la commande principale
                $order = Order::findOrFail($request->idCommande);
                $order->update(['delivery_status' => 'en cours']);

                // 2. Créer ou mettre à jour la livraison (table livraisons avec UUID)
                $livraison = Livraison::updateOrCreate(
                    ['order_id' => $request->idCommande],
                    [
                        'livreur_id' => $request->idLivreur,
                        'status' => 'en cours',
                        'date_livraison' => null
                    ]
                );

                // Notifier le livreur ici (optionnel)
                Notification::create([
                    'id_destinataire' => $request->idLivreur,
                    'user_type' => 'livreur',
                    'commentaire' => "Une nouvelle livraison vous a été assignée (Commande #{$order->id}).",
                    'lu' => 'non'
                ]);

                return response()->json([
                    'message' => 'Livreur assigné et livraison créée',
                    'order_status' => $order->delivery_status,
                    'livraison' => $livraison
                ]);
            });
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateAssignation(Request $request)
    {
        $request->validate([
            'idLivraison' => 'required|exists:livraisons,id',
            'idLivreur' => 'required|exists:livreurs,user_id',
            'idCommande' => 'required|exists:orders,id',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                // Mettre à jour l'entrée dans la table 'livraisons'
                $livraison = Livraison::where('id', $request->idLivraison)->firstOrFail();
                $livraison->update(['livreur_id' => $request->idLivreur, 'order_id' => $request->idCommande]);


                // Mettre à jour le statut de la commande principale
                $order = Order::findOrFail($request->idCommande);
                $order->update(['delivery_status' => 'en cours']);

                // Notifier le nouveau livreur ici (optionnel)
                Notification::create([
                    'id_destinataire' => $request->idLivreur,
                    'user_type' => 'livreur',
                    'commentaire' => "Vous avez été assigné à une nouvelle livraison (Commande #{$livraison->order_id}).",
                    'lu' => 'non'
                ]);

                return response()->json([
                    'message' => 'Assignation du livreur mise à jour',
                    'livraison' => $livraison
                ]);
            });
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * POST /commandes/annuler
     */
    public function cancel(Request $request)
    {
        $request->validate([
            'idCommande' => 'required|exists:orders,id',
        ]);

        $order = Order::findOrFail($request->idCommande);
        
        // Mise à jour du statut
        $order->update([
            'delivery_status' => 'annulé',
            'livree' => false
        ]);

        return response()->json([
            'message' => 'Commande annulée avec succès',
            'idCommande' => $order->id
        ]);
    }
}