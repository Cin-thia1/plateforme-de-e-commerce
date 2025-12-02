<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer' => 'required|array',
            'payment_method' => 'required|string',
            'items' => 'required|array',
            'total' => 'required|numeric'
        ]);

        $customer = $data['customer'];

        // Vérifier si l'utilisateur existe déjà
        $user = \App\Models\User::firstOrCreate(
            ['email' => $customer['email']],
            [
                'name' => $customer['name'],
                'phone' => $customer['phone'],
                //'password' => bcrypt('12345678'), // si tu veux lui générer un compte
            ]
        );

        // S'il existe déjà, on MAJ le nom / numéro (facultatif mais propre)
        $user->update([
            'name' => $customer['name'],
            'phone' => $customer['phone']
        ]);

        // Créer la commande
        $order = Order::create([
            'user_id' => $user->id,
            'address' => $customer['address'],
            'country' => $customer['country'],
            'region' => $customer['region'],
            'city' => $customer['city'],
            'zip' => $customer['zip'],
            'payment_method' => $data['payment_method'],
            'notes' => $customer['notes'] ?? null,
            'total' => $data['total'],
        ]);

        // Insérer les items
        foreach ($data['items'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['qty'],
            ]);
        }

        return response()->json([
            'status' => 'success',
            'order_id' => $order->id,
        ]);
    }

}

?>
