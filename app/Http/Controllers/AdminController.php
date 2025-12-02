<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Compter toutes les commandes
        $totalOrders = OrderItem::count();
        
        // Compter les commandes en attente
        $pendingOrders = OrderItem::where('type', 'en attente')->count();
        
        // Compter les commandes livrées
        $deliveredOrders = OrderItem::where('type', 'livree')->count();
        
        // Compter tous les utilisateurs
        $totalUsers = User::count();
        
        // Calculer le revenu total
        $revenue = OrderItem::with('product')
            ->get()
            ->sum(function ($item) {
                return ($item->product->price ?? 0) * $item->quantite;
            });
        
        // Récupérer les 10 dernières commandes
        $recentOrders = OrderItem::with(['order.user', 'product'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'deliveredOrders',
            'totalUsers',
            'revenue',
            'recentOrders'
        ));
    }
}